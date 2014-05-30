<?php get_header(); ?>
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<article>
	<header>
	</header>
	<div id="clear"></div>
	<section class="headerCentrage">
		<p class="articleInfos"><?php the_category(', ') ?> | <?php the_time('j F Y') ?> par <?php the_author_posts_link(); ?></p>
		<div class="largeThumbnail">
			<?php previous_post_link('%link', '<div class="previousArticle"></div>'); ?>
			<?php the_post_thumbnail( '404-post-thumbnail' ); ?>
			<?php next_post_link('%link', '<div class="nextArticle"></div>'); ?>
		</div> 
		<div class="sectionCentrage">
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<div id="clear"></div>
	        <?php the_content(); ?>
	        <div id="clear"></div>
	    </div>
	    <div class="tags">
			<?php the_tags(' '); ?>
	    </div>
		<div id="relatedPosts">
	    	 <ul class="relatedPosts">
				<h3>Dans la même thèmatique:</h3>
				<div id="clear"></div>
					<?php
						$orig_post = $post;
						global $post;
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'posts_per_page'=>3, // Number of related posts to display.
								'caller_get_posts'=>1
							);
							$my_query = new wp_query( $args );
							while( $my_query->have_posts() ) {
							$my_query->the_post();
					?>
						<li class="relatedThumb">
							<a rel="external" href="<? the_permalink()?>">
								<div class="roundIMG">
									<?php the_post_thumbnail('archives-post-thumbnail',array(200,200));?>
								</div>							
								<br />
								<?php the_title(); ?>
							</a>
						</li>
					<? }
				}
			$post = $orig_post;
			wp_reset_query();
			?>
			</ul>
	    </div>
	    <a class="commentLink" href="#comment">
	    	<?php comments_number( 'Pas encore de commentaires', 'Un commentaire', '% commentaires' ); ?>
	     </a>
	</section>
	<div id="clear"></div>
    <?php comments_template(); ?>
    <div id="clear"></div>
</article>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

	
