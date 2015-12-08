	<div id="sub">
		<div class="container cf">
		<h2>Recent article</h2>

		<?php $post_args = array( 'posts_per_page' => 4, 'offset' => 1 );
			$shohin_posts = get_posts( $post_args );
				foreach($shohin_posts as $post) :
			setup_postdata( $post );
		?>		<div class="archive clear">
		<h3 class="line catabs"><?php the_date(); ?> : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="archiveImg"><?php the_post_thumbnail( array( 228, 165 ) ); ?></p>
			<?php the_excerpt(); ?>
</div>
		<?php endforeach; wp_reset_postdata(); ?>

			<div id="backTop" class="clear">
				<p><a href="#pageTop">Back to Top</a></p>
			</div>
		</div>
	</div>