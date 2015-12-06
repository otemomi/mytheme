<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main" class="container">
			<h2 class="archiveH">
				<?php if( is_search()){ // もし検索結果ページなら
					$allsearch =& new WP_Query("s=$s&showposts=-1");
					$key = wp_specialchars($s, 1);
					$count = $allsearch->post_count;
					echo '<h2 class="archiveH">&#8216;'.$key.'&#8217; で検索した結果：'.$count.' 件</h2>';
				} ?>

		<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
			<h3><?php the_date(); ?> : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="archiveImg"><?php the_post_thumbnail( array( 200, 200 ) ); ?></p>
			<?php the_excerpt(); ?>

		<?php endwhile; ?>
			<?php wp_pagenavi(); ?>

		<?php else : ?>
		<?php endif; ?>
		</div>
	</div>

<?php get_template_part( 'sidebar-page' ); ?>
</main>

<?php get_footer(); ?>