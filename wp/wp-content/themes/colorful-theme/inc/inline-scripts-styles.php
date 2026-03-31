<?php

add_action( 'wp_enqueue_scripts', 'inline_style' );
add_action( 'wp_head', 'add_head_above' );
add_action( 'wp_body_open', 'add_body_below' );
add_action( 'wp_footer', 'add_footer' );
add_action( 'admin_enqueue_scripts', 'admin_inline_style' );

function inline_style() {
	$current_object = get_queried_object();
	if ( !empty($current_object) ) {
		if ( $current_object->post_type == 'page' || $current_object->post_type == 'block_pattern' ) {
			$post_id = $current_object->ID;
			$theme_options = get_theme_options();

			// ページ幅
			if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) { // 全体設定
				if( $theme_options['pwidth'] ) {
					$pwidth = $theme_options['pwidth'];
				} else {
					$pwidth = 1000;
				}
			} else { // 個別設定
				if( get_field('pwidth', $post_id) ) {
					$pwidth = get_field('pwidth', $post_id);
				} else {
					$pwidth = 1000;
				}
			}

			// フォント
			if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) { // 全体設定
				if($theme_options['webfonts'] === 'on') {
					$font_family = $theme_options['font_family_web'];
				} else {
					$font_family = $theme_options['font_family'];
				}
			} else { // 個別設定
				if(get_field('webfonts', $post_id) === 'on') {
					$font_family = get_field('font_family_web', $post_id);
				} else {
					$font_family = get_field('font_family', $post_id);
				}
			}
			switch( $font_family ) {
				case 1:
					$font = '"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo, Osaka,"ＭＳ Ｐゴシック","MS PGothic",sans-serif';
					break;
				case 2:
					$font = '"ヒラギノ明朝 Pro W3","ＭＳ Ｐ明朝",serif';
					break;
				case 3:
					$font = '"メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック",sans-serif';
					break;
				case 4:
					$font = '"ヒラギノ丸ゴ Pro W4","ヒラギノ丸ゴ Pro","Hiragino Maru Gothic Pro","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","HG丸ｺﾞｼｯｸM-PRO","HGMaruGothicMPRO"';
					break;
				case 5:
					$font = '"游ゴシック体","Yu Gothic",YuGothic,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo,Arial,Sans-Serif';
					break;
				case 6:
					$font = '"游明朝",YuMincho,"Hiragino Mincho ProN","Hiragino Mincho Pro","ＭＳ 明朝",serif';
					break;
				case 7:
					$font = '"Noto Sans JP",sans-serif';
					echo '<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&display=swap&subset=japanese" rel="stylesheet">';
					break;
				case 8:
					$font = '"Noto Serif JP",serif';
					echo '<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:200,300,400,500,600,700,900&display=swap&subset=japanese" rel="stylesheet">';
					break;
				default:
					$font = '"Open Sans",Helvetica,Arial,sans-serif';
					break;
			}

			if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) { // 全体設定
				// フォントサイズ
				if( $theme_options['fontsize'] ) {
					$fontsize = $theme_options['fontsize'];
				} else {
					$fontsize = 18;
				}
				// 行間
				if( $theme_options['lineheight'] ) {
					$lineheight = $theme_options['lineheight'];
				} else {
					$lineheight = 1.8;
				}
				// 文字詰め
				$kerning = 'normal';
			} else { // 個別設定
				// フォントサイズ
				if( get_field('fontsize', $post_id) ) {
					$fontsize = get_field('fontsize', $post_id);
				} else {
					$fontsize = 18;
				}
				// 行間
				if( get_field('lineheight', $post_id) ) {
					$lineheight = get_field('lineheight', $post_id);
				} else {
					$lineheight = 1.8;
				}
				// 文字詰め
				if( get_field('kerning', $post_id) === 'on' ) {
					$kerning = '"palt"';
				} else {
					$kerning = 'normal';
				}
			}

			// 全体設定分岐
			$entire_enable = false;
			if( is_page() ) {
				if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) {
					$entire_enable = true;
				}
			} elseif( is_singular('colorful-hfcontent') ) {
				if( get_field('hf_entire_enable', $post_id) !== 'on' ) {
					$entire_enable = true;
				}
			}

			// 背景色反映
			if( $entire_enable ) { // 全体設定
				if( isset($theme_options['bg_color']) && $theme_options['bg_color'] ) {
					$background_color = $theme_options['bg_color'];
				} else {
					$background_color = '#FFF';
				}
				if( isset($theme_options['bg_image']) && $theme_options['bg_image'] ) {
					$background_image = $theme_options['bg_image'];
				} else {
					$background_image = '';
				}
				if( isset($theme_options['bg_repeat']) && $theme_options['bg_repeat'] ) {
					$background_repeat = $theme_options['bg_repeat'];
				} else {
					$background_repeat = 'repeat';
				}
				if( isset($theme_options['bg_attachment']) && $theme_options['bg_attachment'] ) {
					$background_attachment = $theme_options['bg_attachment'];
				} else {
					$background_attachment = 'scroll';
				}
				if( isset($theme_options['bg_position']) && $theme_options['bg_position'] ) {
					$background_position = $theme_options['bg_position'];
				} else {
					$background_position = 'left';
				}
			} else { // 個別設定
				if( get_field('background_color', $post_id) ) {
					$background_color = get_field('background_color', $post_id);
				} else {
					$background_color = '#FFF';
				}
				if( get_field('background_image', $post_id) ) {
					$background_image = get_field('background_image', $post_id);
				} else {
					$background_image = '';
				}
				if( get_field('background_repeat', $post_id) ) {
					$background_repeat = get_field('background_repeat', $post_id);
				} else {
					$background_repeat = 'repeat';
				}
				if( get_field('background_attachment', $post_id) ) {
					$background_attachment = get_field('background_attachment', $post_id);
				} else {
					$background_attachment = 'scroll';
				}
				if( get_field('background_position', $post_id) ) {
					$background_position = get_field('background_position', $post_id);
				} else {
					$background_position = 'left';
				}
			}

			// 記事背景色反映
			if( $entire_enable ) { // 全体設定
				if( $theme_options['content_bg_color'] ) {
					$content_bgcolor = $theme_options['content_bg_color'];
				} else {
					$content_bgcolor = '#FFF';
				}
				if( $theme_options['content_bg_image'] ) {
					$content_bgimage = $theme_options['content_bg_image'];
				} else {
					$content_bgimage = '';
				}
				if( $theme_options['content_bg_repeat'] ) {
					$content_bgrepeat = $theme_options['content_bg_repeat'];
				} else {
					$content_bgrepeat = 'repeat';
				}
				if( $theme_options['content_bg_attachment'] ) {
					$content_bgattachment = $theme_options['content_bg_attachment'];
				} else {
					$content_bgattachment = 'scroll';
				}
				if( $theme_options['content_bg_position'] ) {
					$content_bgposition = $theme_options['content_bg_position'];
				} else {
					$content_bgposition = 'left';
				}
			} else { // 個別設定
				if( get_field('content_bg_enable', $post_id) !== 'on' ) {
					$content_bgcolor = 'transparent';
					$content_bgimage = '';
					$content_bgrepeat = 'repeat';
					$content_bgattachment = 'scroll';
					$content_bgposition = 'left';
				} else {
					if( get_field('content_bgcolor', $post_id) ) {
						$content_bgcolor = get_field('content_bgcolor', $post_id);
					} else {
						$content_bgcolor = '#FFF';
					}
					if( get_field('content_bgimage', $post_id) ) {
						$content_bgimage = get_field('content_bgimage', $post_id);
					} else {
						$content_bgimage = '';
					}
					if( get_field('content_bgrepeat', $post_id) ) {
						$content_bgrepeat = get_field('content_bgrepeat', $post_id);
					} else {
						$content_bgrepeat = 'repeat';
					}
					if( get_field('content_bgattachment', $post_id) ) {
						$content_bgattachment = get_field('content_bgattachment', $post_id);
					} else {
						$content_bgattachment = 'scroll';
					}
					if( get_field('content_bgposition', $post_id) ) {
						$content_bgposition = get_field('content_bgposition', $post_id);
					} else {
						$content_bgposition = 'left';
					}
				}
			}

			// 影の色
			if( $entire_enable ) { // 全体設定
				$shadow_color = ($theme_options['shadow_color'])? $theme_options['shadow_color'] : '#000000';
				$shadow_color = str_replace('#', '', $shadow_color);
				$rgb = array(
					hexdec(substr($shadow_color, 0, 2)),
					hexdec(substr($shadow_color, 2, 2)),
					hexdec(substr($shadow_color, 4, 2))
				);
				$shadow_color = sprintf('rgba(%2d,%2d,%2d,0.25)', $rgb[0], $rgb[1], $rgb[2]);
			} else { // 個別設定
				$shadow_color = (get_field('shadow_color', $post_id))? get_field('shadow_color', $post_id) : '#000000';
				$shadow_color = str_replace('#', '', $shadow_color);
				$rgb = array(
					hexdec(substr($shadow_color, 0, 2)),
					hexdec(substr($shadow_color, 2, 2)),
					hexdec(substr($shadow_color, 4, 2))
				);
				$shadow_color = sprintf('rgba(%2d,%2d,%2d,0.25)', $rgb[0], $rgb[1], $rgb[2]);
			}

			$css = <<<EOF
	body {
		background-color: ${background_color};
EOF;

		if ( $background_image ) {
			$css .= <<<EOF
		background-image: url('${background_image}');
		background-repeat: ${background_repeat};
		background-attachment: ${background_attachment};
		background-position: ${background_position};
EOF;
		}

			$css .= <<<EOF

	}
	.colorful_content {
		font-size: ${fontsize}px;
		max-width: ${pwidth}px;
		background-color: ${content_bgcolor};
EOF;

		if ( $content_bgimage ) {
			$css .= <<<EOF
		background-image: url('${content_bgimage}');
		background-repeat: ${content_bgrepeat};
		background-attachment: ${content_bgattachment};
		background-position: ${content_bgposition};
EOF;
		}

		if( $entire_enable ) {
			if( $theme_options['shadow_enable'] === 'on' ) {
				$css .= <<<EOF
		box-shadow: 0 0 10px ${shadow_color};
EOF;
			}
		} else {
			if( get_field('shadow_enable', $post_id) === 'on' && get_field('content_bg_enable', $post_id) === 'on' ) {
				$css .= <<<EOF
		box-shadow: 0 0 10px ${shadow_color};
EOF;
			}
		}

			$css .= <<<EOF

	}
	.colorful_content,
	.colorful_content p {
		font-family: ${font};
		line-height: ${lineheight};
		font-feature-settings: ${kerning};
	}
	.colorful_content ul,
	.colorful_content ol,
	.colorful_content h1,
	.colorful_content h2,
	.colorful_content h3,
	.colorful_content h4,
	.colorful_content h5,
	.colorful_content h6,
	.colorful_content .wp-block-cover h1,
	.colorful_content .wp-block-cover h2,
	.colorful_content .wp-block-cover h3,
	.colorful_content .wp-block-cover h4,
	.colorful_content .wp-block-cover h5,
	.colorful_content .wp-block-cover h6 {
		font-family: ${font};
	}
	.colorful_cover_inner {
		max-width: ${pwidth}px !important;
	}
	.colorful_content .colorful-ffs {
		font-feature-settings: "palt";
	}
