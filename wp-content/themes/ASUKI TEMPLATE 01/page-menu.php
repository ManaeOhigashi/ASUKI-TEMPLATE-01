<?php get_header(); ?>
<section id="dinnermenu" class="firstSection lunchmenu" style="background-image:url(<?php
			    $files = get_post_meta($post->ID, 'menuBG', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>);">
    <p class="cntTitle secTitle fontEN">MENU</p>
    <div class="menuTextCnt"><?php echo nl2br(get_post_meta($post->ID,'menuPageSub',true)); ?></div>

    <!------------------- メニューカテゴリー アンカーループ（開始） ------------------->
    <ul class="pageAnchor">
	<?php
	    query_posts('showposts=100&post_type=menucategory');
	    if (have_posts()) : while (have_posts()) : the_post();
	?>
	<a href="#<?php echo get_post_meta($post->ID,'menuItemCatName',true); ?>" class="textLink"><?php the_title(); ?></a>
	<?php endwhile; endif; ?>
    </ul>
    <!------------------- メニューカテゴリー アンカーループ（終了） ------------------->
    <!------------------- メニューカテゴリー ループ（開始） ------------------->
    <div class="menuCnt">
	<?php
	    query_posts('showposts=100&post_type=menucategory');
	    if (have_posts()) : while (have_posts()) : the_post();
	?>
	<ul id="<?php echo get_post_meta($post->ID,'menuItemCatName',true); ?>" class="dinnerList">
	    <p class="menuCatTitle fontEN"><?php echo get_post_meta($post->ID,'menuCatNameEN',true); ?></p>
	    <span class="menuCatTitleJP fontJP"><?php echo get_post_meta($post->ID,'menuCatNameJP',true); ?></span>
	    
	    <!------------------- メニューアイテム＞カテゴリー　ループ（開始） ------------------->
	    <?php $posts = get_posts('post_type=menu&category_name=' . get_post_meta($post->ID,'menuItemCatName',true) . '&posts_per_page=100');?>
	    <?php foreach ($posts as $post) : setup_postdata($post); ?>
	    
	    <?php
		$cats = get_the_category();
		foreach($cats as $cat):
		if($cat->parent) echo '<span class="catChildName fontEN">' . $cat->cat_name . '</span>';
		endforeach;
	    ?>
	    <li class="menuItem">
		<?php if(get_post_meta($post->ID, 'menuImg', true)): ?>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'menuImg', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		<?php endif; ?>
		<?php if(get_post_meta($post->ID, 'menuImg', true)): ?><div class="menuSubCnt"><?php endif; ?>
		<p class="titleEN fontEN"><?php echo get_post_meta($post->ID,'menuNameEN',true); ?></p>
		<p class="titleJP"><?php echo get_post_meta($post->ID,'menuNameJP',true); ?></p>
		<?php if(get_post_meta($post->ID, 'menuSub', true)): ?><p class="sub"><?php echo get_post_meta($post->ID,'menuSub',true); ?></p><?php endif; ?>
		<p class="price fontENmin"><?php echo get_post_meta($post->ID,'menuPrice',true); ?><span>yen</span></p>
		<?php if(get_post_meta($post->ID, 'menuImg', true)): ?></div><?php endif; ?>
		<div class="line"></div>
	    </li>
	    <?php endforeach; wp_reset_postdata(); ?>
	    <!------------------- メニューアイテム＞カテゴリー　ループ（終了） ------------------->
	    <div class="clear"></div>
	    <div class="menuNotice effectColorTX">
	    <?php $ctm = get_post_meta($post->ID, 'menuCatNoticeB', true);?>
	    <?php if(empty($ctm)):?>
	    <?php else:?>
	    <?php echo nl2br(get_post_meta($post->ID,'menuCatNoticeB',true)); ?>
	    <?php endif;?>
	    </div>

	</ul>
	<?php endwhile; endif; ?>
    </div>
    <!------------------- メニューカテゴリー ループ（開始） ------------------->    
</section>
<?php get_footer(); ?>