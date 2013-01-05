<?php
/*
Template Name: Archives Page
*/

/** This is an optional page template file. The Archive Page template displays archives by month and by category. **/
?>
<?php get_header() ?>

	<div id="content" role="main">

		<?php the_post() ?>

		<article <?php post_class() ?>>
			
			<header>
				<h2 class="entry-title"><?php the_title() ?></h2>
			</header>
			
			<div class="entry-content">	
				
				<?php wp_link_pages('before=<div class="page-link">'  . __('Page:', 'null') . '&after=</div>&link_before=<span>&link_after=</span>') ?>
				<?php the_content() ?>

				<section id="category-archive">
					<h3><?php _e('Archives by Category', 'null'); ?></h3>
					<ul class="archive-list">
						<?php wp_list_categories('optioncount=1&title_li=&show_count=1') ?> 
					</ul>
				</section>
				
				<section id="monthly-archive">
					<h3><?php _e('Archives by Month', 'null'); ?></h3>
					<ul class="archive-list">
						<?php wp_get_archives('type=monthly&show_post_count=1') ?>
					</ul>
				</section>
			</div>

			<?php comments_template(); ?>
							
		</article>

	</div><!-- #content -->

<?php get_sidebar() ?>
<?php get_footer() ?>