EOF;

			if( get_field('countdown_method', $post_id) === 'access' || get_field('countdown_method', $post_id) === 'date' ) {
				if( get_field('countdown_design', $post_id) === 'design1' ) {
					$countdown_bgcolor = get_field('countdown_bgcolor', $post_id);
					$countdown_fontcolor = get_field('countdown_fontcolor', $post_id);
					if(!$countdown_bgcolor) $countdown_bgcolor = 'inherit';
					if(!$countdown_fontcolor) $countdown_fontcolor = 'inherit';
					$css .= <<<EOF
	.navbar .navbar-inner {
		background-color:${countdown_bgcolor};
	}
	.navbar .brand {
		color:${countdown_fontcolor};
	}
EOF;
				}

				if( !get_field('countdown_indesign', $post_id) || get_field('countdown_indesign', $post_id) === 'none'
				 || get_field('countdown_indesign', $post_id) === 'design3' || get_field('countdown_indesign', $post_id) === 'design4' ) {
					$css .= <<<EOF
	.navbar-nofix .navbar-inner {
		background-color:inherit;
	}
	.navbar-nofix .brand {
		color:inherit;
	}
EOF;
				}

				if( get_field('countdown_indesign', $post_id) === 'design1' ) {
					$countdown_inbgcolor = get_field('countdown_inbgcolor', $post_id);
					$countdown_infontcolor = get_field('countdown_infontcolor', $post_id);
					if(!$countdown_inbgcolor) $countdown_inbgcolor = 'inherit';
					if(!$countdown_infontcolor) $countdown_infontcolor = 'inherit';
					$css .= <<<EOF
	.navbar-nofix {
		margin-bottom: 0;
	}
	.navbar-nofix .navbar-inner {
		background-color:${countdown_inbgcolor};
		height: 60px;
	}
	.navbar-nofix .brand {
		color:${countdown_infontcolor};
	}
EOF;
				}

				if( get_field('countdown_top', $post_id) === 'off' ) {
					$css .= <<<EOF
.navbar-fixed {
	height: 30px;
	position: fixed;
	z-index: 10;
}
.navbar-fixed .navbar-inner {
	display: none;
}
EOF;
				}
			}

				wp_add_inline_style( 'colorful-style', $css );
		}
	}
}

