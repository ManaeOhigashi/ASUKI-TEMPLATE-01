<?php get_header(); ?>
<section id="shopinfoCnt" class="firstSection">
    <div class="homeInfo floatR">
	<div class="table">
	    <p class="cntTitle fontEN">SHOP INFO.</p>
	    <dl class="infoDL">
		<div><dt>ADRESS</dt><dd><?php echo get_post_meta($post->ID,'shopaddress',true); ?></dd></div>
		<div><dt>ACCESS</dt><dd><?php echo nl2br(get_post_meta($post->ID,shopAccess,true)); ?></dd></div>
		<div><dt>TEL</dt><dd><span data-action="call" data-tel="<?php echo get_post_meta($post->ID,'shopTel',true); ?>"><?php echo get_post_meta($post->ID,'shopTel',true); ?></span></dd></div>
		<div><dt>OPEN</dt><dd><?php echo nl2br(get_post_meta($post->ID,shopOpen,true)); ?></dd></div>
                <div><dt>CLOSE</dt><dd><?php echo nl2br(get_post_meta($post->ID,shopClose,true)); ?></dd></div>
                <div><dt>PARKING</dt><dd><?php echo nl2br(get_post_meta($post->ID,shopParking,true)); ?></dd></div>
		<div><dt>MAP</dt><dd><a href="<?php echo get_option('googleMapURL'); ?>" target="_blank">GoogleMapを開く</a></dd></div>
		<div><dt>FACEBOOK</dt><dd><a href="<?php echo get_option('facebookPage'); ?>" target="_blank">公式Facebookページ</a></dd></div>
	    </dl>
	</div>
    </div>
    <div class="shopinfoImg floatL">
        <div id="slideshow">
            <ul>
		<?php if(get_post_meta($post->ID, 'shopPhoto1', true)): ?>
		<li>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'shopPhoto1', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		</li>
		<?php endif; ?>
		<?php if(get_post_meta($post->ID, 'shopPhoto2', true)): ?>
		<li>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'shopPhoto2', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		</li>
		<?php endif; ?>
		<?php if(get_post_meta($post->ID, 'shopPhoto3', true)): ?>
		<li>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'shopPhoto3', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		</li>
		<?php endif; ?>
		<?php if(get_post_meta($post->ID, 'shopPhoto4', true)): ?>
		<li>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'shopPhoto4', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		</li>
		<?php endif; ?>
		<?php if(get_post_meta($post->ID, 'shopPhoto5', true)): ?>
		<li>
		<img src="<?php
			    $files = get_post_meta($post->ID, 'shopPhoto5', false);
			    foreach($files as $file){
			    $file = wp_get_attachment_url($file);
			    echo $file;
			    }
			    ?>">
		</li>
		<?php endif; ?>
            </ul>
        </div><!-- /#slideshow -->
    </div>
    <div class="clear"></div>
</section>
<div id="map_custmomize"></div>
<script>
jQuery(function($){
$.fn.autoChange = function(config) {
   // オプション
   var options = $.extend({
      effect  : 'fade',
      type    : 'repaet',
      timeout : 3000,
      speed   : 1000
   }, config);

   return this.each(function() {

      // カウンター初期化
      var current = 0;
      var next = 1;

      // 指定した要素の子要素を取得
      var element = $(this).children();

      // 要素を非表示にする
      $(element).hide();

      // img要素を非表示にする
      $('img', element).hide();

      // 最初の要素を表示にする
      $(element[0]).show();

      // 画像パス取得・背景画像としてセット
      for (i=0; i < element.length; i++) {
         var src = [];
         src[i] = $('img', element[i]).attr('src');
         $(element[i]).css('background-image','url('+src[i]+')');
      }

      // 要素の横幅をセット
      elementWidth();

      // ウィンドウをリサイズしたときに要素の横幅を再計算
      $(window).resize(function() {
         elementWidth();
      });

      // 要素の横幅をウィンドウサイズに合わせる
      function elementWidth() {
         var windowWidth = $(window).width();
         element.css('width',windowWidth);
      }

      // 要素を切り替えるスクリプト
      var change = function(){
         // フェードしながら切り替える場合
         if (options.effect == 'fade') {
            $(element[current]).fadeOut(options.speed);
            $(element[next]).fadeIn(options.speed);

         // スライドしながら切り替える場合
         } else if  (options.effect == 'slide') {
            $(element[current]).slideUp(options.speed);
            $(element[next]).slideDown(options.speed);
         }

         // リピートする場合
         if (options.type == 'repeat') {
            if ((next + 1) < element.length) {
                current = next;
                next++;
            } else {
                current = element.length - 1;
                next = 0;
            }
         }

         // 最後の要素でストップする場合
         if (options.type == 'stop') {
            if ((next + 1) < element.length) {
                current = next;
                next++;
            } else {
                return;
            }
         }
      };

      // 設定時間毎にスクリプトを実行
      var timer = setInterval(function(){change();}, options.timeout);

   });
};
});
// 自動切り替えする要素の設定
jQuery(function($){
   $('#slideshow ul').autoChange({effect : 'fade',type : 'repeat',timeout: 5000,speed : 2000});
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