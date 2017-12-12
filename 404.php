<?php
/**
 * 404 (404.php)
 * @package WordPress
 * @subpackage MBN
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); ?>">
				<h1>404 not found!</h1>
				<p>404 error page</p>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>