function add_head_above() {
	$post_id = get_queried_object_id();
	$custom_css = get_custom_css();
	if( isset($custom_css['css']) && $custom_css['css'] ) {
		echo '<style type="text/css">'."\n";
		echo $custom_css['css']."\n";
		echo '</style>'."\n";
	}

	if( get_field('gacode', $post_id) ) {
		the_field('gacode', $post_id);
	}

	if( isset($custom_css['head']) && $custom_css['head'] ) {
		echo $custom_css['head'];
	}
}

function add_body_below() {
	$post_id = get_queried_object_id();
	$custom_css = get_custom_css();
	if( isset($custom_css['body']) && $custom_css['body'] ) {
		echo $custom_css['body'];
	}

	if( get_field('free', $post_id) ) {
		the_field('free', $post_id);
	}
}

function add_footer() {
	$post_id = get_queried_object_id();
	$countdown_url = get_field('countdown_url', $post_id);

	$script = <<<EOF
jQuery(function($){
$('#navbar').mouseover(function() {
	if( $('#filter')[0] && $('#subwin')[0] ) {
		$('#filter').show();
		$('#subwin').show();
	}
});
$('#filter, #subwin .close a').click(function() {
	if( $('#filter')[0] && $('#subwin')[0] ) {
		$('#filter').hide();
		$('#subwin').hide();
	}
	return false;
});
});
EOF;

	// ワンタイムオファー
	if( get_field('countdown_method', $post_id) === 'one' ) {
		$script .= <<<EOF
jQuery(function($){
var today = new Date();
if( GetCookie('onetime${post_id}') == null ) {
	var cookieExpire = new Date( today.getFullYear(), today.getMonth() + 6, today.getDate() );
	document.cookie = 'onetime${post_id}=1; expires=' + cookieExpire.toUTCString();
} else {
	location.href = '${countdown_url}';
}

function GetCookie(name){
	var result = null;
	var cookieName = name + '=';
	var cookies = document.cookie;
	var position = cookies.indexOf(cookieName);

	if( position != -1 ) {
		var startIndex = position + cookieName.length;
		var endIndex = cookies.indexOf(';', startIndex);
		if( endIndex == -1 ) { endIndex = cookies.length; }
		result = decodeURIComponent( cookies.substring(startIndex, endIndex) );
	}
	return result;
}
});
EOF;
	// アクセス後カウント方式 or 日時指定方式
	} elseif( get_field('countdown_method', $post_id) === 'access' || get_field('countdown_method', $post_id) === 'date' ) {
		$script .= <<<EOF
jQuery(function($){
var today = new Date();
EOF;

		if( get_field('countdown_method', $post_id) === 'access' ) {
			$script .= <<<EOF
	if( GetCookie('endDate${post_id}') == null ) {
EOF;

			if( get_field('cookie_expires', $post_id) ) {
				$expires = floatval(get_field('cookie_expires', $post_id));
				$floor = floor($expires);
				$minutes = intval(60 * ($expires - $floor));
				$script .= <<<EOF
		var endDate = new Date( today.getFullYear(), today.getMonth(), today.getDate(), today.getHours() + ${floor}, today.getMinutes() + ${minutes} );
		var cookieExpire = new Date( today.getFullYear(), today.getMonth() + 6, today.getDate() );
		document.cookie = 'endDate${post_id}=' + encodeURIComponent(endDate) + '; expires=' + cookieExpire.toUTCString();
EOF;
			} else {
				$script .= <<<EOF
		document.cookie = 'endDate${post_id}=' + encodeURIComponent(today);
EOF;
			}
				$script .= <<<EOF
	}
EOF;
		}

		$script .= <<<EOF
function GetCookie(name){
	var result = null;
	var cookieName = name + '=';
	var cookies = document.cookie;
	var position = cookies.indexOf(cookieName);

	if( position != -1 ) {
		var startIndex = position + cookieName.length;
		var endIndex = cookies.indexOf(';', startIndex);
		if( endIndex == -1 ) { endIndex = cookies.length; }
		result = decodeURIComponent( cookies.substring(startIndex, endIndex) );
	}
	return result;
}
function CountdownTimer(elm,tl,mes){
	this.initialize.apply(this,arguments);
}
function CountdownTimer2(elm,tl,mes){
	this.initialize.apply(this,arguments);
}

CountdownTimer.prototype={
	initialize:function(elm,tl,mes) {
		this.elem = document.getElementById(elm);
		this.tl = tl;
		this.mes = mes;
	},countDown:function(){
		var timer='';
		today=new Date();
		var day=Math.floor((this.tl-today)/(24*60*60*1000));
		var hour=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*60*1000));
		var min=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*1000))%60;
		var sec=Math.floor(((this.tl-today)%(24*60*60*1000))/1000)%60%60;
		var milli=Math.floor(((this.tl-today)%(24*60*60*1000))/10)%100;
		var me=this;

		if( ( this.tl - today ) > 0 ){
			if (day) timer += '<span class="day">'+day+'日</span>';
			if (hour) timer += '<span class="hour">'+hour+'時間</span>';
EOF;
	if( get_field('countdown_format', $post_id) === 'minute' ) {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span>';
EOF;
	} elseif( get_field('countdown_format', $post_id) === 'second' ) {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span><span class="sec">'+this.addZero(sec)+'秒</span>';
EOF;
	} else {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span><span class="sec">'+this.addZero(sec)+'秒</span><span class="milli">'+this.addZero(milli)+'</span>';
EOF;
	}

	$script .= <<<EOF
			this.elem.innerHTML = timer;
			tid = setTimeout( function(){me.countDown();},10 );
		}else{
			this.elem.innerHTML = this.mes;
EOF;

	if( get_field('countdown_url', $post_id) ) {
		$countdown_url = get_field('countdown_url', $post_id);
		$script .= <<<EOF
			location.href = '${countdown_url}';
EOF;
	}

	$script .= <<<EOF
			$('.cd-after').show();
			$('.cd-before').hide();
			return;
		}
	},addZero:function(num){ return ('0'+num).slice(-2); }
}
$('.cd-after').hide();
function CDT(){
EOF;

	// カウントダウン
	if( get_field('countdown_method', $post_id) === 'date' ) {
		if( get_field('countdown_date', $post_id) ) {
			$countdown_date = get_field('countdown_date', $post_id);
			if( get_field('countdown_time', $post_id) ) {
				$countdown_time = get_field('countdown_time', $post_id);
			} else {
				$countdown_time = '00:00:00';
			}

			$script .= <<<EOF
	var tl = new Date('${countdown_date} ${countdown_time}');
EOF;
		} else {
			$script .= <<<EOF
	var tl = new Date('2013/12/23 00:00:00');
EOF;
		}
	} elseif( get_field('countdown_method', $post_id) === 'access' ) {
		$script .= <<<EOF
	var tl = new Date( GetCookie('endDate${post_id}') );
EOF;
	}

	$script .= <<<EOF
	var timer = new CountdownTimer('CDT',tl,'終了しました');
	timer.countDown();
EOF;

	$script .= <<<EOF
}
CountdownTimer2.prototype={
	initialize:function(elm,tl,mes) {
		this.elems = document.getElementsByClassName(elm);
		this.tl = tl;
		this.mes = mes;
	},countDown:function(){
		var timer='';
		today=new Date();
		var day=Math.floor((this.tl-today)/(24*60*60*1000));
		var hour=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*60*1000));
		var min=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*1000))%60;
		var sec=Math.floor(((this.tl-today)%(24*60*60*1000))/1000)%60%60;
		var milli=Math.floor(((this.tl-today)%(24*60*60*1000))/10)%100;
		var me=this;

		if( ( this.tl - today ) > 0 ){
			if (day) timer += '<span class="day">'+day+'日</span>';
			if (hour) timer += '<span class="hour">'+hour+'時間</span>';
EOF;
	if( get_field('countdown_format', $post_id) === 'minute' ) {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span>';
EOF;
	} elseif( get_field('countdown_format', $post_id) === 'second' ) {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span><span class="sec">'+this.addZero(sec)+'秒</span>';
EOF;
	} else {
		$script .= <<<EOF
			timer += '<span class="min">'+this.addZero(min)+'分</span><span class="sec">'+this.addZero(sec)+'秒</span><span class="milli">'+this.addZero(milli)+'</span>';
EOF;
	}

	$script .= <<<EOF
			for( var j=0; j<this.elems.length; j++ ) {
				this.elems[j].innerHTML = timer;
			}
			tid = setTimeout( function(){me.countDown();},10 );
		}else{
			for( var j=0; j<this.elems.length; j++ ) {
				this.elems[j].innerHTML = this.mes;
			}
EOF;

	if( get_field('countdown_url', $post_id) ) {
		$countdown_url = get_field('countdown_url', $post_id);
		$script .= <<<EOF
			location.href = '${countdown_url}';
EOF;
	}

	$script .= <<<EOF
			$('.cd-after').show();
			$('.cd-before').hide();
			return;
		}
	},addZero:function(num){ return ('0'+num).slice(-2); }
}
function CDT2(){
EOF;

	// カウントダウン
	if( get_field('countdown_method', $post_id) === 'date' ) {
		if( get_field('countdown_date', $post_id) ) {
			$countdown_date = get_field('countdown_date', $post_id);
			if( get_field('countdown_time', $post_id) ) {
				$countdown_time = get_field('countdown_time', $post_id);
			} else {
				$countdown_time = '00:00:00';
			}

			$script .= <<<EOF
	var tl = new Date('${countdown_date} ${countdown_time}');
EOF;
		} else {
			$script .= <<<EOF
	var tl = new Date('2013/12/23 00:00:00');
EOF;
		}
	} elseif( get_field('countdown_method', $post_id) === 'access' ) {
		$script .= <<<EOF
	var tl = new Date( GetCookie('endDate${post_id}') );
EOF;
	}

	if( get_field('countdown_indesign', $post_id) === 'design3' ) {
		$script .= <<<EOF
	var currentDate = new Date();
	$('.CDT').each(function(){
		$(this).ClassyCountdown({
			theme: 'flat-colors',
			end: tl.getTime() / 1000 + 1,
			now: currentDate.getTime() / 1000,
			onEndCallback: function(){
EOF;

		if( get_field('countdown_url', $post_id) ) {
			$countdown_url = get_field('countdown_url', $post_id);
			$script .= <<<EOF
				location.href = '${countdown_url}';
EOF;
		}

		$script .= <<<EOF
				$('.cd-after').show();
				$('.cd-before').hide();
			}
		});
	});
EOF;
	} elseif( get_field('countdown_indesign', $post_id) === 'design4' ) {
		$script .= <<<EOF
	var currentDate = new Date();
	var diff = tl.getTime() / 1000 - currentDate.getTime() / 1000 - 1;
	if(diff < 0) diff = 0;
	$('.CDT').each(function(){
		$(this).FlipClock(diff, {
			clockFace: 'DailyCounter',
			countdown :true,
			callbacks: { stop: function(){
EOF;

		if( get_field('countdown_url', $post_id) ) {
			$countdown_url = get_field('countdown_url', $post_id);
			$script .= <<<EOF
				location.href = '${countdown_url}';
EOF;
		}

		$script .= <<<EOF
				$('.cd-after').show();
				$('.cd-before').hide();
			}}
		});
	});
EOF;
	} else {
		$script .= <<<EOF
	var timer2 = new CountdownTimer2('CDT',tl,'終了しました');
	timer2.countDown();
EOF;
	}

	$script .= <<<EOF
}

