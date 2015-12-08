<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main" class="container cf">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 class="pagetitle"><?php the_title(); ?></h2>
			<?php the_content(); ?>

				<?php endwhile; else : ?>
					<h2>お探しのページはありません。</h2>
					<p>大変申し訳ありません。お探しのページは見つかりませんでした。<br>
					URLに間違いがないか確認してください。</p>
				<?php endif; ?>
		</div>
	</div>

	<div id="sub">
		<div class="container cf">
		<h2>Contact</h2>

		<?php echo do_shortcode('[contact-form-7 id="32" title="コンタクトフォーム 1"]'); ?>

			<div id="backTop" class="clear">
				<p><a href="#pageTop">Back to Top</a></p>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
