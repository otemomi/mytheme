<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<p class="date"><?php the_date(); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( get_the_modified_date('Y') <= date('Y') - 2 ) { ?>
						<aside class="status">
						<h3>ご注意</h3>
							<p>この記事は <strong><?php the_time('Y年n月j日') ?></strong> に書いたものです。現在は状況が異なる可能性がありますのでご注意ください。</p>
						</aside>
					<?php } ?>

					<?php the_content(); ?>

				<p><span class="cat"><?php the_category(' '); ?></span>
				<span class="tag"><?php the_tags(' '); ?></span></p>

				<div class="pagenav cf">
					<span class="prevPost">
						古い記事:<?php
						$previous_post = get_previous_post();
						$pre_post_title = $previous_post->post_title;
						if ( mb_strlen( $pre_post_title ) > 18 ) { $pre_post_title = mb_substr( $pre_post_title, 0, 18).'...'; }
						if ( !empty( $previous_post ) ): ?>
							<a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" title="<?php echo $previous_post->post_title; ?>"><i class="fa fa-chevron-circle-left"></i> <?php echo $pre_post_title; ?></a>
						<?php endif; ?>
					</span>
					<span class="nextPost">
						新しい記事:<?php
						$next_post = get_next_post();
						$next_post_title = $next_post->post_title;
						if ( mb_strlen( $next_post_title ) > 18 ) { $next_post_title = mb_substr( $next_post_title, 0, 18).'...'; }
						if ( !empty( $next_post ) ): ?>
							<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo $next_post->post_title; ?>"><?php echo $next_post_title; ?> <i class="fa fa-chevron-circle-right"></i></a>
						<?php endif; ?>
					</span>
				</div>
				<?php endwhile; else : ?>
					<h2>お探しのページはありません。</h2>
					<p>大変申し訳ありません。お探しのページは見つかりませんでした。<br>
					URLに間違いがないか確認してください。</p>
				<?php endif; ?>

		</div>
	</div>

	<div id="sub">
		<div class="inner cf">
		<h2>Comments</h2>
		<?php comments_template('', true); ?>

			<div id="backTop">
				<p><a href="#pageTop">Back to Top</a></p>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
