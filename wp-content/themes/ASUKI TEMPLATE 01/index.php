<?php get_header(); ?>
<section class="homeSlider">
    <div class="sliderArea">
	<div class="pogoSlider" id="js-main-slider">
	    <?php
			query_posts('showposts=6&post_type=homeslider');
			if (have_posts()) : while (have_posts()) : the_post();
		?>
	    <div class="pogoSlider-slide" data-transition="fade" data-duration="1000"  style="background-image:url(<?php
			    $files = get_post_meta($post->ID, 'sliderImg', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>);">
		<h3 class="pogoSlider-slide-element homeSliderCatch">
		    <div>
		    <p class="title fontENmin"><?php echo get_post_meta($post->ID,'sliderCatch',true); ?></p>
		    <p class="sliderText"><?php echo nl2br(get_post_meta($post->ID,'sliderText',true)); ?></p>
		    </div>
		</h3>
	    </div>
	    <?php endwhile; endif; ?>
	</div><!-- .pogoSlider -->
    </div>
    
    <div class="clear"></div>
</section>
<section id="homeCheese">
    <p class="cntTitle fontEN">CONCEPT</p>
    <?php
	query_posts('name=concept&post_type=page');
	if (have_posts()) : while (have_posts()) : the_post();
    ?>
    <p class="cntCatch fontJP"><?php echo get_post_meta($post->ID,'conceptCatch',true); ?></p>
    <?php echo nl2br(get_post_meta($post->ID,'conceptText',true)); ?>
    <?php endwhile; endif; ?>
</section>
<section id="homeConcept" class="baseColorBG">
    <div class="homeMovie floatL">
	<?php
	    query_posts('name=concept&post_type=page');
	    if (have_posts()) : while (have_posts()) : the_post();
	?>
	<iframe src="https://www.youtube.com/embed/<?php echo get_option('youtubeID'); ?>" frameborder="0" allowfullscreen></iframe>
	<?php endwhile; endif; ?>
    </div>
    <div class="homeConcept floatR">
	<div class="newsCnt mainColorTX">
	    <p class="cntTitle fontEN">NEWS</p>
	    <dl class="homeInfoList">
		<?php
			query_posts('showposts=5&post_type=news');
			if (have_posts()) : while (have_posts()) : the_post();
		?>
		<div>
		    <dt class="fontENmin"><?php echo the_time('Y.m.d'); ?></dt>
		    <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		    <div class="clear"></div>
		</div>
		<?php endwhile; endif; ?>
	    </dl>
	</div>
    </div>
</section>
<section id="homeInfo" class="mainColorBG">
    <div class="homeInfo mainColorTX floatL">
	<div class="table">
	    <p class="cntTitle fontEN">SHOP INFO.</p>
	    <dl class="infoDL">
		<?php
		    query_posts('name=shopinfo&post_type=page');
		    if (have_posts()) : while (have_posts()) : the_post();
		?>
		<div><dt>ADRESS</dt><dd><?php echo get_post_meta($post->ID,'shopaddress',true); ?></dd></div>
		<div><dt>ACCESS</dt><dd><?php echo nl2br(get_post_meta($post->ID,'shopAccess',true)); ?></dd></div>
		<div><dt>TEL</dt><dd><span data-action="call" data-tel="<?php echo get_post_meta($post->ID,'shopTel',true); ?>"><?php echo get_post_meta($post->ID,'shopTel',true); ?></span></dd></div>
		<div><dt>OPEN</dt><dd><?php echo nl2br(get_post_meta($post->ID,'shopOpen',true)); ?></dd></div>
		<div><dt>CLOSE</dt><dd><?php echo nl2br(get_post_meta($post->ID,'shopClose',true)); ?></dd></div>
		<div><dt>PARKING</dt><dd><?php echo nl2br(get_post_meta($post->ID,'shopParking',true)); ?></dd></div>
		<div><dt>MAP</dt><dd><a href="<?php echo get_option('googleMapURL'); ?>" target="_blank">GoogleMapを開く</a></dd></div>
	    <?php endwhile; endif; ?>
	    </dl>
	</div>
    </div>
    <div class="homeFB floatR">
	<div class="table">
	    <img src="<?php bloginfo('template_url'); ?>/images/fbTitle.png" class="titleImg">
	    <div id="scrollbar" class="areaFB">
		<?php echo do_shortcode('[custom-facebook-feed]'); ?>
	    </div>
	</div>
    </div>
    <div class="clear"></div>
</section>
<div id="map_custmomize"></div>
<!-------------------------------------------- HOME SLIDER -------------------------------------------->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pogo-slider.min.css">
<script src="<?php bloginfo('template_url'); ?>/js/jquery.pogo-slider.min.js"></script>
<script>
jQuery(document).ready(function($){
    var mySlider = $('#js-main-slider').pogoSlider({
	autoplayTimeout: 5000,
	pauseOnHover: false,
	}).data('plugin_pogoSlider');
});
</script>
<!-------------------------------------------- GOOGLE MAP -------------------------------------------->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=<?php echo get_option('googleMapAPI'); ?>"></script>
<?php
	query_posts('name=mapinfo&post_type=page');
	if (have_posts()) : while (have_posts()) : the_post();
    ?>
<script>
function initialize() {
	  var latlng = new google.maps.LatLng(<?php echo get_post_meta($post->ID,'latitude',true); ?>,<?php echo get_post_meta($post->ID,'longitude',true); ?>);/*表示したい場所の経度、緯度*/
	  var myOptions = {
	    zoom: 17, /*拡大比率*/
	    center: latlng, /*表示枠内の中心点*/
            scrollwheel: false, /*マウスホイールでの拡大縮小無効*/
	    mapTypeControlOptions: { mapTypeIds: ['noText', google.maps.MapTypeId.ROADMAP] }/*表示タイプの指定*/
	  };
	  var map = new google.maps.Map(document.getElementById('map_custmomize'), myOptions);/*マップのID取得*/
	  /*スタイルのカスタマイズ*/
	  var styleOptions = <?php echo get_post_meta($post->ID,'mapCustom',true); ?>;
	 var styledMapOptions = { name: 'Milks -FRESH CHEESE & WINE-' }
	  var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
	  map.mapTypes.set('sample', sampleType);
	  map.setMapTypeId('sample');
	var icon = new google.maps.MarkerImage('<?php
			    $files = get_post_meta($post->ID, 'mapIcon', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>',
	  new google.maps.Size(55,65),/*アイコンのサイズ*/
	  new google.maps.Point(0,0)/*アイコンの位置*/
	);
	/*マーカーの設置*/
	var markerOptions = {
	  position: latlng,/*表示場所と同じ位置に設置*/
	  map: map,
	  icon: icon,
	  title: '<?php echo $site_title; ?>'/*マーカーのtitle*/
	};
	var marker = new google.maps.Marker(markerOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php endwhile; endif; ?>
<?php get_footer(); ?>