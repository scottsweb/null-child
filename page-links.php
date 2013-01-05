<?php
/*
Template Name: Links Page
*/

/** This is an optional page template file. The Links Page displays links by link category. **/
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
				
				<ul id="entry-links">
					<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=<li id="page-%id" class="%class">&after=</li>') ?>
				</ul>
			</div>

			<?php comments_template(); ?>
			
		</article>

	</div><!-- #content -->
		
<?php get_sidebar() ?>
<?php get_footer() ?>