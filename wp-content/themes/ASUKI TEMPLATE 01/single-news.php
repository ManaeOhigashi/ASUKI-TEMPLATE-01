<?php get_header(); ?>
<section id="newsCnt">
    <p class="cntTitle fontEN">RECENT NEWS</p>
    <div class="clear"></div>
    <ul class="newsList">
	<?php while ( have_posts() ) : the_post(); ?>
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
	<?php endwhile; // end of the loop. ?>
	<div class="nav-below">
	    <p class="pagerBtn floatL fontEN"><?php next_post_link('%link', '«NEXT'); ?></p>
	    <p class="pagerBtn floatR fontEN"><?php previous_post_link('%link', 'PREV»'); ?></p>
	    <div class="clear"></div>
	    <a href="<?php echo home_url(); ?>/news" class="pagerBtnAll fontEN">VIEW ALL</a>
	</div>
	<?php wp_reset_query(); ?>
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