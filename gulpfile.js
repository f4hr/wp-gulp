const gulp = require('gulp');

const path = require('path');
const server = require('browser-sync').create();
const plumber = require('gulp-plumber');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');
const webpack = require('webpack-stream');
const CircularDependencyPlugin = require('circular-dependency-plugin');
const DuplicatePackageCheckerPlugin = require('duplicate-package-checker-webpack-plugin');
const npmDist = require('gulp-npm-dist');
const del = require('del');
const merge = require('merge-stream');

function setMode (isProduction = false) {
  return cb => {
    process.env.NODE_ENV = isProduction ? 'production' : 'development';
    cb();
  };
}

/**
 * Config
 */
const root = path.join(__dirname, './');
const src = path.join(root, 'src');
const config = {
  dist: path.join(root, 'assets'),
  buildPath: path.join(root, '/assets'),
  copyDependencies: {
    dist: path.join(src, 'local_modules')
  }
};

/**
 * Serve
 */
function readyReload (cb) {
  server.reload();
  cb();
}

const serve = function (cb) {
  server.init({
    proxy: 'test.loc',
    files: [
      './**/*.php'
    ],
    notify: false,
    open: false,
    cors: true
  });

  gulp.watch('src/styles/**/*.scss', gulp.series(styles, cb => gulp.src('assets/css').pipe(server.stream()).on('end', cb)));
  gulp.watch('src/js/**/*.js', gulp.series(script, readyReload));
  gulp.watch('src/img/**/*.*', gulp.series(images, readyReload));

  gulp.watch('package.json', gulp.series(copyDependencies, readyReload));

  return cb();
};

/**
 * Styles
 */
const styles = function () {
  const plugins = [
    autoprefixer(),
    cssnano()
  ];
  return gulp.src('src/styles/style.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'compact',
      precision: 10
    })).on('error', sass.logError)
    .pipe(postcss(plugins))
    .pipe(sourcemaps.write())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/css'));
};

/**
 * Vendor Styles
 */
const vendorStyles = function () {
  return gulp
    .src([
      'src/local_modules/normalize.css/normalize.css'
    ])
    .pipe(plumber())
    .pipe(concat('vendor.min.css'))
    .pipe(gulp.dest('assets/css/'));
};

/**
 * Scripts
 */
const script = function () {
  return gulp.src('src/js/main.js')
    .pipe(plumber())
    .pipe(webpack({
      mode: process.env.NODE_ENV,
      output: {
        filename: '[name].min.js'
      },
      module: {
        rules: [
          {
            test: /\.m?js$/,
            exclude: /(node_modules|bower_components)/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }
        ]
      },
      plugins: [
        new CircularDependencyPlugin(),
        new DuplicatePackageCheckerPlugin()
      ]
    }))
    .pipe(gulp.dest('assets/js'));
};

/**
 * Fonts
 */
const fonts = function () {
  return gulp.src('src/fonts/*')
    .pipe(gulp.dest('assets/fonts'));
};

/**
 * Images
 */
const images = function () {
  return gulp.src('src/img/**/*.*')
    .pipe(gulp.dest('assets/img'));
};

/**
 * Clean
 */
const clean = function (cb) {
  return del('assets').then(() => {
    cb();
  });
};

/**
 * Copy Dependencies
 */
const copyDependencies = function (cb) {
  del(config.copyDependencies.dist).then(() => {
    gulp.src(npmDist(), { base: path.join(root, 'node_modules') })
      .pipe(rename(function (path) {
        path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
      }))
      .pipe(gulp.dest(config.copyDependencies.dist)).on('end', cb);
  }).catch(cb);
};

/**
 * Copy Vendor
 */
const copyVendor = function () {
  const npm = gulp.src('src/local_modules/**/*.*')
    .pipe(gulp.dest('assets/vendor'));
  const other = gulp.src('src/vendor/**/*.*')
    .pipe(gulp.dest('assets/vendor'));
  const customizer = gulp.src('src/css/customizer.css')
    .pipe(gulp.dest('assets/css'));

  return merge(npm, other, customizer);
};

const dev = gulp.parallel(styles, script, fonts, images);
const build = gulp.series(clean, copyDependencies, copyVendor, vendorStyles, dev);

module.exports.start = gulp.series(setMode(), build, serve);
module.exports.build = gulp.series(setMode(true), build);
