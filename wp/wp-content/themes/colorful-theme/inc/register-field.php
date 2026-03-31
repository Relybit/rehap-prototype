<?php
// Register Field Groups
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom_01',
		'title' => __( 'カウントダウン設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_5405cf867fb82',
				'label' => __( 'カウントダウン方法', 'colorful' ),
				'name' => 'countdown_method',
				'type' => 'radio',
				'choices' => array (
					'date' => __( '日時指定方式', 'colorful' ),
					'access' => __( 'アクセス後カウント方式', 'colorful' ),
					'one' => __( 'ワンタイムオファー', 'colorful' ),
					'off' => __( 'カウントダウンOFF', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5271039dc054d',
				'label' => __( 'カウントダウン 名前 (例　終了まであと)', 'colorful' ),
				'name' => 'countdown_name',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '!=',
							'value' => 'off',
						),
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '!=',
							'value' => 'one',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5271040ac054e',
				'label' => __( 'カウントダウン 日にち', 'colorful' ),
				'name' => 'countdown_date',
				'type' => 'date_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '==',
							'value' => 'date',
						),
					),
					'allorany' => 'all',
				),
				'date_format' => 'yy/mm/dd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5271d86cb1b83',
				'label' => __( 'カウントダウン 時間 (例 00:00:00)', 'colorful' ),
				'name' => 'countdown_time',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '==',
							'value' => 'date',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '00:00:00',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5405d11305ff0',
				'label' => __( 'サイトアクセス後カウントダウン時間(例 : 1日＝24時間　30分＝0.5時間)　小数点第1位まで', 'colorful' ),
				'name' => 'cookie_expires',
				'type' => 'number',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '==',
							'value' => 'access',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 6,
				'placeholder' => '',
				'prepend' => '',
				'append' => __( '時間', 'colorful' ),
				'min' => 0,
				'max' => '',
				'step' => 0.1,
			),
			array (
				'key' => 'field_52a06738b6927',
				'label' => __( 'カウントダウン終了後にジャンプするURL (http://〜)', 'colorful' ),
				'name' => 'countdown_url',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5405cf867fb83',
				'label' => __( '【オプション】カウントダウンの表示単位(テキストデザインのみ反映)', 'colorful' ),
				'name' => 'countdown_format',
				'type' => 'radio',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5405cf867fb82',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'default' => __( 'デフォルト(0.01秒単位まで)', 'colorful' ),
					'minute' => __( '分単位まで', 'colorful' ),
					'second' => __( '秒単位まで', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5506c852ef504',
				'label' => __( 'LP上部にカウントダウンを固定表示', 'colorful' ),
				'name' => 'countdown_top',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'on',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_540c1d3591a3f',
				'label' => __( '⌊　LP上部カウントダウンデザイン', 'colorful' ),
				'name' => 'countdown_design',
				'type' => 'select',
				'choices' => array (
					'none' => __( 'デザイン設定なし(黒字・白背景)', 'colorful' ),
					'design1' => __( 'パターン1（色設定）', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5506c852ef504',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_540c1df5a8a5b',
				'label' => __( 'カウントダウン文字色', 'colorful' ),
				'name' => 'countdown_fontcolor',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5506c852ef504',
							'operator' => '==',
							'value' => 'on',
						),
						array (
							'field' => 'field_540c1d3591a3f',
							'operator' => '==',
							'value' => 'design1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#333333',
			),
			array (
				'key' => 'field_540c1ece674d5',
				'label' => __( 'カウントダウン背景色', 'colorful' ),
				'name' => 'countdown_bgcolor',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5506c852ef504',
							'operator' => '==',
							'value' => 'on',
						),
						array (
							'field' => 'field_540c1d3591a3f',
							'operator' => '==',
							'value' => 'design1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#ffffff',
			),
			array (
				'key' => 'field_5506c9ce85fed',
				'label' => __( 'ページ内カウントダウンデザイン(カスタムボタンより選択して設置できます)', 'colorful' ),
				'name' => 'countdown_indesign',
				'type' => 'select',
				'choices' => array (
					'none' => __( 'デザイン設定なし(黒字・白背景)', 'colorful' ),
					'design1' => __( 'パターン1（色設定）', 'colorful' ),
					'design3' => __( 'パターン3（円型デザイン）', 'colorful' ),
					'design4' => __( 'パターン4（パネルデザインB）', 'colorful' ),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5506e7c1e4c58',
				'label' => __( 'ページ内カウントダウン文字色', 'colorful' ),
				'name' => 'countdown_infontcolor',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5506c9ce85fed',
							'operator' => '==',
							'value' => 'design1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#333333',
			),
			array (
				'key' => 'field_5506e7c5e4c59',
				'label' => __( 'ページ内カウントダウン背景色', 'colorful' ),
				'name' => 'countdown_inbgcolor',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5506c9ce85fed',
							'operator' => '==',
							'value' => 'design1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#ffffff',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_custom_02',
		'title' => __( '背景設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_527e52ab2655f',
				'label' => __( '背景色', 'colorful' ),
				'name' => 'background_color',
				'type' => 'color_picker',
				'default_value' => '',
			),
			array (
				'key' => 'field_5280272096d8a',
				'label' => __( '背景画像', 'colorful' ),
				'name' => 'background_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5280c13062d73',
				'label' => __( '背景画像繰り返し', 'colorful' ),
				'name' => 'background_repeat',
				'type' => 'radio',
				'choices' => array (
					'repeat' => __( '繰り返す', 'colorful' ),
					'repeat-x' => __( '横方向に繰り返す', 'colorful' ),
					'repeat-y' => __( '縦方向に繰り返す', 'colorful' ),
					'no-repeat' => __( '繰り返さない', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5280c1b762d74',
				'label' => __( '背景画像固定', 'colorful' ),
				'name' => 'background_attachment',
				'type' => 'radio',
				'choices' => array (
					'fixed' => __( '固定する', 'colorful' ),
					'scroll' => __( '固定しない', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5281b5102285d',
				'label' => __( '背景画像の配置', 'colorful' ),
				'name' => 'background_position',
				'type' => 'radio',
				'choices' => array (
					'right' => __( '右よせ', 'colorful' ),
					'center' => __( '中央', 'colorful' ),
					'left' => __( '左よせ', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hfcontent',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_custom_03',
		'title' => __( '記事背景設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_529f3e24429b2',
				'label' => __( '記事背景有効化(デフォルトはOFF)', 'colorful' ),
				'name' => 'content_bg_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_529f3e24429b3',
				'label' => __( '背景色', 'colorful' ),
				'name' => 'content_bgcolor',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),
			array (
				'key' => 'field_529f3eb2429b4',
				'label' => __( '背景画像', 'colorful' ),
				'name' => 'content_bgimage',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_529f3eee429b5',
				'label' => __( '背景画像繰り返し', 'colorful' ),
				'name' => 'content_bgrepeat',
				'type' => 'radio',
				'choices' => array (
					'repeat' => __( '繰り返す', 'colorful' ),
					'repeat-x' => __( '横方向に繰り返す', 'colorful' ),
					'repeat-y' => __( '縦方向に繰り返す', 'colorful' ),
					'no-repeat' => __( '繰り返さない', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_529f3f4d429b6',
				'label' => __( '背景画像固定', 'colorful' ),
				'name' => 'content_bgattachment',
				'type' => 'radio',
				'choices' => array (
					'fixed' => __( '固定する', 'colorful' ),
					'scroll' => __( '固定しない', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_529f3fa4a8275',
				'label' => __( '背景画像の配置', 'colorful' ),
				'name' => 'content_bgposition',
				'type' => 'radio',
				'choices' => array (
					'right' => __( '右よせ', 'colorful' ),
					'center' => __( '中央', 'colorful' ),
					'left' => __( '左よせ', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_544681784a831',
				'label' => __( '影の設定', 'colorful' ),
				'name' => 'shadow_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_544681784a832',
				'label' => __( '影の色', 'colorful' ),
				'name' => 'shadow_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_544681784a831',
							'operator' => '==',
							'value' => 'on',
						),
						array (
							'field' => 'field_529f3e24429b2',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#000000',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hfcontent',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_custom_04',
		'title' => __( '応用設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_552363b4c2c47',
				'label' => __( 'ページ幅設定(px)　※こちらは編集ページには反映されないので、実際のページをご確認下さい。', 'colorful' ),
				'name' => 'pwidth',
				'type' => 'number',
				'default_value' => 1000,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_55234ec35bd19',
				'label' => __( '行間設定　※設定→更新後に、ページを再読み込みすると、編集ページに反映されます。', 'colorful' ),
				'name' => 'lineheight',
				'type' => 'number',
				'default_value' => 1.8,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 0.1,
			),
			array (
				'key' => 'field_5581775c3c0dd',
				'label' => __( 'Webフォント設定', 'colorful' ),
				'name' => 'webfonts',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5581775c3c0de',
				'label' => __( 'フォントファミリー設定', 'colorful' ),
				'name' => 'font_family',
				'type' => 'select',
				'choices' => array (
					'0' => __( '設定なし', 'colorful' ),
					'1' => 'ゴシック体',
					'2' => '明朝体',
					'3' => 'メイリオ',
					'4' => '丸ゴシック体',
					'5' => '游ゴシック体',
					'6' => '游明朝体',
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5581775c3c0dd',
							'operator' => '==',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5581775c3c0df',
				'label' => __( 'Webフォントファミリー設定', 'colorful' ),
				'name' => 'font_family_web',
				'type' => 'select',
				'choices' => array (
					'7' => 'Noto Sans JP',
					'8' => 'Noto Serif JP',
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5581775c3c0dd',
							'operator' => '==',
							'value' => 'on',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_52a0676cb6928',
				'label' => __( 'フォントサイズ設定(px)', 'colorful' ),
				'name' => 'fontsize',
				'type' => 'number',
				'default_value' => 18,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_66410397e1872',
				'label' => __( '文字詰め設定', 'colorful' ),
				'name' => 'kerning',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5506c84bef503',
				'label' => __( 'ホバーウィンドウ文章', 'colorful' ),
				'name' => 'hoverwindow_text',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'hover',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_custom_04head',
		'title' => __( 'ヘッド画像設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_52a1badb995f6',
				'label' => __( 'ヘッダー画像 (こちらの編集ページには表示されないので、実際のページをご確認ください。)', 'colorful' ),
				'name' => 'topheader_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_custom_04sp',
		'title' => __( 'スマホ表示設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_536f2913d4a69',
				'label' => __( 'スマホ最適化(レスポンシブ対応)', 'colorful' ),
				'name' => 'sp_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'on',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5458c5de6075c',
				'label' => __( 'スマホ表示時の文字サイズ %単位(スマホ最適化がONの時のみ適応)　デフォルトは85%', 'colorful' ),
				'name' => 'sp_fontsize_default',
				'type' => 'number',
				'default_value' => 85,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_539463ad5fd3e',
				'label' => __( 'スマホでのアクセス時にページをジャンプさせる場合のURL (http://〜)', 'colorful' ),
				'name' => 'sp_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
	register_field_group(array (
		'id' => 'acf_custom_04hf',
		'title' => __( '応用設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_52a1badb995f7',
				'label' => __( 'ヘッダー画像 (こちらの編集ページには表示されないので、実際のページをご確認ください。)', 'colorful' ),
				'name' => 'topheader_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hfcontent',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_custom_05',
		'title' => __( 'プログラム入力', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_537b3735aec0f',
				'label' => __( 'プログラム入力(body内)　スクリプト系のプログラムを記入する場合などに活用できます。(&lt;script&gt;〜〜&lt;/script&gt;など)', 'colorful' ),
				'name' => 'free',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5444ae8cc40e8',
				'label' => __( 'プログラム入力(head内)　Google Analyticsのコードを記入する場合などに活用できます。', 'colorful' ),
				'name' => 'gacode',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 7,
	));
	register_field_group(array (
		'id' => 'acf_custom_07',
		'title' => __( 'メニュー設定', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_5458b5d7e8dc9',
				'label' => __( 'メニュー表示', 'colorful' ),
				'name' => 'menu_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5458b5d7e8dca',
				'label' => __( '【応用】メニュー位置', 'colorful' ),
				'name' => 'menu_position',
				'type' => 'radio',
				'choices' => array (
					'top' => __( '最上部', 'colorful' ),
					'middle' => __( '全体ヘッダー直下', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'top',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5458b647c69c9',
				'label' => __( 'メニュー名', 'colorful' ),
				'name' => 'menu_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5458b6f97fdcf',
				'label' => __( 'メニューデザイン', 'colorful' ),
				'name' => 'menu_design',
				'type' => 'select',
				'choices' => array (
					'design1' => __( 'パターン1 (黒)', 'colorful' ),
					'design2' => __( 'パターン2 (白)', 'colorful' ),
					'design3' => __( 'パターン3 (赤色のグラデーション)', 'colorful' ),
					'design4' => __( 'パターン4 (ピンクのグラデーション)', 'colorful' ),
					'design5' => __( 'パターン5 (水色のグラデーション)', 'colorful' ),
					'design6' => __( 'パターン6 (シアンのグラデーション)', 'colorful' ),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 6,
	));
	register_field_group(array (
		'id' => 'acf_custom_08',
		'title' => __( '固定フッターボタン', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_56c1c47e64ff7',
				'label' => __( '固定フッターボタン', 'colorful' ),
				'name' => 'footer_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'sp' => __( 'スマホ表示時のみON', 'colorful' ),
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_56bf749ecd7c2',
				'label' => __( 'ボタンの位置', 'colorful' ),
				'name' => 'footer_position',
				'type' => 'radio',
				'choices' => array (
					'center' => __( '中央', 'colorful' ),
					'left' => __( '左', 'colorful' ),
					'right' => __( '右', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'center',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_56bf749ecd7c3',
				'label' => __( '固定フッターボタン画像', 'colorful' ),
				'name' => 'footer_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56c290076a625',
				'label' => __( 'ボタンのクラス入力', 'colorful' ),
				'name' => 'footer_class',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'btn-blue-3d',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56bf6f16f1bad',
				'label' => __( '固定フッターボタンテキスト', 'colorful' ),
				'name' => 'footer_text',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56bf6e4b674d2',
				'label' => __( 'リンク先URL', 'colorful' ),
				'name' => 'footer_url',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a6ee85e24849',
				'label' => __( 'リンク先の開き方', 'colorful' ),
				'name' => 'footer_target',
				'type' => 'radio',
				'choices' => array (
					'blank' => __( '新しいウィンドウで開く', 'colorful' ),
					'self' => __( '同一のウィンドウに開く', 'colorful' ),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'blank',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_56bf6e4b674d3',
				'label' => __( 'すべてをプログラム入力する', 'colorful' ),
				'name' => 'footer_code',
				'type' => 'textarea',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_56c1c47e64ff7',
							'operator' => '!=',
							'value' => 'off',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 8,
	));
	register_field_group(array (
		'id' => 'acf_custom_09',
		'title' => __( 'テーマオプション設定からの適応(上級設定／通常は操作をお控えください)', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_57cd2c18c6c48',
				'label' => __( '全体ヘッダー・フッター(デフォルトはOFF)', 'colorful' ),
				'name' => 'entire_hf_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_57cd2c1bc6c49',
				'label' => __( '全体サイト設定(デフォルトはOFF)', 'colorful' ),
				'name' => 'entire_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_57cd2c18c6c51',
				'label' => __( '記事レイアウト(デフォルトは1カラム)', 'colorful' ),
				'name' => 'page_layout',
				'type' => 'radio',
				'choices' => array (
					'2' => __( '2カラム', 'colorful' ),
					'1' => __( '1カラム', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '1',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 9,
	));
	register_field_group(array (
		'id' => 'acf_custom_10',
		'title' => __( '記事レイアウト', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_57cd2c18c6c50',
				'label' => __( '記事レイアウト', 'colorful' ),
				'name' => 'post_layout',
				'type' => 'radio',
				'choices' => array (
					'2' => __( '2カラム', 'colorful' ),
					'1' => __( '1カラム', 'colorful' ),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '2',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_custom_11',
		'title' => __( 'このページにおける個別設定の適応', 'colorful' ),
		'fields' => array (
			array (
				'key' => 'field_57cd2c1bc6c51',
				'label' => __( '背景設定・記事背景設定(デフォルトはOFF／テーマオプションの全体設定が適応されます)', 'colorful' ),
				'name' => 'hf_entire_enable',
				'type' => 'radio',
				'choices' => array (
					'on' => 'ON',
					'off' => 'OFF',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'off',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hfcontent',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}
