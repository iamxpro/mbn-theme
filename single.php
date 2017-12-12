<?php
/**
 * single (single.php)
 * @package WordPress
 * @subpackage MBN
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); ?>">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<div class="meta">
							<p>Опубликовано: <?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></p>
							<p>Автор:  <?php the_author_posts_link(); ?></p>
							<p>Категории: <?php the_category(',') ?></p>
							<?php the_tags('<p>Tags: ', ',', '</p>'); ?>
						</div>
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
				<?php previous_post_link('%link', '<- Previous post: %title', TRUE); ?> 
				<?php next_post_link('%link', 'Next post: %title ->', TRUE); ?> 
				<?php if (comments_open() || get_comments_number()) comments_template('', true); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
