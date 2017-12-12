<?php
/**
 * search (search.php)
 * @package WordPress
 * @subpackage MBN
 */
get_header(); ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); ?>">
				<h1><?php printf('Search by line: %s', get_search_query()); ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('loop'); ?>
				<?php endwhile;
				else: echo '<p>No records.</p>'; endif; ?>	 
				<?php pagination(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>