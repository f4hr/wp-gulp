<?php get_header(); ?>

<main class="page__main">
	<?php if ( have_posts() ): ?>
	<section class="page__content">
		<div class="wrapper">
			<?php while ( have_posts() ): the_post(); ?>
			<h2 class="section__title"><?= the_title(); ?></h2>

				<?php the_content(); ?>

			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>
</main>

<?php get_footer();
