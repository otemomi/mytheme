	<div id="sub">
		<div class="container cf">
		<h2>Recent article</h2>

		<?php $post_args = array( 'posts_per_page' => 4, 'offset' => 1 );
			$shohin_posts = get_posts( $post_args );
				foreach($shohin_posts as $post) :
			setup_postdata( $post );
		?>
		<div class="archive">
		<p><?php the_post_thumbnail('topimg'); ?></p>
		<div class="caption">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<p><span class="cat"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
			<span class="tag">
				<?php
				$posttags = get_the_tags();
				$count = count($posttags);
				$loop = 0;
				if ($posttags) {
				foreach ($posttags as $tag) {
					$loop++;
					if ($count == $loop){
					echo $tag->name . '';
					} else {
					echo $tag->name . ', ';
					}
					}
				} ?>
			</span></p>
		</div>
		</div>
		<?php endforeach; wp_reset_postdata(); ?>

			<div id="backTop" class="clear">
				<p><a href="#pageTop">Back to Top</a></p>
			</div>
		</div>
	</div>