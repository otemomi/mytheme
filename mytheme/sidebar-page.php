	<div id="sub">
		<div class="inner cf">
			<div class="archives">
			<h2>Categories</h2>
				<ul class="listcat">
					<?php wp_list_categories(array(
						'title_li' =>'',  //デフォルトで出力されるタイトルを非表示
						'show_count' => 1 //各カテゴリーに投稿数を表示する
						));
					?>
				</ul>
			</div>

			<div class="tags">
			<h2>Tags</h2>
				<ul>
					<?php $args = array(
					  	'orderby' => 'count',
					  	'order' => 'desc',
						);
						$tags = get_terms('post_tag', $args);
						foreach($tags as $value) {
					  		echo '<li><a href="'. get_tag_link($value->term_id) .'">'. $value->name .' <span>'. $value->count .'</span></a></li>';
						}
					?>
				</ul>
			</div>

			<div class="search">
			<h2>Search</h2>
				<?php get_search_form(); ?>
			</div>

			<div id="backTop" class="clear">
				<p><a href="#pageTop">Back to Top</a></p>
			</div>
		</div>
	</div>