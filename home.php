<?php get_header(); ?>
<article>
<?php if (is_home() && strpos($_SERVER['REQUEST_URI'], "/page/") === false) { ?>
		<?php the_post(); ?>
		<?php $postslist = get_posts('numberposts=1&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
		<header>
		<div id="headerCentrage">
			<div class="largeThumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( '404-post-thumbnail' ); ?></a>
			</div>
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>  
		</div>
	</header>
	<section>
		<div class="sectionCentrage">
	        <?php the_excerpt(); ?>
	        <a class="moreLink" href="<?php the_permalink(); ?>">Lire la suite... )</a>
	    </div>
	</section>
	<?php endforeach; ?>
<?php } ?>
	<div id="clear"></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php $postslist = get_posts('order=DESC&offset= 1'); ?>
			<section id="post-<?php the_ID(); ?>" class="article">
				<div class="postThumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
				</div>			
				<div class="postContent">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt(); ?>
				</div>
			</section>
			<div id="clear"></div>
		<?php endwhile; ?>
		<section class="navigation">
			<?php wpbeginner_numeric_posts_nav(); ?>
		</section>
		<div id="clear"></div>
	<?php endif; ?>
</article>
<?php get_footer(); ?>
