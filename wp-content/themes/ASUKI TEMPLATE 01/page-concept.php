<?php get_header(); ?>
<section id="conceptCnt" class="conceptCnt firstSection">
    <div class="cnt01 effectColor">
	<div class="conceptImg" style="background-image:url(<?php
			    $files = get_post_meta($post->ID, conceptImg, false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>);"></div>
	<div class="conceptSub">
	    <p class="cntTitle secTitle textL fontEN">CONCEPT</p>
	    <p class="cntCatch textL fontJP"><?php echo get_post_meta($post->ID,'conceptCatch',true); ?></p>
            <?php echo nl2br(get_post_meta($post->ID,conceptSub,true)); ?>
	</div>
	<div class="clear"></div>
    </div>
    <div class="cnt02">
	<div class="conceptSub textC">
	    <p class="cntTitle fontEN">PROMOTION VIDEO</p>
            <?php echo nl2br(get_post_meta($post->ID,conceptMovieTX,true)); ?><br><br>
	    <iframe src="https://www.youtube.com/embed/<?php echo get_option('youtubeID'); ?>" frameborder="0" allowfullscreen></iframe><br>
	    <a href="https://youtu.be/<?php echo get_post_meta($post->ID,'conceptMovieID',true); ?>" target="_blank" class="textLink">PLAY ON YOU TUBE</a>
	</div>
	<div class="clear"></div>
    </div>
</section>
<?php get_footer(); ?>