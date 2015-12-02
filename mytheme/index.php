<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main" class="inner">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<p class="date"><?php the_date(); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>

				<p><span class="cat"><?php the_category(' '); ?></span>
				<span class="tag"><?php the_tags(' '); ?></span></p>

				<?php endwhile; else : ?>
					<h2>お探しのページはありません。</h2>
					<p>大変申し訳ありません。お探しのページは見つかりませんでした。<br>
					URLに間違いがないか確認してください。</p>
				<?php endif; ?>

		</div>
	</div>
<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
