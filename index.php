<?php get_header(); ?>
<article>

<?php if (is_category()): ?>
	<div id="clear"></div>
	<section>
		<h1>Catégorie: <?php single_cat_title(); ?></h1>
	</section>
<?php elseif (is_tag()): ?> 
	<div id="clear"></div>
	<section>
		<h1>Tag: <?php single_cat_title(); ?></h1>
	</section>
<?php elseif (is_author()): ?> 
	<div id="clear"></div>
	<section class="author">
		<h1>Auteur:  <?php the_author(); ?></h1>
		<li><?php echo get_avatar( get_the_author_meta( 'ID' ), 65 ); ?></li>
		<li><b>{ </b><i><?php the_author_meta('description'); ?></i><b> }</b></li>
	</section>
<?php elseif (is_year()): ?> 
	<div id="clear"></div>
	<section>
		<h1>Année: <?php the_time( 'Y' ); ?></h1>
	</section>
<?php elseif (is_month()): ?> 
	<div id="clear"></div>
	<section>
		<h1>Mois: <?php the_time( 'F, Y' ); ?></h1>
	</section>
<?php elseif (is_search()): ?> 
	<div id="clear"></div>
	<section>
		<h1>
			<?php 
   				$count = $wp_query->found_posts;
   				$several = ($count<=1) ? '' : 's'; //pluriel
   				if ($count>0) : $output = ' résultat'.$several.' pour: ';
   				else : $output = 'Aucun résultat pour la recherche';
   				endif;
   				$output .= ' "<span class="termSearch">'. get_search_query() .'</span>"';
  				echo $output;
 			?>
		</h1>
	</section>
<?php endif; ?>
		<div id="clear"></div>


	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php $postslist = get_posts('numberposts=20&order=DESC'); ?>
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
		<?php else : ?>
		<header><h2>404</h2><header>
		<section><p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p></section>
	<?php endif; ?>
</article>
<?php get_footer(); ?>
