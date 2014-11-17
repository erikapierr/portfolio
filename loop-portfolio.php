<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; // end if there are no posts ?>
	<?php // if there are posts, Start the Loop. ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="portfolio-third">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="portfolio-thumb">
					<h3 class="entry-title">	        
			          <?php the_title(); ?>
		     	 	</h3>
					<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
						<?php the_post_thumbnail('full'); ?>
			        </a>
				</div>
				<div class="portfolio-full hidden">
					<div class="lightbox-inner">
						<?php the_post_thumbnail('full'); ?>
						<button class="show-content-and-footer">Description</button>
						<button class="go-left">&larr;</button>
						<button class="go-right">&rarr;</button>
						<button class="lightbox-close">X</button>
						<div class="content-and-footer hidden">
							<section class="entry-content">
							<button class="hide-content-and-footer">
								[x]
							</button>
								<?php the_content('<span class="meta-nav">&rarr;</span>'); ?>
								<?php wp_link_pages( array(
				          'before' => '<div class="page-link"> Pages:',
				          'after' => '</div>'
				        	)); ?>
							</section><!-- .entry-content -->
							<footer class="entry-footer">
								<p>
									<a href="<?php the_field('url'); ?>">View it live!</a>
								</p>
								<p>
									<?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?>
								</p>
							</footer>
						</div><!-- /.content-and-footer hidden -->
					</div><!--/.lightbox-inner -->
				</div> <!-- /.portfolio-full hidden -->
			</article><!-- #post-## -->
		</div><!-- /.portfolio-third -->
	<?php endwhile; // End the loop. Whew. ?>
<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
