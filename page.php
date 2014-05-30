<?php get_header(); ?>
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<article>
	<header>
	</header>
	<div id="clear"></div>
	<section class="headerCentrage">
		<div class="largeThumbnail">
			<?php the_post_thumbnail( '404-post-thumbnail' ); ?>
		</div> 
		<div class="sectionCentrage">
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<div id="clear"></div>
	        <?php the_content(); ?>
	        <div id="clear"></div>
	    </div>
	</section>
	<div id="clear"></div>
</article>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

	
