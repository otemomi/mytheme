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
						$args = array( 'posts_per_page' => 20, 'order'=> 'DESC', 'orderby' => 'date' );
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); ?>
						<ul>
							<li class="mb10"><?php the_date(); ?> : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						</ul>
					<?php
						endforeach;
						wp_reset_postdata();
					?>
		</div>
	</div>

<?php get_template_part( 'sidebar-page' ); ?>
</main>


<?php get_footer(); ?>