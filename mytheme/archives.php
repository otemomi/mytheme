<?php
/*
Template Name: Archives
*/
get_header(); ?>

<main>
	<div id="contents">
		<div id="main">
			<h2 class="archiveH"><?php the_title(); ?></h2>
			<?php
			$paged = (int) get_query_var('paged');
			$args = array(
				'posts_per_page' => 10,
				'paged' => $paged,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish'
			); ?>
			<?php $the_query = new WP_Query($args);
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part( 'content', get_post_format() ); ?>

				<ul>
					<li class="mb10"><?php the_date(); ?> : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				</ul>

			<?php endwhile;
			else:
				get_template_part( 'content', 'none' );
			endif; ?>
			<div class="pager">
			<?php if ($the_query->max_num_pages > 1) {
				echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => 'page/%#%/',
					'current' => max(1, $paged),
					'total' => $the_query->max_num_pages
				));
			}; ?>
			</div>
			<?php wp_reset_postdata(); ?>

		</div>
	</div>

<?php get_template_part( 'sidebar-page' ); ?>
</main>


<?php get_footer(); ?>