<?php get_header(); ?>
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<article>
	<header>
		<div id="headerCentrage">
			<div class="largeThumbnail">
				<?php the_post_thumbnail( '404-post-thumbnail' ); ?>
			</div>
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>  
		</div>
	</header>
	<section>
		<div class="sectionCentrage">
			<div id="clear"></div>
	        <?php the_content(); ?>
	        <div id="clear"></div>
	    </div>
	</section>
</article>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

	
