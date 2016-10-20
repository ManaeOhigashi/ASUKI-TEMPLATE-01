<?php
//----------------管理画面メニューで以下を非表示----------------//
if (!current_user_can('monsieur_culuculu')) {
  function remove_menus () {
    global $menu;
    $restricted = array(
      __('投稿'),
      __('メディア'),
      __('ツール'),
      __('コメント')
    );
    end ($menu);
    while (prev($menu)){
      $value = explode(' ',$menu[key($menu)][0]);
      if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
        unset($menu[key($menu)]);
      }
    }
  }
  add_action('admin_menu', 'remove_menus');
}
//-------------------------ヘッダー上部余白（管理バースペース）削除--------------------------//
add_filter( 'show_admin_bar', '__return_false' );
//-------------------------カスタム投稿アイコン設定--------------------------//
function add_menu_icons_styles(){
     echo '<style>
          #adminmenu #menu-posts-news div.wp-menu-image:before {
               content: "\f488";
          }
     </style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );
//-------------------------アイキャッチ設定--------------------------//
add_theme_support( 'post-thumbnails', array( 'news' ) );

//-------------------------外観＞テーマ＞カスタマイズ項目「サイトの配色」追加--------------------------//
add_action( 'customize_register', 'theme_customize_register' );
function theme_customize_register($wp_customize) {
  $main_color = '#7c0000';
  $base_color = '#2d3147';
  $effect_color = '#e3cf92';
  $text_color = '#fff';
    $wp_customize->add_section( 'sitecolor_section', array(
        'title'          =>'サイトの配色',
        'priority'       => 2,
    ));
//------メインカラー------//
$wp_customize->add_setting( 'main_color', array(
  'default' => $main_color,
    'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'main_color',
    array(
        'settings' => 'main_color',
        'label' => 'メインカラー',
        'section' => 'sitecolor_section',
)));
//------ベースカラー------//
$wp_customize->add_setting( 'base_color', array(
  'default' => $base_color,
    'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'base_color',
    array(
        'settings' => 'base_color',
        'label' => 'ベースカラー',
        'section' => 'sitecolor_section',
)));
//------アクセントカラー------//
$wp_customize->add_setting( 'effect_color', array(
  'default' => $effect_color,
    'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'effect_color',
    array(
        'settings' => 'effect_color',
        'label' => 'アクセントカラー',
        'section' => 'sitecolor_section',
)));
//------カラー背景上の文字色------//
$wp_customize->add_setting( 'main_color_text', array(
  'default' => $text_color,
    'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'main_color_text',
    array(
        'settings' => 'main_color_text',
        'label' => 'カラー背景上の文字色',
        'section' => 'sitecolor_section',
)));
//------白背景上の文字色------//
$wp_customize->add_setting( 'main_color_textW', array(
  'default' => $main_color,
    'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'main_color_textW',
    array(
        'settings' => 'main_color_textW',
        'label' => '白背景上の文字色',
        'section' => 'sitecolor_section',
)));
}
//-------------------------外観＞テーマ＞カスタマイズ項目「外部リンク設定」追加--------------------------//
function my_customizer($wp_customize){
$wp_customize -> add_section('link-custom' , array(
 'title' => '外部リンク設定',
 'priority' => 4
 ));
//------Facebook URL------//
 $wp_customize -> add_setting( 'facebookPage' , array(
 'type' => 'option',
 'transport' => 'postMessage'
 ));
 $wp_customize -> add_control(new WP_Customize_Control(
 $wp_customize,
 'link-custom_1',
 array(
 'section' => 'link-custom' ,
 'settings' => 'facebookPage' ,
 'label' => 'FacebookページのURL'
 )
 ));
//------GoogleMap URL------//
 $wp_customize -> add_setting( 'googleMapURL' , array(
 'type' => 'option',
 'transport' => 'postMessage'
 ));
 $wp_customize -> add_control(new WP_Customize_Control(
 $wp_customize,
 'link-custom_2',
 array(
 'section' => 'link-custom' ,
 'settings' => 'googleMapURL' ,
 'label' => 'Google MapのURL'
 )
 ));
 //------GoogleMap API------//
 $wp_customize -> add_setting( 'googleMapAPI' , array(
 'type' => 'option',
 'transport' => 'postMessage'
 ));
 $wp_customize -> add_control(new WP_Customize_Control(
 $wp_customize,
 'link-custom_5',
 array(
 'section' => 'link-custom' ,
 'settings' => 'googleMapAPI' ,
 'label' => 'Google MapのAPI'
 )
 ));
 //------YouTube ID------//
 $wp_customize -> add_setting( 'youtubeID' , array(
 'type' => 'option',
 'transport' => 'postMessage'
 ));
 $wp_customize -> add_control(new WP_Customize_Control(
 $wp_customize,
 'link-custom_3',
 array(
 'section' => 'link-custom' ,
 'settings' => 'youtubeID' ,
 'label' => 'YouTube動画ID（11桁）'
 )
 ));
 //------Facebook share step3code------//
 $wp_customize -> add_setting( 'facebookShare' , array(
 'type' => 'option',
 'transport' => 'postMessage'
 ));
 $wp_customize -> add_control(new WP_Customize_Control(
 $wp_customize,
 'link-custom_4',
 array(
 'section' => 'link-custom' ,
 'settings' => 'facebookShare' ,
 'label' => 'Facebook for developersにてFacebookシェアボタン作成→ステップ3のコードをここに記入'
 )
 ));
 }
add_action('customize_register' , 'my_customizer');

//-------------------------外観＞テーマ＞カスタマイズ項目「サイトの画像」追加--------------------------//
define('siteimage_section', 'logo_section');
define('logo_image', 'logo_image_url');
define('favicon', 'favicon_image_url');
function themename_theme_customizer( $wp_customize ) {
 $wp_customize->add_section( siteimage_section , array(
 'title' => 'サイトの画像',
 'priority' => 3
 ) );
//------ロゴ画像------//
 $wp_customize->add_setting( logo_image );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, logo_image, array(
 'label' => 'ロゴ画像',
 'section' => siteimage_section,
 'settings' => logo_image,
 'description' => '横長の画像にしてください。',
 ) ) );
 //------ファビコン------//
 $wp_customize->add_setting( favicon_image );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, favicon_image, array(
 'label' => 'ファビコン',
 'section' => siteimage_section,
 'settings' => favicon_image,
 'description' => '32px×32px、フォーマットはICOにしてください。',
 ) ) );
 //------スマホヘッダーのマップアイコン画像------//
 $wp_customize->add_setting( headmap_image );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, headmap_image, array(
 'label' => 'スマホヘッダーのマップアイコン画像',
 'section' => siteimage_section,
 'settings' => headmap_image,
 'description' => '80px×80px、背景透過png画像にしてください。',
 ) ) );
}
add_action( 'customize_register', 'themename_theme_customizer' );
function get_the_logo_image_url(){
 return esc_url( get_theme_mod( logo_image ) );
}
function get_the_favicon_image_url(){
 return esc_url( get_theme_mod( favicon_image ) );
}
function get_the_headmap_image_url(){
 return esc_url( get_theme_mod( headmap_image ) );
}
?>