window.onload=function(){
	CDT();
	CDT2();
}
});
EOF;
	}

		wp_register_script( 'colorful-script', false );
		wp_enqueue_script( 'colorful-script' );
		wp_add_inline_script( 'colorful-script', $script );
}

function admin_inline_style() {
	global $post, $pagenow;
	if ( $pagenow == 'post.php' ) {
		if ( $post->post_type == 'page' ) {
			$post_id = $post->ID;
			$theme_options = get_theme_options();

			// フォント
			if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) { // 全体設定
				if($theme_options['webfonts'] === 'on') {
					$font_family = $theme_options['font_family_web'];
				} else {
					$font_family = $theme_options['font_family'];
				}
			} else { // 個別設定
				if(get_field('webfonts', $post_id) === 'on') {
					$font_family = get_field('font_family_web', $post_id);
				} else {
					$font_family = get_field('font_family', $post_id);
				}
			}
			switch( $font_family ) {
				case 1:
					$font = '"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo, Osaka,"ＭＳ Ｐゴシック","MS PGothic",sans-serif';
					break;
				case 2:
					$font = '"ヒラギノ明朝 Pro W3","ＭＳ Ｐ明朝",serif';
					break;
				case 3:
					$font = '"メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック",sans-serif';
					break;
				case 4:
					$font = '"ヒラギノ丸ゴ Pro W4","ヒラギノ丸ゴ Pro","Hiragino Maru Gothic Pro","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","HG丸ｺﾞｼｯｸM-PRO","HGMaruGothicMPRO"';
					break;
				case 5:
					$font = '"游ゴシック体","Yu Gothic",YuGothic,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo,Arial,Sans-Serif';
					break;
				case 6:
					$font = '"游明朝",YuMincho,"Hiragino Mincho ProN","Hiragino Mincho Pro","ＭＳ 明朝",serif';
					break;
				case 7:
					$font = '"Noto Sans JP",sans-serif';
					break;
				case 8:
					$font = '"Noto Serif JP",serif';
					break;
				default:
					$font = '"Open Sans",Helvetica,Arial,sans-serif';
					break;
			}

			if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) { // 全体設定
				// フォントサイズ
				if( $theme_options['fontsize'] ) {
					$fontsize = $theme_options['fontsize'];
				} else {
					$fontsize = 18;
				}
				// 行間
				if( $theme_options['lineheight'] ) {
					$lineheight = $theme_options['lineheight'];
				} else {
					$lineheight = 1.8;
				}
				// 文字詰め
				$kerning = 'normal';
			} else { // 個別設定
				// フォントサイズ
				if( get_field('fontsize', $post_id) ) {
					$fontsize = get_field('fontsize', $post_id);
				} else {
					$fontsize = 18;
				}
				// 行間
				if( get_field('lineheight', $post_id) ) {
					$lineheight = get_field('lineheight', $post_id);
				} else {
					$lineheight = 1.8;
				}
				// 文字詰め
				if( get_field('kerning', $post_id) === 'on' ) {
					$kerning = '"palt"';
				} else {
					$kerning = 'normal';
				}
			}

			// 全体設定分岐
			$entire_enable = false;
			if( is_page() ) {
				if( get_field('entire_enable', $post_id) === 'on' || $theme_options['all_enable'] === 'on' ) {
					$entire_enable = true;
				}
			} elseif( is_singular('colorful-hfcontent') ) {
				if( get_field('hf_entire_enable', $post_id) !== 'on' ) {
					$entire_enable = true;
				}
			}

			$css = <<<EOF
	.colorful_content .editor-styles-wrapper, .mce-content-body {
		font-size: ${fontsize}px !important;
		font-family: ${font} !important;
		line-height: ${lineheight} !important;
		font-feature-settings: ${kerning};
	}
	.colorful_content .editor-styles-wrapper p,
	.colorful_content .editor-styles-wrapper ul,
	.colorful_content .editor-styles-wrapper ol,
	.colorful_content .editor-styles-wrapper h1,
	.colorful_content .editor-styles-wrapper h2,
	.colorful_content .editor-styles-wrapper h3,
	.colorful_content .editor-styles-wrapper h4,
	.colorful_content .editor-styles-wrapper h5,
	.colorful_content .editor-styles-wrapper h6,
	.colorful_content .editor-styles-wrapper .wp-block-cover h1,
	.colorful_content .editor-styles-wrapper .wp-block-cover h2,
	.colorful_content .editor-styles-wrapper .wp-block-cover h3,
	.colorful_content .editor-styles-wrapper .wp-block-cover h4,
	.colorful_content .editor-styles-wrapper .wp-block-cover h5,
	.colorful_content .editor-styles-wrapper .wp-block-cover h6 {
		font-family: ${font};
	}
	.colorful_content .editor-styles-wrapper .colorful-ffs {
		font-feature-settings: "palt";
	}
EOF;

				wp_add_inline_style( 'colorful-style', $css );
		}
	}
}
