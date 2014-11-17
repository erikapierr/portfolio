<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="frontpage-content" id="about-me">
    <!-- show bio -->
		<?php $bio = new WP_Query( 'pagename=bio' ); ?>
		<?php if ( $bio->have_posts() ) : ?>
		<?php while ( $bio->have_posts() ) : $bio->the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div> <!-- /.frontpage-content -->
	<div class="frontpage-content">
		<!-- show learning blurb -->
		<?php $learning = new WP_Query( 'pagename=learning' ); ?>
		<?php if ( $learning->have_posts() ) : ?>
		<?php while ( $learning->have_posts() ) : $learning->the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- show skills -->
		<div class="skill-box clearfix">
			<?php $skillsQuery = new WP_Query(
				array(
					'posts_per_page' => 6,
					'post_type' => 'skills',
					'order' => 'desc'
				)
			) ?>
			<?php if ($skillsQuery->have_posts()) : ?>
				<?php while ( $skillsQuery->have_posts() ) : $skillsQuery->the_post(); ?>
					<div class="skill">
					<?php the_post_thumbnail(); ?>
					<h3>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>	
					<?php the_content(); ?></div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>		
		</div> <!-- /.skill-box -->
	<!-- show what i'm looking for -->
		<?php $lookingfor = new WP_Query ('pagename=what-am-i-looking-for'); ?>
		<?php if ( $lookingfor->have_posts() ) : ?>
		<?php while ( $lookingfor->have_posts() ) : $lookingfor->the_post(); ?>
			<h2><?php the_title(); ?></h2>	
			<p><?php the_content(); ?></p>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>	
	</div>	<!-- /.frontpage-content -->
	<div id="my-portfolio" class="portfolio-pieces clearfix"> 
		<!-- show portfolio pieces -->
		<?php $portfolioQuery = new WP_Query(
			array(
				'posts_per_page' => 3,
				'post_type' => 'portfolio',
				'order' => 'desc'
			)
		) ?>
		<h2>
			<?php echo get_post_type_object('portfolio')->labels->name; ?>
		</h2>
		<?php if ($portfolioQuery->have_posts()) : ?>
			<div class="portfolio-piece-box clearfix">
				<?php while ( $portfolioQuery->have_posts() ) : $portfolioQuery->the_post(); ?>
					<div class="portfolio-piece">
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
							<?php the_post_thumbnail('large'); ?>
						</a>
						<div class="portfolio-caption">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	
							<p><?php the_content(); ?></p>
							</div><!-- /.portfolio-caption -->
					</div><!-- /.portfolio-piece -->
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>		
	</div><!-- /.portfolio-pieces -->
		<div class="view-all">
			<p>
			View All <a href="<?php echo get_permalink(get_page_by_title('portfolio')) ; ?>"><?php echo get_post_type_object('portfolio')->labels->name; ?></a>
			</p>
		</div>

	<div class="blog-argh">
		<?php $blog = new WP_Query(
			array(
				'posts_per_page' => 1,
				'post_type' => 'post',
				'order' => 'desc'
			)
		) ?>
		<h2>
			<?php echo get_post_type_object('post')->labels->name; ?>
		</h2>
		<!-- show blog posts	 -->
		<?php if ( have_posts() ) : ?>
			<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="blog-thumbnail-img">
						<p class="blog-the-date"><?php the_date(); ?></p>
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="blog-post-with-thumb">
						<p class="blog-the-date"><?php the_date(); ?></p>
						<h3><a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<p><?php the_content(); ?></p>
					</div>
				<?php else : ?> 
					<div class="blog-post-without-thumbnail">
						<p class="the-date"><?php the_date(); ?></p>
						<h3><a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
					</div>	
				<?php endif; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<div class="view-all">
			<p>
			View All <a href="<?php echo get_permalink(get_page_by_title('blog')) ; ?>"><?php echo get_post_type_object('post')->labels->name; ?></a>
			</p>
		</div>
	</div><!-- /.blog -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>