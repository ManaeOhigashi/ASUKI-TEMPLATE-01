<?php get_header(); ?>
<section id="newsCnt">
    <p class="cntTitle secTitle fontEN">RECENT NEWS</p>
    <?php
	query_posts('name=newsinfo&post_type=page');
	if (have_posts()) : while (have_posts()) : the_post();
    ?>
    <?php echo nl2br(get_post_meta($post->ID,'newsPageInfo',true)); ?><br>
    <a href="<?php echo get_option('facebookPage'); ?>" target="_blank" class="textLink">公式フェイスブックページへ</a>
    <?php endwhile; endif; ?>
    <div class="clear"></div>
    <ul class="newsList">
		<?php
		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query('post_type=news' . '&paged=' . $paged . '&posts_per_page=3');
		?>
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    <li>
			<p class="deco01 fontENmin">Information</p>
			<p class="deco02 fontENmin">News ID : <?php the_time('Ymj') ?></p>
			<div class="newsListCnt">
			    <div class="newsTitle"><?php the_title(); ?></div>
			    <div class="newsDate fontEN"><?php the_time('Y.m.j') ?></div>
			    <div class="newsSummary"><?php echo nl2br(get_the_content()); ?></div>
			    <div class="clear"></div>
			</div>
		    </li>
		    <?php endwhile; ?>
		    <div class="pager">
			<p class="pagerBtn floatL fontEN"><?php previous_posts_link('&laquo; NEXT'); ?></p>
			<p class="pagerBtn floatR fontEN"><?php next_posts_link('PREV &raquo;'); ?></p>
		    </div>
		<?php $wp_query = null; $wp_query = $temp; ?>
	    </ul>
	    <ul class="recentList">
		<p class="cntTitle fontEN">BACK NUMBER</p>
		<div class="recentListCnt">
		<?php
			query_posts('showposts=15&post_type=news');
			if (have_posts()) : while (have_posts()) : the_post();
		?>
		<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; endif; ?>
		</div>
	    </ul>
	    <div class="clear"></div>
</section>
<?php get_footer(); ?>