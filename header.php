<!DOCTYPE html>
<html class="page no-js" lang="ru">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
	<!-- Metrics -->
	<?= get_theme_mod( 'metrics_header', '' ); ?>
	<!-- Widgets -->
	<?= get_theme_mod( 'widgets_header', '' ); ?>
	<!-- Assets -->
	<script type="text/javascript">
		document.querySelector('html').classList.remove('no-js');
	</script>
</head>
<body class="page__body">
