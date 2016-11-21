<div class="clear"></div>
<section id="footer" class="baseColorBG">
    <div class="footForm mainColorTX floatL">
	<p class="cntTitle fontEN">CONTACT US</p>
	<p class="sub">ご意見・ご質問等お気軽にお問い合せください。<br>※こちらのフォームからのご予約は承っておりません。ご予約はお電話にてお願いいたします。</p>
	<?php echo do_shortcode('[contact-form-7 id="4" title="footForm"]'); ?>
    </div>
    <div class="footNav floatR">
    <?php
	query_posts('name=shopinfo&post_type=page');
	if (have_posts()) : while (have_posts()) : the_post();
    ?>
	<ul class="fontEN">
	   <a href="<?php echo home_url(); ?>/"><li>HOME</li></a>
	   <a href="<?php echo home_url(); ?>/concept"><li>CONCEPT</li></a>
	   <a href="<?php echo home_url(); ?>/menu"><li>MENU</li></a>
	   <a href="<?php echo home_url(); ?>/shopinfo"><li>SHOP INFO.</li></a>
	   <a href="<?php echo home_url(); ?>/news"><li>NEWS</li></a>
	   <a href="<?php echo get_option('googleMapURL'); ?>" target="_blank"><li>GOOGLE MAP</li></a>
	   <a href="<?php echo get_option('facebookPage'); ?>" target="_blank"><li>FACEBOOK</li></a>
	</ul>
	<div class="shareSNS">
	    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	    <?php echo get_option('facebookShare'); ?>
	</div>
	<div class="footInfo mainColorTX">
	    <h3><?php echo get_post_meta($post->ID,'shopName',true); ?></h3>
	    <?php echo get_post_meta($post->ID,'shopaddress',true); ?><br>
	    OPEN <?php echo get_post_meta($post->ID,'shopOpen',true); ?><br>
	    CLOSE <?php echo get_post_meta($post->ID,'shopClose',true); ?><br>
	    TEL <span data-action="call" data-tel="<?php echo get_post_meta($post->ID,'shopTel',true); ?>" class="fontENmin"><?php echo get_post_meta($post->ID,'shopTel',true); ?></span>
	</div>
    <?php endwhile; endif; ?>
    </div>
    <div class="clear"></div>
</section>
<!--------------------------------------------TELEPHONE LINK-------------------------------------------->
<script>
jQuery(function($){
    if (!isPhone())
        return;

    $('span[data-action=call]').each(function() {
        var $ele = $(this);
        $ele.wrap('<a href="tel:' + $ele.data('tel') + '"></a>');
    });
});
function isPhone() {
    return (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('Android') > 0);
}
</script>
<!----------------------------------------　smooth scroll ------------------------------------->
<script>
jQuery(function(){
	// ★　ヘッダーの高さ（任意のズレ高さ）ピクセル数を入力　↓
	var headerHight = 60;
   // #で始まるアンカーをクリックした場合に処理
   jQuery('a[href^=#]').click(function() {
	  // スクロールの速度
	  var speed = 400; // ミリ秒
	  // アンカーの値取得
	  var href= jQuery(this).attr("href");
	  // 移動先を取得
	  var target = jQuery(href == "#" || href == "" ? 'html' : href);
	  // 移動先を数値で取得
	  var position = target.offset().top-headerHight; // ※　-headerHightでズレの処理
	  // スムーズスクロール
	  jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
   });
});
</script>
<!-------------------------------------------- DRAWER MENU -------------------------------------------->
<script src="//cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.1/iscroll-min.js"></script>
<script src="//cdn.rawgit.com/ungki/bootstrap.dropdown/3.3.1/dropdown.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.drawer.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/drawer.css">
<script>
  jQuery(document).ready(function($){

    $('.drawer').drawer();

    $('.drawer-api-toggle').on(function(){
      $('.drawer').drawer("open");
    });

    $('.drawer').on('drawer.opened',function(){
      console.log('opened');
    });

    $('.drawer').on('drawer.closed',function(){
      console.log('closed');
    });

    $('.drawer-dropdown-hover').hover(function(){
      $('[data-toggle="dropdown"]', this).trigger('click');
    });

  });
</script>
<!-------------------------------------------- FB share -------------------------------------------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-------------------------------------------- WP Customizer -------------------------------------------->
<style type="text/css">
/*----- メインカラー -----*/
.mainColorBG,
.cff-viewpost-facebook:hover,
.textLink:hover { background-color: <?php echo get_option('main_color'); ?>; color: <?php echo get_option('main_color_text'); ?>;}
/*----- ベースカラー -----*/
.baseColorBG { background-color: <?php echo get_option('base_color'); ?>; color: <?php echo get_option('main_color_text'); ?>;}
/*----- アクセントカラー -----*/
.effectColor,
.cff-viewpost-facebook,
.textLink,
input[type="submit"]:hover,
.pagerBtn,
div.wpcf7-mail-sent-ok { background-color: <?php echo get_option('effect_color'); ?>; color: <?php echo get_option('main_color_textW'); ?>;}
.effectColorTX,
.headNav li a:hover,
.homeConcept dd a:hover,
.infoDL dd a:hover,
.footNav ul a:hover li,
.infoDL dt { color: <?php echo get_option('effect_color'); ?>;}
header { border-bottom: 5px <?php echo get_option('effect_color'); ?> solid;}
/*----- カラー背景上の文字色 -----*/
.mainColorTX,
.headNav li a,
.homeConcept dd a,
.infoDL dd a,
.footNav ul a li { color: <?php echo get_option('main_color_text'); ?>;}
input[type="submit"],
.drawer-hamburger-icon, .drawer-hamburger-icon:before, .drawer-hamburger-icon:after { background-color: <?php echo get_option('main_color_text'); ?>; color: <?php echo get_option('main_color'); ?>;}
input[type="text"], input[type="email"], textarea { border: 1px <?php echo get_option('main_color_text'); ?> solid;}
.footInfo, .footNav { border-top: 1px <?php echo get_option('main_color_text'); ?> solid;}
/*----- 白背景上の文字色 -----*/
body,
.mainColorTXW,
.cff-page-name,
.cff-date,
.cff-post-text,
.cff-viewpost-facebook,
.pagerBtn a,
.pagerBtnAll,
#shopinfoCnt .infoDL dd a,
.recentListCnt a { color: <?php echo get_option('main_color_textW'); ?>;}
.newsList li,
.dinnerList { border: 1px <?php echo get_option('main_color_textW'); ?> solid;}
.newsDate { border-bottom: 1px <?php echo get_option('main_color_textW'); ?> solid;}
.recentListCnt li,
.dinnerList .line { border-bottom: 1px <?php echo get_option('main_color_textW'); ?> dashed;}
</style>
<?php wp_footer(); ?>
</body>
</html>