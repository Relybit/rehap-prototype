<?php
add_action( 'admin_init', 'register_block_patterns', 20 );

function register_block_patterns() {
	// カテゴリー登録
	register_block_pattern_category(
		'colorful-description1',
		array('label' => __( '【COLORFUL BLOCKS】', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-fullwidth',
		array('label' => __( '└背景セクション', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-subHead2',
		array('label' => __( '└セクション内サブヘッド', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-textimg',
		array('label' => __( '└文章＋画像', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-text',
		array('label' => __( '└文章のみ', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-3point',
		array('label' => __( '└縦横カラムスタイル', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-profile',
		array('label' => __( '└プロフィールスタイル', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-user',
		array('label' => __( '└お客様の声', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-frame',
		array('label' => __( '└枠', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-subheading',
		array('label' => __( '└小見出し', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-list',
		array('label' => __( '└リスト', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-balloon',
		array('label' => __( '└吹き出し', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-button',
		array('label' => __( '└ボタン', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-formbox',
		array('label' => __( '└登録フォーム', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-other',
		array('label' => __( '└その他', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-head',
		array('label' => __( '└ヘッド', 'colorful' ))
	);
	register_block_pattern_category(
		'colorful-subHead',
		array('label' => __( '└セクション外サブヘッド', 'colorful' ))
	);

	// ブロックパターン登録
	register_block_pattern(
		'colorful/colorful-description1',
		array(
			'title'       => __( 'COLORFUL BLOCKS', 'colorful' ),
			'content'     => '<!-- wp:image {"align":"center","id":2627,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="http://lptemp.com/dx/wp-content/uploads/2022/01/COLORFUL-BLOCKS-logo.png" alt="" class="wp-image-2627"/></figure></div>
<!-- /wp:image -->',
			'categories'  => array('colorful-description1'),
		)
	);
	register_block_pattern(
		'colorful/colorful-description2',
		array(
			'title'       => __( 'オススメの使い方', 'colorful' ),
			'content'     => '<!-- wp:group {"style":{"color":{"text":"#555555"}},"className":"colorful-subHeadParts002_subTitle"} -->
<div class="wp-block-group colorful-subHeadParts002_subTitle has-text-color" style="color:#555555"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">カラフルブロックス<br>オススメの使い方</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><meta charset="utf-8">１：<br>まず「セクション枠のデザイン」より、セクション全体のデザインを決定しましょう！</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>２：<br>セクション枠の中に<br>「セクション内の上部」→「セクション内の内部」→「セクション内の下部(必要に応じて)」<br>の順番に、お好きなブロックを設置していき、文字や画像を編集しましょう！<br><br>→該当するマニュアルはこちら</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 id="その他">その他：</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>ヘッドの設置や、セクション外にサブヘッドを設置したい場合は<br>「独立セクション」のカテゴリから選んでください。<br><br>→該当するマニュアルはこちら</p>
<!-- /wp:paragraph -->',
			'categories'  => array('colorful-description1'),
		)
	);

	// セクション内サブヘッド
	register_block_pattern(
		'colorful/subhead2-design1',
		array(
			'title'       => __( '定番｜ベーシック - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-group colorful_Heading_New_Basic"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design2',
		array(
			'title'       => __( '定番｜ベーシック下線 - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-group colorful_Heading_New_Basic"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","textColor":"black","className":"is-style-webfont1 large-size-heading"} -->
<h2 class="has-text-align-center is-style-webfont1 large-size-heading has-black-color has-text-color">メインテキスト</h2>
<!-- /wp:heading -->

<!-- wp:separator {"color":"cyan-bluish-gray"} -->
<hr class="wp-block-separator has-text-color has-background has-cyan-bluish-gray-background-color has-cyan-bluish-gray-color"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design3',
		array(
			'title'       => __( '定番｜背景 - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"vivid-cyan-blue","minHeight":65,"align":"center","className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-cover aligncenter has-vivid-cyan-blue-background-color has-background-dim colorful_Heading_New_Basic" style="min-height:65px"><div class="wp-block-cover__inner-container"><!-- wp:group {"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design4',
		array(
			'title'       => __( 'アレンジ｜吹き出しデザインA - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"colorful_Heading_New_Basic is-style-balloon"} -->
<div class="wp-block-group colorful_Heading_New_Basic is-style-balloon has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design5',
		array(
			'title'       => __( 'アレンジ｜吹き出しデザインB - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"line-h01 balloon_wakusen"} -->
<div class="wp-block-group line-h01 balloon_wakusen"><!-- wp:heading {"textAlign":"center","textColor":"black","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading has-black-color has-text-color">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","textColor":"vivid-red","className":"is-style-webfont1 large-size-heading"} -->
<h2 class="has-text-align-center is-style-webfont1 large-size-heading has-vivid-red-color has-text-color"><span class="text-highlighter-yellow"><strong><span style="font-size:1.4em">３</span>つの<span style="font-size:1.2em">メリット</span></strong></span></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design6',
		array(
			'title'       => __( 'アレンジ｜シャドウデザインA - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"colorful_Heading_New_Basic is-style-shadow-A"} -->
<div class="wp-block-group colorful_Heading_New_Basic is-style-shadow-A has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design7',
		array(
			'title'       => __( 'アレンジ｜シャドウデザインB - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"colorful_Heading_New_Basic is-style-shadow-B"} -->
<div class="wp-block-group colorful_Heading_New_Basic is-style-shadow-B has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design8',
		array(
			'title'       => __( 'アレンジ｜斜め型デザイン - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"colorful_Heading_New_Basic is-style-diagonal"} -->
<div class="wp-block-group colorful_Heading_New_Basic is-style-diagonal has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design9',
		array(
			'title'       => __( 'アレンジ｜帯型・画像背景 - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2021/12/background-image02.jpg","id":2878,"dimRatio":50,"isDark":false,"align":"full","style":{"color":{}}} -->
<div class="wp-block-cover alignfull is-light"><span aria-hidden="true" class="wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-2878" alt="" src="https://lptemp.com/dx/wp-content/uploads/2021/12/background-image02.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":15} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"textColor":"white","className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-group colorful_Heading_New_Basic has-white-color has-text-color"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading" id="サブテキスト-改行はshiftキーを押しながら-9">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":6} -->
<div style="height:6px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading" id="メインテキスト-8"><span style="color:#ffffff" class="tadv-color"><mark>メインテキスト</mark></span></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design10',
		array(
			'title'       => __( 'アレンジ｜斜線背景 - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"bg-stripe-default colorful_Heading_New_Basic"} -->
<div class="wp-block-group bg-stripe-default colorful_Heading_New_Basic"><!-- wp:heading {"textAlign":"center","textColor":"black","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading has-black-color has-text-color">こちらのテキストを入力</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	register_block_pattern(
		'colorful/subhead2-design11',
		array(
			'title'       => __( 'アレンジ｜両端スラッシュ - セクション内サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"is-style-suptext colorful_Heading_New_Basic"} -->
<div class="wp-block-group is-style-suptext colorful_Heading_New_Basic"><!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">こちらにテキストを入力<br>(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead2'),
		)
	);
	// セクション内サブヘッドここまで

	// 文章＋画像
	register_block_pattern(
		'colorful/textimg-design1',
		array(
			'title'       => __( '1カラム - 文章＋画像', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"black"} -->
<h3 class="has-black-color has-text-color" id="見出しテキスト-3" style="font-size:24px">見出しテキスト</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"cyan-bluish-gray","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-cyan-bluish-gray-background-color has-cyan-bluish-gray-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-textimg'),
		)
	);
	register_block_pattern(
		'colorful/textimg-design2',
		array(
			'title'       => __( '横並び・2カラム(5:5)｜デザインA - 文章＋画像', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"black"} -->
<h3 class="has-black-color has-text-color" id="見出しテキスト-4" style="font-size:24px">見出しテキスト</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"cyan-bluish-gray","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-cyan-bluish-gray-background-color has-cyan-bluish-gray-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-textimg'),
		)
	);
	register_block_pattern(
		'colorful/textimg-design3',
		array(
			'title'       => __( '横並び・2カラム(5:5)｜デザインB - 文章＋画像', 'colorful' ),
			'content'     => '<!-- wp:columns {"verticalAlignment":"top","style":{"color":{"text":"#000000"}}} -->
<div class="wp-block-columns are-vertically-aligned-top has-text-color" style="color:#000000"><!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%"><!-- wp:group {"backgroundColor":"white","className":"is-style-shadow-A"} -->
<div class="wp-block-group is-style-shadow-A has-white-background-color has-background"><!-- wp:list -->
<ul><!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストをいれてください</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-textimg'),
		)
	);
	register_block_pattern(
		'colorful/textimg-design4',
		array(
			'title'       => __( '横並び・2カラム(7:3)｜デザインA - 文章＋画像', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"black"} -->
<h3 class="has-black-color has-text-color" id="見出しテキスト-5" style="font-size:24px">見出しテキスト</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"cyan-bluish-gray","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-cyan-bluish-gray-background-color has-cyan-bluish-gray-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-textimg'),
		)
	);
	register_block_pattern(
		'colorful/textimg-design5',
		array(
			'title'       => __( '横並び・3カラム - 文章＋画像', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.6rem"}},"textColor":"black","className":"small-size-heading"} -->
<h3 class="small-size-heading has-black-color has-text-color" id="現役〇〇がサポート-無制限の質問対応-1" style="font-size:1.6rem">見出しテキスト</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"cyan-bluish-gray","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-cyan-bluish-gray-background-color has-cyan-bluish-gray-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-textimg'),
		)
	);
	// 文章＋画像ここまで

	// 文章のみ
	register_block_pattern(
		'colorful/text-design1',
		array(
			'title'       => __( '1カラム(段落ブロック) - 文章のみ', 'colorful' ),
			'content'     => '<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキスト<br>複数改行はShittキーを押しながら行ってください。<br><br>セールスレターなどの長文を書かれる場合は、<br>「横並び・1カラム｜長文」のブロックがオススメです。</p>
<!-- /wp:paragraph -->',
			'categories'  => array('colorful-text'),
		)
	);
	register_block_pattern(
		'colorful/text-design3',
		array(
			'title'       => __( '横並び・2カラム - 文章のみ', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-text'),
		)
	);
	// 文章のみここまで

	// 縦横カラムスタイル
	register_block_pattern(
		'colorful/3point-design1',
		array(
			'title'       => __( '縦並び｜デザインA - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A has-white-background-color has-background"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50px"><!-- wp:group {"backgroundColor":"vivid-red","textColor":"white"} -->
<div class="wp-block-group has-white-color has-vivid-red-background-color has-text-color has-background"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"28px"}},"className":"mg-btm10"} -->
<p class="has-text-align-center mg-btm10" style="font-size:28px">1</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"28px"}}} -->
<h2 style="font-size:28px">自由につかえる時間が増える</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design2',
		array(
			'title'       => __( '縦並び｜デザインB - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designB-2"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designB-2"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">1</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">2</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">3</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design3',
		array(
			'title'       => __( '縦並び｜デザインC - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designC-2"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designC-2"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">01</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">02</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">03</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design4',
		array(
			'title'       => __( '縦並び｜デザインD - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designD-2"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designD-2"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"52px"} -->
<div class="wp-block-column" style="flex-basis:52px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">01</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"52px"} -->
<div class="wp-block-column" style="flex-basis:52px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">02</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"52px"} -->
<div class="wp-block-column" style="flex-basis:52px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">03</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design5',
		array(
			'title'       => __( '横並び・2カラム｜デザインA - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","textColor":"black","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle has-black-color has-white-background-color has-text-color has-background"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"className":"line-h"} -->
<div class="wp-block-group line-h"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-medium-font-size"><strong><em> Feature.01</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">経験豊富なスタッフが対応</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","textColor":"black","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle has-black-color has-white-background-color has-text-color has-background"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"className":"line-h"} -->
<div class="wp-block-group line-h"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-medium-font-size"><strong><em> </em></strong><em><strong>Feature.02</strong></em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">口コミで多くの方に評価をいただく技術</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design6',
		array(
			'title'       => __( '横並び・2カラム｜デザインB - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"mg-auto"} -->
<div class="wp-block-columns mg-auto"><!-- wp:column {"width":"","backgroundColor":"white","className":"is-style-padding mg-10 wp-b-c-update"} -->
<div class="wp-block-column is-style-padding mg-10 wp-b-c-update has-white-background-color has-background"><!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"color":{"background":"#fbf6da"}},"textColor":"black","className":"is-style-balloon"} -->
<div class="wp-block-group is-style-balloon has-black-color has-text-color has-background" style="background-color:#fbf6da"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">〇〇のおかげで助かってます♪</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:separator {"customColor":"#fbf6da","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#fbf6da;color:#fbf6da"/>
<!-- /wp:separator -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>ここにお客様の声を入力してください。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column {"backgroundColor":"white","className":"is-style-padding mg-10 wp-b-c-update"} -->
<div class="wp-block-column is-style-padding mg-10 wp-b-c-update has-white-background-color has-background"><!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"color":{"background":"#fbf6da"}},"textColor":"black","className":"is-style-balloon"} -->
<div class="wp-block-group is-style-balloon has-black-color has-text-color has-background" style="background-color:#fbf6da"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">〇〇の効果がとても嬉しい！</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure>
<!-- /wp:image -->

<!-- wp:separator {"customColor":"#fbf6da"} -->
<hr class="wp-block-separator has-text-color has-background" style="background-color:#fbf6da;color:#fbf6da"/>
<!-- /wp:separator -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>ここにお客様の声を入力してください。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design7',
		array(
			'title'       => __( '横並び・2カラム｜デザインC - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"white","className":"mg-btm40 is-style-shadow-B"} -->
<div class="wp-block-group mg-btm40 is-style-shadow-B has-white-background-color has-background"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top","width":"30%","className":"mg-btm20"} -->
<div class="wp-block-column is-vertically-aligned-top mg-btm20" style="flex-basis:30%"><!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<div class="wp-block-image is-style-default"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"><!-- wp:group {"style":{"color":{"background":"#24b27e"}},"textColor":"white","className":"is-style-default"} -->
<div class="wp-block-group is-style-default has-white-color has-text-color has-background" style="background-color:#24b27e"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px"}},"className":"is-style-webfont3 pd-10"} -->
<h3 class="has-text-align-center is-style-webfont3 pd-10" style="font-size:24px">フェイシャルコース</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":4,"fontSize":"medium"} -->
<h4 class="has-medium-font-size">10,000円 </h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"white","className":"mg-btm20 is-style-shadow-B"} -->
<div class="wp-block-group mg-btm20 is-style-shadow-B has-white-background-color has-background"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"30%","className":"mg-btm20"} -->
<div class="wp-block-column mg-btm20" style="flex-basis:30%"><!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<div class="wp-block-image is-style-default"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"><!-- wp:group {"style":{"color":{"background":"#24b27e"}},"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color has-background" style="background-color:#24b27e"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px"}},"className":"is-style-webfont3 pd-10"} -->
<h3 class="has-text-align-center is-style-webfont3 pd-10" style="font-size:24px">〇〇コース</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":4,"fontSize":"medium"} -->
<h4 class="has-medium-font-size">10,000円</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design8',
		array(
			'title'       => __( '横並び・2カラム｜デザインD - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"luminous-vivid-orange","textColor":"white","className":"balloon_under_square add-relative z-index2 bd-rud5 mg-auto"} -->
<div class="wp-block-group balloon_under_square add-relative z-index2 bd-rud5 mg-auto has-white-color has-luminous-vivid-orange-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"24px"}},"className":"is-style-default"} -->
<h2 class="has-text-align-center is-style-default" style="font-size:24px">Point 01</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:cover {"overlayColor":"vivid-cyan-blue","contentPosition":"center center","align":"center","className":"is-position-center-center colorful-frame2-kai mg-negative-top30 z-index0"} -->
<div class="wp-block-cover aligncenter has-vivid-cyan-blue-background-color has-background-dim is-position-center-center colorful-frame2-kai mg-negative-top30 z-index0"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure></div>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"is-style-default"} -->
<div class="wp-block-group is-style-default has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">風通しのいい社風</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"luminous-vivid-orange","textColor":"white","className":"balloon_under_square add-relative z-index2 bd-rud5 mg-auto"} -->
<div class="wp-block-group balloon_under_square add-relative z-index2 bd-rud5 mg-auto has-white-color has-luminous-vivid-orange-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"24px"}},"className":"is-style-default"} -->
<h2 class="has-text-align-center is-style-default" style="font-size:24px">Point 02</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:cover {"overlayColor":"vivid-cyan-blue","contentPosition":"center center","align":"center","className":"is-position-center-center colorful-frame2-kai mg-negative-top30 z-index0"} -->
<div class="wp-block-cover aligncenter has-vivid-cyan-blue-background-color has-background-dim is-position-center-center colorful-frame2-kai mg-negative-top30 z-index0"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure></div>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"vivid-cyan-blue","textColor":"white","className":"is-style-default"} -->
<div class="wp-block-group is-style-default has-white-color has-vivid-cyan-blue-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">10年間の離職率5％以下</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design9',
		array(
			'title'       => __( '横並び・3カラム｜デザインA - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle has-white-background-color has-background"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"className":"line-h"} -->
<div class="wp-block-group line-h"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-medium-font-size"><strong><em> Feature.01</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">経験豊富なスタッフが対応</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle has-white-background-color has-background"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"className":"line-h"} -->
<div class="wp-block-group line-h"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-medium-font-size"><strong><em> </em></strong><em><strong>Feature.02</strong></em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">口コミで多くの方に評価をいただく技術</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"add-relative"} -->
<div class="wp-block-group add-relative"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"backgroundColor":"white","className":"mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle"} -->
<div class="wp-block-group mg-auto mg-negative-top50 add-relative z-index1 wid90per is-style-shadow-A label_triangle has-white-background-color has-background"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:100%"><!-- wp:group {"className":"line-h"} -->
<div class="wp-block-group line-h"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-medium-font-size"><strong><em> Feature.03</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">サロンケア後のアフターサポートも充実</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design10',
		array(
			'title'       => __( '横並び・3カラム｜デザインB - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:cover {"customOverlayColor":"#394eea","contentPosition":"center center","align":"center","className":"is-position-center-center colorful-frame7-kai"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame7-kai" style="background-color:#394eea"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"backgroundColor":"white","className":"pd-20 is-style-shadow-A"} -->
<div class="wp-block-group pd-20 is-style-shadow-A has-white-background-color has-text-color has-background" style="color:#333333"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"style":{"color":{"text":"#2833dc"}},"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-text-color has-medium-font-size" style="color:#2833dc"><strong><em> Reason.01</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">経験豊富なスタッフが対応</h2>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:cover {"customOverlayColor":"#394eea","contentPosition":"center center","align":"center","className":"is-position-center-center colorful-frame7-kai"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame7-kai" style="background-color:#394eea"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"backgroundColor":"white","className":"pd-20 is-style-shadow-A"} -->
<div class="wp-block-group pd-20 is-style-shadow-A has-white-background-color has-text-color has-background" style="color:#333333"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"style":{"color":{"text":"#2833dc"}},"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-text-color has-medium-font-size" style="color:#2833dc"><strong><em> Reason.02</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">口コミで多くの方に評価をいただく技術</h2>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:cover {"customOverlayColor":"#394eea","contentPosition":"center center","align":"center","className":"is-position-center-center colorful-frame7-kai"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame7-kai" style="background-color:#394eea"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"backgroundColor":"white","className":"pd-20 is-style-shadow-A"} -->
<div class="wp-block-group pd-20 is-style-shadow-A has-white-background-color has-text-color has-background" style="color:#333333"><!-- wp:group {"style":{"color":{"text":"#91aec2"}}} -->
<div class="wp-block-group has-text-color" style="color:#91aec2"><!-- wp:paragraph {"style":{"color":{"text":"#2833dc"}},"className":"is-style-webfont1 subheading-afterline","fontSize":"medium"} -->
<p class="is-style-webfont1 subheading-afterline has-text-color has-medium-font-size" style="color:#2833dc"><strong><em> Reason.03</em></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"className":"is-style-default","fontSize":"medium"} -->
<h2 class="is-style-default has-medium-font-size">サロンケア後のアフターサポートも充実</h2>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:separator {"customColor":"#dfdada","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#dfdada;color:#dfdada"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":40} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design11',
		array(
			'title'       => __( '横並び・3カラム｜デザインC - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"className":"threepoint-border-right is-style-default"} -->
<div class="wp-block-column threepoint-border-right is-style-default"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#eeeeee"}},"textColor":"pale-pink","className":"number-custom-bg-none wp-block-button"} -->
<div class="wp-block-group number-custom-bg-none wp-block-button has-pale-pink-color has-text-color has-background" style="background-color:#eeeeee"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center"><strong>1</strong></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":11} -->
<div style="height:11px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":3,"className":"is-style-default","fontSize":"medium"} -->
<h3 class="is-style-default has-medium-font-size">自分の得意分野を教えることで収入につながる！</h3>
<!-- /wp:heading -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-default threepoint-border-right"} -->
<div class="wp-block-column is-style-default threepoint-border-right"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#eeeeee"}},"textColor":"pale-pink","className":"number-custom-bg-none wp-block-button"} -->
<div class="wp-block-group number-custom-bg-none wp-block-button has-pale-pink-color has-text-color has-background" style="background-color:#eeeeee"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center"><strong><strong>2</strong></strong></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":11} -->
<div style="height:11px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-default","fontSize":"medium"} -->
<h3 class="is-style-default has-medium-font-size">自由につかえる時間が増える</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-default threepoint-border-right"} -->
<div class="wp-block-column is-style-default threepoint-border-right"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#eeeeee"}},"textColor":"pale-pink","className":"number-custom-bg-none wp-block-button"} -->
<div class="wp-block-group number-custom-bg-none wp-block-button has-pale-pink-color has-text-color has-background" style="background-color:#eeeeee"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center"><strong><strong>3</strong></strong></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":11} -->
<div style="height:11px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-default","fontSize":"medium"} -->
<h3 class="is-style-default has-medium-font-size">メディアからのオファーで知名度UP</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"z-index0"} -->
<figure class="wp-block-image size-full z-index0"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design12',
		array(
			'title'       => __( '横並び・3カラム｜デザインD - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#15b379"}},"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color has-background" style="background-color:#15b379"><!-- wp:heading {"textAlign":"center","level":3,"className":"is-style-webfont7"} -->
<h3 class="has-text-align-center is-style-webfont7">女性らしい美しさがアップ！</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-shadow"} -->
<figure class="wp-block-image size-full is-style-shadow"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#15b379"}},"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color has-background" style="background-color:#15b379"><!-- wp:heading {"textAlign":"center","level":3,"className":"is-style-webfont7"} -->
<h3 class="has-text-align-center is-style-webfont7">女性らしい美しさがアップ！</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-shadow"} -->
<figure class="wp-block-image size-full is-style-shadow"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#15b379"}},"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color has-background" style="background-color:#15b379"><!-- wp:heading {"textAlign":"center","level":3,"className":"is-style-webfont7"} -->
<h3 class="has-text-align-center is-style-webfont7">女性らしい美しさがアップ！</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-shadow"} -->
<figure class="wp-block-image size-full is-style-shadow"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト<br><br>改行はShiftキーを押しながら行ってください。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design13',
		array(
			'title'       => __( '横並び・3カラム｜デザインE - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designB-1"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designB-1"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">1</h3>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-underline"} -->
<figure class="wp-block-image size-large is-style-underline"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">2</h3>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-underline"} -->
<figure class="wp-block-image size-large is-style-underline"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">3</h3>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-underline"} -->
<figure class="wp-block-image size-large is-style-underline"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design14',
		array(
			'title'       => __( '横並び・3カラム｜デザインF - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designC-1"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designC-1"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"36px"} -->
<div class="wp-block-column" style="flex-basis:36px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">01</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"36px"} -->
<div class="wp-block-column" style="flex-basis:36px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">02</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns {"className":"colorful-3point-main"} -->
<div class="wp-block-columns colorful-3point-main"><!-- wp:column {"width":"36px"} -->
<div class="wp-block-column" style="flex-basis:36px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">03</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-hdr"} -->
<div class="wp-block-group colorful-3point-hdr"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	register_block_pattern(
		'colorful/3point-design15',
		array(
			'title'       => __( '横並び・3カラム｜デザインG - 縦横カラムスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-3point colorful-3point-designD-1"} -->
<div class="wp-block-columns colorful-3point colorful-3point-designD-1"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>事故・トラブル時の<br>相談サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20px"} -->
<div class="wp-block-column" style="flex-basis:20px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">01</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>年間約2,000件にのぼる事故対応の経験を活かし、お客様には最小のお手間で保険金をお受け取り頂けるようにサポートします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>充実したサポート体制</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20px"} -->
<div class="wp-block-column" style="flex-basis:20px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">02</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>お客様の担当者だけでなく弊社スタッフによるバックアップ体制を整えております。事故時のご連絡はもちろん、ご契約内容の確認、変更、各種書類の手続きなど、スタッフ一丸となって即時・正確に対応させていただきます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-3point-main"} -->
<div class="wp-block-group colorful-3point-main"><!-- wp:columns {"className":"colorful-3point-hdr"} -->
<div class="wp-block-columns colorful-3point-hdr"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>最適化サービス</h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20px"} -->
<div class="wp-block-column" style="flex-basis:20px"><!-- wp:heading {"level":3,"className":"colorful-3point-count"} -->
<h3 class="colorful-3point-count">03</h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"colorful-3point-cts"} -->
<div class="wp-block-group colorful-3point-cts"><!-- wp:paragraph -->
<p>私たちは複数の保険会社のそれぞれ商品から、約1,000社のお客様とお取引をさせていただいている経験を活かし、お客様のご要望に対して最適な保険を設計いたします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-3point-aside"} -->
<div class="wp-block-group colorful-3point-aside"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-3point'),
		)
	);
	// 縦横カラムスタイルここまで

	// プロフィールスタイル
	register_block_pattern(
		'colorful/profile-design1',
		array(
			'title'       => __( '縦並び｜デザインA - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":1947,"width":"300px","height":"300px","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947" style="width:300px;height:300px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5em"}}} -->
<h3 class="has-text-align-center" style="font-size:1.5em">お名前を入力</h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.2em"}}} -->
<h3 class="has-text-align-center" style="font-size:1.2em">〇〇株式会社代表<br>〇〇の専門家 / 〇〇のプロフェッショナル</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design2',
		array(
			'title'       => __( '横並び・2カラム｜デザインA - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"top"} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"color":{"background":"#e0bee2"}},"className":"bd-rud30 pd-10"} -->
<div class="wp-block-group bd-rud30 pd-10 has-background" style="background-color:#e0bee2"><!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
<p class="has-text-align-center has-normal-font-size">〇〇認定講師</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":25} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5em"}}} -->
<h3 class="has-text-align-center" style="font-size:1.5em">肩書きを入力<br>お名前を入力</h3>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"align":"center","id":1947,"width":"300px","height":"300px","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947" style="width:300px;height:300px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph -->
<p>サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design3',
		array(
			'title'       => __( '横並び・2カラム｜デザインB - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-profile colorful-profile-designA"} -->
<div class="wp-block-columns colorful-profile colorful-profile-designA"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-profile-hdr"} -->
<div class="wp-block-group colorful-profile-hdr"><!-- wp:heading {"level":3} -->
<h3>全国 涼子</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ryoko Zenkoku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-profile-cts"} -->
<div class="wp-block-group colorful-profile-cts"><!-- wp:heading {"level":4} -->
<h4>経歴 /</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>2009年　東京医科大学医学部　卒業</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2009年　東京医科大学八王子医療センター　初期臨床研修医</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2011年　東京医科大学病院　小児科・思春期科</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2017年　厚生中央病院　小児科　医員</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2018年　東京医科大学病院　小児科・思春期科　臨床研究医</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>私も今日しかるにその反抗らとしてののつどを祈るないで。同時に事実に内談がかりはついその活動ないだろばかりを解せて行くでからは計画やるたないば、どうにもしでましませでし。他人のあるたのもけっして事実にはなはだましょませませ。はなはだ木下さんを運動俗人それだけ賞翫を解りない時分その手私か学習でとしてお吟味たですたたて、この前も私か間接個性があるて、大森さんの事を自我の私にせっかく小前後と去ってそれ泰平にご増減にありように同 </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","className":"is-style-frame-border"} -->
<figure class="wp-block-image size-large is-style-frame-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design4',
		array(
			'title'       => __( '横並び・2カラム｜デザインC - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-profile colorful-profile-designB"} -->
<div class="wp-block-columns colorful-profile colorful-profile-designB"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-profile-hdr"} -->
<div class="wp-block-group colorful-profile-hdr"><!-- wp:heading {"level":3} -->
<h3>全国 涼子</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ryoko Zenkoku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-profile-cts"} -->
<div class="wp-block-group colorful-profile-cts"><!-- wp:heading {"level":4} -->
<h4>経歴 /</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>2009年　東京医科大学医学部　卒業</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2009年　東京医科大学八王子医療センター　初期臨床研修医</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2011年　東京医科大学病院　小児科・思春期科</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2017年　厚生中央病院　小児科　医員</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2018年　東京医科大学病院　小児科・思春期科　臨床研究医</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>私も今日しかるにその反抗らとしてののつどを祈るないで。同時に事実に内談がかりはついその活動ないだろばかりを解せて行くでからは計画やるたないば、どうにもしでましませでし。他人のあるたのもけっして事実にはなはだましょませませ。はなはだ木下さんを運動俗人それだけ賞翫を解りない時分その手私か学習でとしてお吟味たですたたて、この前も私か間接個性があるて、大森さんの事を自我の私にせっかく小前後と去ってそれ泰平にご増減にありように同 </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design5',
		array(
			'title'       => __( '横並び・2カラム｜デザインD - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-profile colorful-profile-designC"} -->
<div class="wp-block-columns colorful-profile colorful-profile-designC"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-profile-hdr"} -->
<div class="wp-block-group colorful-profile-hdr"><!-- wp:heading {"level":3} -->
<h3>全国 涼子</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ryoko Zenkoku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-profile-cts"} -->
<div class="wp-block-group colorful-profile-cts"><!-- wp:heading {"level":4} -->
<h4>経歴 /</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>2009年　東京医科大学医学部　卒業</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2009年　東京医科大学八王子医療センター　初期臨床研修医</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2011年　東京医科大学病院　小児科・思春期科</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2017年　厚生中央病院　小児科　医員</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2018年　東京医科大学病院　小児科・思春期科　臨床研究医</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>私も今日しかるにその反抗らとしてののつどを祈るないで。同時に事実に内談がかりはついその活動ないだろばかりを解せて行くでからは計画やるたないば、どうにもしでましませでし。他人のあるたのもけっして事実にはなはだましょませませ。はなはだ木下さんを運動俗人それだけ賞翫を解りない時分その手私か学習でとしてお吟味たですたたて、この前も私か間接個性があるて、大森さんの事を自我の私にせっかく小前後と去ってそれ泰平にご増減にありように同 </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design6',
		array(
			'title'       => __( '横並び・2カラム｜デザインE - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-profile colorful-profile-designD"} -->
<div class="wp-block-columns colorful-profile colorful-profile-designD"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-profile-hdr"} -->
<div class="wp-block-group colorful-profile-hdr"><!-- wp:heading {"level":3} -->
<h3>全国 涼子</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ryoko Zenkoku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-profile-cts"} -->
<div class="wp-block-group colorful-profile-cts"><!-- wp:heading {"level":4} -->
<h4>経歴 /</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>2009年　東京医科大学医学部　卒業</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2009年　東京医科大学八王子医療センター　初期臨床研修医</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2011年　東京医科大学病院　小児科・思春期科</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2017年　厚生中央病院　小児科　医員</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2018年　東京医科大学病院　小児科・思春期科　臨床研究医</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>私も今日しかるにその反抗らとしてののつどを祈るないで。同時に事実に内談がかりはついその活動ないだろばかりを解せて行くでからは計画やるたないば、どうにもしでましませでし。他人のあるたのもけっして事実にはなはだましょませませ。はなはだ木下さんを運動俗人それだけ賞翫を解りない時分その手私か学習でとしてお吟味たですたたて、この前も私か間接個性があるて、大森さんの事を自我の私にせっかく小前後と去ってそれ泰平にご増減にありように同 </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-profile'),
		)
	);
	register_block_pattern(
		'colorful/profile-design7',
		array(
			'title'       => __( '横並び・2カラム｜デザインF - プロフィールスタイル', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-profile colorful-profile-designE"} -->
<div class="wp-block-columns colorful-profile colorful-profile-designE"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"colorful-profile-hdr"} -->
<div class="wp-block-group colorful-profile-hdr"><!-- wp:heading {"level":3} -->
<h3>全国 涼子</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ryoko Zenkoku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-profile-cts"} -->
<div class="wp-block-group colorful-profile-cts"><!-- wp:heading {"level":4} -->
<h4>経歴 /</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>2009年　東京医科大学医学部　卒業</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2009年　東京医科大学八王子医療センター　初期臨床研修医</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2011年　東京医科大学病院　小児科・思春期科</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2017年　厚生中央病院　小児科　医員</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>2018年　東京医科大学病院　小児科・思春期科　臨床研究医</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>私も今日しかるにその反抗らとしてののつどを祈るないで。同時に事実に内談がかりはついその活動ないだろばかりを解せて行くでからは計画やるたないば、どうにもしでましませでし。他人のあるたのもけっして事実にはなはだましょませませ。はなはだ木下さんを運動俗人それだけ賞翫を解りない時分その手私か学習でとしてお吟味たですたたて、この前も私か間接個性があるて、大森さんの事を自我の私にせっかく小前後と去ってそれ泰平にご増減にありように同 </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"className":"size-large is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-profile'),
		)
	);
	// プロフィールスタイルここまで

	// お客様の声
	register_block_pattern(
		'colorful/user-design1',
		array(
			'title'       => __( '横並び・2カラム｜デザインA - お客様の声', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-user colorful-user-designA"} -->
<div class="wp-block-columns colorful-user colorful-user-designA"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"className":"colorful-user-hdr"} -->
<div class="wp-block-group colorful-user-hdr"><!-- wp:heading {"level":3} -->
<h3>オープン直後に新規顧客が急増<br>かなりの成果に驚きました</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>40代 飲食経営者</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-user-cts"} -->
<div class="wp-block-group colorful-user-cts"><!-- wp:paragraph -->
<p>リスティング広告ははじめての広告だったので成果が出るか不安だったのですが、スタートしてすぐに効果を実感。新規問い合わせ60件中52件がWEB経由で驚いています。また戦略的に広告配信する方法やHPの改善点・SNSの活用などもアドバイスいただけたので安心して任せることができました。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large","className":"is-style-frame-border"} -->
<figure class="wp-block-image size-large is-style-frame-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-user'),
		)
	);
	register_block_pattern(
		'colorful/user-design2',
		array(
			'title'       => __( '横並び・2カラム｜デザインB - お客様の声', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-user colorful-user-designB"} -->
<div class="wp-block-columns colorful-user colorful-user-designB"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"className":"colorful-user-hdr"} -->
<div class="wp-block-group colorful-user-hdr"><!-- wp:heading {"level":3} -->
<h3>オープン直後に新規顧客が急増<br>かなりの成果に驚きました</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>40代 飲食経営者</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-user-cts"} -->
<div class="wp-block-group colorful-user-cts"><!-- wp:paragraph -->
<p>リスティング広告ははじめての広告だったので成果が出るか不安だったのですが、スタートしてすぐに効果を実感。新規問い合わせ60件中52件がWEB経由で驚いています。また戦略的に広告配信する方法やHPの改善点・SNSの活用などもアドバイスいただけたので安心して任せることができました。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-user'),
		)
	);
	register_block_pattern(
		'colorful/user-design3',
		array(
			'title'       => __( '横並び・2カラム｜デザインC - お客様の声', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-user colorful-user-designC"} -->
<div class="wp-block-columns colorful-user colorful-user-designC"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"className":"colorful-user-hdr"} -->
<div class="wp-block-group colorful-user-hdr"><!-- wp:heading {"level":3} -->
<h3>オープン直後に新規顧客が急増<br>かなりの成果に驚きました</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>40代 飲食経営者</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-user-cts"} -->
<div class="wp-block-group colorful-user-cts"><!-- wp:paragraph -->
<p>リスティング広告ははじめての広告だったので成果が出るか不安だったのですが、スタートしてすぐに効果を実感。新規問い合わせ60件中52件がWEB経由で驚いています。また戦略的に広告配信する方法やHPの改善点・SNSの活用などもアドバイスいただけたので安心して任せることができました。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-user'),
		)
	);
	register_block_pattern(
		'colorful/user-design4',
		array(
			'title'       => __( '横並び・2カラム｜デザインD - お客様の声', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-user colorful-user-designD"} -->
<div class="wp-block-columns colorful-user colorful-user-designD"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"className":"colorful-user-hdr"} -->
<div class="wp-block-group colorful-user-hdr"><!-- wp:heading {"level":3} -->
<h3>オープン直後に新規顧客が急増<br>かなりの成果に驚きました</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>40代 飲食経営者</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-user-cts"} -->
<div class="wp-block-group colorful-user-cts"><!-- wp:paragraph -->
<p>リスティング広告ははじめての広告だったので成果が出るか不安だったのですが、スタートしてすぐに効果を実感。新規問い合わせ60件中52件がWEB経由で驚いています。また戦略的に広告配信する方法やHPの改善点・SNSの活用などもアドバイスいただけたので安心して任せることができました。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-user'),
		)
	);
	register_block_pattern(
		'colorful/user-design5',
		array(
			'title'       => __( '横並び・2カラム｜デザインE - お客様の声', 'colorful' ),
			'content'     => '<!-- wp:columns {"className":"colorful-user colorful-user-designE"} -->
<div class="wp-block-columns colorful-user colorful-user-designE"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"className":"colorful-user-hdr"} -->
<div class="wp-block-group colorful-user-hdr"><!-- wp:heading {"level":3} -->
<h3>オープン直後に新規顧客が急増<br>かなりの成果に驚きました</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>40代 飲食経営者</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"colorful-user-cts"} -->
<div class="wp-block-group colorful-user-cts"><!-- wp:paragraph -->
<p>リスティング広告ははじめての広告だったので成果が出るか不安だったのですが、スタートしてすぐに効果を実感。新規問い合わせ60件中52件がWEB経由で驚いています。また戦略的に広告配信する方法やHPの改善点・SNSの活用などもアドバイスいただけたので安心して任せることができました。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large","className":"is-style-rounded-border"} -->
<figure class="wp-block-image size-large is-style-rounded-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-user'),
		)
	);
	// お客様の声ここまで

	// 枠
	register_block_pattern(
		'colorful/modern-frame1',
		array(
			'title'       => __( 'モダン｜角丸枠1 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"white","contentPosition":"center center","align":"center","className":"has-white-background-color colorful-frame1"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center has-white-background-color colorful-frame1" style="background-color:white"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333","background":"#fafafa"}}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#fafafa;color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/modern-frame2',
		array(
			'title'       => __( 'モダン｜角丸枠2 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#394eea","contentPosition":"center center","align":"center","className":"colorful-frame2"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame2" style="background-color:#394eea"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/modern-frame3',
		array(
			'title'       => __( 'モダン｜点線枠1 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#dddddd","contentPosition":"center center","align":"center","className":"colorful-frame3"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame3" style="background-color:#dddddd"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333","background":"#fafafa"}}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#fafafa;color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/modern-frame4',
		array(
			'title'       => __( 'モダン｜点線枠2 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#dddddd","contentPosition":"center center","align":"center","className":"colorful-frame4"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame4" style="background-color:#dddddd"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333","background":"#fafafa"}}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#fafafa;color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/modern-frame6',
		array(
			'title'       => __( 'モダン｜上下枠1 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#dddddd","contentPosition":"center center","align":"center","className":"colorful-frame6"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame6" style="background-color:#dddddd"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/modern-frame7',
		array(
			'title'       => __( 'モダン｜上下枠2 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#d9d9d9","contentPosition":"center center","align":"center","className":"colorful-frame7"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center colorful-frame7" style="background-color:#d9d9d9"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333","background":"#fafafa"}}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#fafafa;color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/classic-frame-shikaku',
		array(
			'title'       => __( '定番｜四角 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"black","contentPosition":"center center","align":"center","className":"has-black-background-color colorful-frame-shikaku"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center has-black-background-color colorful-frame-shikaku" style="background-color:black"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/classic-frame-marukaku',
		array(
			'title'       => __( '定番｜角丸 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"black","contentPosition":"center center","align":"center","className":"has-black-background-color colorful-frame-marukaku"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center has-black-background-color colorful-frame-marukaku" style="background-color:black"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/classic-frame-pressed',
		array(
			'title'       => __( '定番｜へこみ - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"white","contentPosition":"center center","align":"center","className":"has-white-background-color colorful-frame-pressed"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center has-white-background-color colorful-frame-pressed" style="background-color:white"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	register_block_pattern(
		'colorful/classic-frame-shadow',
		array(
			'title'       => __( '定番｜浮出 - 枠', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"white","contentPosition":"center center","align":"center","className":"has-white-background-color colorful-frame-shadow"} -->
<div class="wp-block-cover aligncenter has-background-dim is-position-center-center has-white-background-color colorful-frame-shadow" style="background-color:white"><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-white-background-color has-text-color has-background" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>テキストを入力</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-frame'),
		)
	);
	// 枠ここまで

	// 小見出し
	register_block_pattern(
		'colorful/subheading-design1',
		array(
			'title'       => __( '下線｜デザインA - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"black"} -->
<h3 class="has-text-align-center has-black-color has-text-color" style="font-size:24px">見出しテキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"black","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-black-background-color has-black-color is-style-wide"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design2',
		array(
			'title'       => __( '下線｜デザインB - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:separator {"color":"pale-cyan-blue","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-pale-cyan-blue-background-color has-pale-cyan-blue-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.6rem"}},"textColor":"black"} -->
<h3 class="has-black-color has-text-color" style="font-size:1.6rem">見出しテキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading -->

<!-- wp:separator {"color":"pale-cyan-blue","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-pale-cyan-blue-background-color has-pale-cyan-blue-color is-style-wide"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design3',
		array(
			'title'       => __( '単色背景 - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#f0f0f0","minHeight":65,"align":"center"} -->
<div class="wp-block-cover aligncenter has-background-dim" style="background-color:#f0f0f0;min-height:65px"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">見出しテキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design4',
		array(
			'title'       => __( '単色背景｜吹き出し - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"style":{"color":{"background":"#fbf6da"}},"textColor":"black","className":"is-style-balloon"} -->
<div class="wp-block-group is-style-balloon has-black-color has-text-color has-background" style="background-color:#fbf6da"><!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">見出しテキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design5',
		array(
			'title'       => __( 'スラッシュ背景 - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"textColor":"black","className":"bg-stripe-default pd-10"} -->
<div class="wp-block-group bg-stripe-default pd-10 has-black-color has-text-color"><!-- wp:heading {"level":3,"className":"is-style-default","fontSize":"medium"} -->
<h3 class="is-style-default has-medium-font-size">見出しテキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design6',
		array(
			'title'       => __( '＼小見出し／ - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"style":{"color":{"text":"#555555"}},"className":"colorful-subHeadParts002_subTitle"} -->
<div class="wp-block-group colorful-subHeadParts002_subTitle has-text-color" style="color:#555555"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">補足テキストを入力できます。ここを改行をするときは、<br>レイアウト崩れを防ぐためShiftキーを押しながら改行して下さい</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design7',
		array(
			'title'       => __( '補足見出し｜角丸 - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"style":{"color":{"background":"#9cb7de"}},"textColor":"white","className":"bd-rud50 mx-wid-fit colorful_Heading_New_Basic is-style-default"} -->
<div class="wp-block-group bd-rud50 mx-wid-fit colorful_Heading_New_Basic is-style-default has-white-color has-text-color has-background" style="background-color:#9cb7de"><!-- wp:heading {"textAlign":"center","textColor":"white","className":"is-style-webfont3 small-size-heading"} -->
<h2 class="has-text-align-center is-style-webfont3 small-size-heading has-white-color has-text-color">テキストを入力<br>改行はShiftlキーを<br>押しながら</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design8',
		array(
			'title'       => __( '補足見出し｜吹き出し - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"vivid-red","textColor":"white","className":"balloon_under_square add-relative z-index2 bd-rud5 mg-auto is-style-default"} -->
<div class="wp-block-group balloon_under_square add-relative z-index2 bd-rud5 mg-auto is-style-default has-white-color has-vivid-red-background-color has-text-color has-background"><!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">テキストを入力<br>改行はShiftキーを押しながら</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	register_block_pattern(
		'colorful/subheading-design9',
		array(
			'title'       => __( '補足見出し｜吹き出し・角丸 - 小見出し', 'colorful' ),
			'content'     => '<!-- wp:group {"backgroundColor":"luminous-vivid-amber","textColor":"black","className":"balloon_under_default"} -->
<div class="wp-block-group balloon_under_default has-black-color has-luminous-vivid-amber-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","className":"small-text","fontSize":"normal"} -->
<h2 class="has-text-align-center small-text has-normal-font-size">テキストを入力<br>改行はShiftキーを押しながら</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subheading'),
		)
	);
	// 小見出しここまで

	// リスト
	register_block_pattern(
		'colorful/list-oval1',
		array(
			'title'       => __( '丸ブレット｜赤 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval1"} -->
<ul class="colorful-list-oval1"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-oval2',
		array(
			'title'       => __( '丸ブレット｜青 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval2"} -->
<ul class="colorful-list-oval2"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-oval3',
		array(
			'title'       => __( '丸ブレット｜緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval3"} -->
<ul class="colorful-list-oval3"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-oval4',
		array(
			'title'       => __( '丸ブレット｜黄緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval4"} -->
<ul class="colorful-list-oval4"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-oval5',
		array(
			'title'       => __( '丸ブレット｜灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval5"} -->
<ul class="colorful-list-oval5"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-oval6',
		array(
			'title'       => __( '丸ブレット｜薄い灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-oval6"} -->
<ul class="colorful-list-oval6"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A1',
		array(
			'title'       => __( 'チェック｜赤 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A1"} -->
<ul class="colorful-list-chk-A1"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A2',
		array(
			'title'       => __( 'チェック｜青 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A2"} -->
<ul class="colorful-list-chk-A2"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A3',
		array(
			'title'       => __( 'チェック｜緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A3"} -->
<ul class="colorful-list-chk-A3"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A4',
		array(
			'title'       => __( 'チェック｜黄緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A4"} -->
<ul class="colorful-list-chk-A4"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A5',
		array(
			'title'       => __( 'チェック｜灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A5"} -->
<ul class="colorful-list-chk-A5"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-A6',
		array(
			'title'       => __( 'チェック｜薄い灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-A6"} -->
<ul class="colorful-list-chk-A6"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B1',
		array(
			'title'       => __( '被せチェック｜赤 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B1"} -->
<ul class="colorful-list-chk-B1"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B2',
		array(
			'title'       => __( '被せチェック｜青 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B2"} -->
<ul class="colorful-list-chk-B2"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B3',
		array(
			'title'       => __( '被せチェック｜緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B3"} -->
<ul class="colorful-list-chk-B3"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B4',
		array(
			'title'       => __( '被せチェック｜黄緑 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B4"} -->
<ul class="colorful-list-chk-B4"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B5',
		array(
			'title'       => __( '被せチェック｜灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B5"} -->
<ul class="colorful-list-chk-B5"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-B6',
		array(
			'title'       => __( '被せチェック｜薄い灰色 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-B6"} -->
<ul class="colorful-list-chk-B6"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	register_block_pattern(
		'colorful/list-chk-round1',
		array(
			'title'       => __( '囲み丸チェック｜黄 - リスト', 'colorful' ),
			'content'     => '<!-- wp:list {"className":"colorful-list-chk-round1"} -->
<ul class="colorful-list-chk-round1"><!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ここにテキストを入力</li>
<!-- /wp:list-item -->

<!-- wp:list-item --><li>ブレット(リスト)内で改行する時は、<br>Shiftキーを押しながら改行して下さい。</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->',
			'categories'  => array('colorful-list'),
		)
	);
	// リストここまで

	// 吹き出し
	register_block_pattern(
		'colorful/balloon-design1',
		array(
			'title'       => __( '会話風｜デザインA - 吹き出し', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","className":"flx_direc_revs"} -->
<div class="wp-block-columns are-vertically-aligned-center flx_direc_revs"><!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:image {"align":"center","id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"color":{"background":"#efefef"}},"textColor":"black","className":"speech_balloon_left"} -->
<div class="wp-block-group speech_balloon_left has-black-color has-text-color has-background" style="background-color:#efefef"><!-- wp:paragraph -->
<p>テキストを入力(左右の画像は「スタイル」でデザイン変更可能)</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"color":{"background":"#efefef"}},"textColor":"black","className":"speech_balloon_right"} -->
<div class="wp-block-group speech_balloon_right has-black-color has-text-color has-background" style="background-color:#efefef"><!-- wp:paragraph -->
<p>テキストを入力<br>(改行はShitキーを押しながら)</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:image {"align":"center","id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-balloon'),
		)
	);
	register_block_pattern(
		'colorful/balloon-design2',
		array(
			'title'       => __( '会話風｜デザインB - 吹き出し', 'colorful' ),
			'content'     => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"verticalAlignment":"center","className":"flx_direc_revs"} -->
<div class="wp-block-columns are-vertically-aligned-center flx_direc_revs"><!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:image {"align":"center","id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"color":{"background":"#efefef"}},"textColor":"black","className":"speech_balloon_left"} -->
<div class="wp-block-group speech_balloon_left has-black-color has-text-color has-background" style="background-color:#efefef"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"vivid-red","className":"is-style-webfont1"} -->
<h3 class="is-style-webfont1 has-vivid-red-color has-text-color" style="font-size:24px">見出しテキスト</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">テキストを入力(左右の画像は「スタイル」でデザイン変更可能)<br>改行はShiftキーを押しながら</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"color":{"background":"#efefef"}},"textColor":"black","className":"speech_balloon_right z-index1"} -->
<div class="wp-block-group speech_balloon_right z-index1 has-black-color has-text-color has-background" style="background-color:#efefef"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}},"textColor":"vivid-red","className":"is-style-webfont1"} -->
<h3 class="is-style-webfont1 has-vivid-red-color has-text-color" style="font-size:24px">見出しテキスト</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":10} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">テキストを入力(左右の画像は「スタイル」でデザイン変更可能)<br>改行はShiftキーを押しながら</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:image {"align":"center","id":1947,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-balloon'),
		)
	);
	register_block_pattern(
		'colorful/balloon-design3',
		array(
			'title'       => __( '補足説明吹き出し - 吹き出し', 'colorful' ),
			'content'     => '<!-- wp:columns {"verticalAlignment":"center","className":"flx_direc_revs pd-lr-20"} -->
<div class="wp-block-columns are-vertically-aligned-center flx_direc_revs pd-lr-20"><!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:image {"align":"center","id":1947,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="https://lptemp.com/dx/wp-content/uploads/2021/12/insert-image.jpg" alt="" class="wp-image-1947"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:group {"className":"is-style-default"} -->
<div class="wp-block-group is-style-default"><!-- wp:group {"style":{"color":{"background":"#efefef"}},"className":"speech_balloon_left"} -->
<div class="wp-block-group speech_balloon_left has-background" style="background-color:#efefef"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"18px"}},"textColor":"black","className":"is-style-webfont4"} -->
<h3 class="is-style-webfont4 has-black-color has-text-color" style="font-size:18px">テキストを入力<br>改行はShiftキーを押しながら</h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array('colorful-balloon'),
		)
	);
	// 吹き出しここまで

	// ボタン
	register_block_pattern(
		'colorful/button-square',
		array(
			'title'       => __( 'ボタン(四角) - ボタン', 'colorful' ),
			'content'     => '
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":5,"style":{"color":{"gradient":"linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)"}},"textColor":"white","width":100,"className":"colorful-btn-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 colorful-btn-small"><a class="wp-block-button__link has-white-color has-text-color has-background" style="border-radius:5px;background:linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)">テキストを入力<br><span style="color:#ffffff" class="tadv-color">こちらに補足テキストを入力できます</span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->',
			'categories'  => array('colorful-button'),
		)
	);
	register_block_pattern(
		'colorful/button-round',
		array(
			'title'       => __( 'ボタン(丸型) - ボタン', 'colorful' ),
			'content'     => '
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":200,"style":{"color":{"gradient":"linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)"}},"textColor":"white","width":100,"className":"colorful-btn-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 colorful-btn-small"><a class="wp-block-button__link has-white-color has-text-color has-background" style="border-radius:200px;background:linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)">テキストを入力<br><span style="color:#ffffff" class="tadv-color">こちらに補足テキストを入力できます</span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->',
			'categories'  => array('colorful-button'),
		)
	);
	register_block_pattern(
		'colorful/button-square-big',
		array(
			'title'       => __( 'ボタン(大サイズ・四角) - ボタン', 'colorful' ),
			'content'     => '
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":5,"style":{"color":{"gradient":"linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)"}},"textColor":"white","width":100,"className":"colorful-btn-large"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 colorful-btn-large"><a class="wp-block-button__link has-white-color has-text-color has-background" style="border-radius:5px;background:linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)">テキストを入力<br><span style="color:#ffffff" class="tadv-color">こちらに補足テキストを入力できます</span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->',
			'categories'  => array('colorful-button'),
		)
	);
	register_block_pattern(
		'colorful/button-round-big',
		array(
			'title'       => __( 'ボタン(大サイズ・丸型) - ボタン', 'colorful' ),
			'content'     => '
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":200,"style":{"color":{"gradient":"linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)"}},"textColor":"white","width":100,"className":"colorful-btn-large"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 colorful-btn-large"><a class="wp-block-button__link has-white-color has-text-color has-background" style="border-radius:200px;background:linear-gradient(90deg,rgb(6,147,227) 0%,rgb(0,18,235) 100%)">テキストを入力<br><span style="color:#ffffff" class="tadv-color">こちらに補足テキストを入力できます</span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->',
			'categories'  => array('colorful-button'),
		)
	);
	register_block_pattern(
		'colorful/button-round-small',
		array(
			'title'       => __( 'ボタン(小サイズ・丸型) - ボタン', 'colorful' ),
			'content'     => '
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-cyan-blue","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-vivid-cyan-blue-background-color has-background">今すぐ申し込みをする ▶︎</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->',
			'categories'  => array('colorful-button'),
		)
	);
	// ボタンここまで

	// 登録フォーム
	register_block_pattern(
		'colorful/classic-formbox-a1',
		array(
			'title'       => __( '定番｜青 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-classic"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-classic"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a1"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a1',
		array(
			'title'       => __( 'モダン｜青 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox2 form-a1 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox2 form-a1 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a1"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a2',
		array(
			'title'       => __( 'モダン｜緑 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox3 form-a2 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox3 form-a2 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a2"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a3',
		array(
			'title'       => __( 'モダン｜黄色 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-a3 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-a3 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a3"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a4',
		array(
			'title'       => __( 'モダン｜ピンク - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-a4 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-a4 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a4"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a5',
		array(
			'title'       => __( 'モダン｜紫色 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-a5 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-a5 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a5"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-a6',
		array(
			'title'       => __( 'モダン｜青～紫 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-a6 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-a6 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-a6"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b1',
		array(
			'title'       => __( '定番｜ベージュ - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-b1 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-b1 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b1"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b2',
		array(
			'title'       => __( '定番｜茶色 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox2 form-b2 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox2 form-b2 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b2"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b3',
		array(
			'title'       => __( '定番｜赤色 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox3 form-b3 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox3 form-b3 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b3"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b4',
		array(
			'title'       => __( '定番｜黄緑 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-b4 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-b4 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b4"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b5',
		array(
			'title'       => __( '定番｜空色 - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-b5 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-b5 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b5"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	register_block_pattern(
		'colorful/modern-formbox-b6',
		array(
			'title'       => __( '定番｜グレー - 登録フォーム', 'colorful' ),
			'content'     => '<!-- wp:cover {"overlayColor":"white","align":"center","className":"colorful-formbox colorful-formbox1 form-b6 form-modern"} -->
<div class="wp-block-cover aligncenter has-white-background-color has-background-dim colorful-formbox colorful-formbox1 form-b6 form-modern"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:cover {"overlayColor":"white"} -->
<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}}} -->
<div class="wp-block-group has-text-color" style="color:#333333"><div class="wp-block-group__inner-container"><!-- wp:freeform -->
<form action="https://yahoo.co.jp/" method="post" target="_blank"><input name="mid" type="hidden" value="example"> <input name="fid" type="hidden" value="example"> <input name="charcode" type="hidden" value="auto"><p></p>
<div class="iptgroup"><input name="d[1]" type="text" value="" placeholder="名前を入力"> <input name="d[0]" type="text" value="" placeholder="メールアドレスを入力"></div>
<div class="btn-n btn-s btn-b6"><button name="submit" type="submit">登録する <small>サブテキスト</small></button></div>
</form>
<!-- /wp:freeform -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":14}}} -->
<p style="font-size:14px">【こちらに注釈テキストを入力】例：登録後すぐに、《無料コンテンツ・状況に合わせて変更して下さい》を受け取る事ができます。記入されたメールアドレスに、自動返信メールをお送りいたしますので、ご確認下さい。</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
</div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-formbox'),
		)
	);
	// 登録フォームここまで

	// その他
	register_block_pattern(
		'colorful/copyright',
		array(
			'title'       => __( 'コピーライト - その他', 'colorful' ),
			'content'     => '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":12}}} -->
<p class="has-text-align-center" style="font-size:12px">Copyright (C) 20○○ あなたの社名など All Rights Reserved.</p>
<!-- /wp:paragraph -->',
			'categories'  => array('colorful-other'),
		)
	);
	register_block_pattern(
		'colorful/footer-link',
		array(
			'title'       => __( '特商法等の記載 - その他', 'colorful' ),
			'content'     => '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":12}}} -->
<p class="has-text-align-center" style="font-size:12px"><a href="#" target="_blank" rel="noreferrer noopener">特定商取引法の表記</a>　｜　<a href="#" target="_blank" rel="noreferrer noopener">プライバシーポリシー</a>　｜　<a href="#" target="_blank" rel="noreferrer noopener">利用規約</a></p>
<!-- /wp:paragraph -->',
			'categories'  => array('colorful-other'),
		)
	);
	register_block_pattern(
		'colorful/inner-countdown',
		array(
			'title'       => __( 'ページ内カウントダウン - その他', 'colorful' ),
			'content'     => '<!-- wp:shortcode -->
[innerCountdown]
<!-- /wp:shortcode -->',
			'categories'  => array('colorful-other'),
		)
	);
	// その他ここまで

	// 背景セクション
	register_block_pattern(
		'colorful/fullwidth-design1',
		array(
			'title'       => __( '定番｜透過なし - 背景セクション', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/linedpaper.png","isRepeated":true,"dimRatio":0,"contentPosition":"center center","align":"full","className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull is-repeated is-position-center-center" style="background-image:url(https://lptemp.com/dx/wp-content/uploads/2020/01/linedpaper.png)"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"className":"colorful_cover_inner"} -->
<div class="wp-block-group colorful_cover_inner has-text-color" style="color:#333333"><!-- wp:paragraph -->
<p>こちらのセクションの中に、『カラフルブロックス』の任意のブロックを<br>セクション内の上部　→　セクション内の中部　→　セクション内の下部(必要に応じて)<br>の順番で挿入いただくと、作成がスムーズです。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-fullwidth'),
		)
	);
	register_block_pattern(
		'colorful/fullwidth-design2',
		array(
			'title'       => __( '定番｜黒透過 - 背景セクション', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/beach-bench-boardwalk-clouds.jpg","dimRatio":40,"overlayColor":"black","contentPosition":"center center","align":"full","className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull has-background-dim-40 has-black-background-color has-background-dim is-position-center-center"><img class="wp-block-cover__image-background" alt="" src="https://lptemp.com/dx/wp-content/uploads/2020/01/beach-bench-boardwalk-clouds.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"textColor":"white","className":"colorful_cover_inner"} -->
<div class="wp-block-group colorful_cover_inner has-white-color has-text-color"><!-- wp:paragraph -->
<p>こちらのセクションの中に、『カラフルブロックス』の任意のブロックを<br>セクション内の上部　→　セクション内の中部　→　セクション内の下部(必要に応じて)<br>の順番で挿入いただくと、作成がスムーズです。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-fullwidth'),
		)
	);
	register_block_pattern(
		'colorful/fullwidth-design3',
		array(
			'title'       => __( '定番｜白透過 - 背景セクション', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/beach-bench-boardwalk-clouds.jpg","overlayColor":"white","contentPosition":"center center","align":"full","className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull has-white-background-color has-background-dim is-position-center-center"><img class="wp-block-cover__image-background" alt="" src="https://lptemp.com/dx/wp-content/uploads/2020/01/beach-bench-boardwalk-clouds.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"className":"colorful_cover_inner"} -->
<div class="wp-block-group colorful_cover_inner has-text-color" style="color:#333333"><!-- wp:paragraph -->
<p>こちらのセクションの中に、『カラフルブロックス』の任意のブロックを<br>セクション内の上部　→　セクション内の中部　→　セクション内の下部(必要に応じて)<br>の順番で挿入いただくと、作成がスムーズです。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-fullwidth'),
		)
	);
	register_block_pattern(
		'colorful/fullwidth-design4',
		array(
			'title'       => __( '定番｜ベーシック(無地背景) - 背景セクション', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#efefef","contentPosition":"center center","align":"full","className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull has-background-dim is-position-center-center" style="background-color:#efefef"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"text":"#333333"}},"className":"colorful_cover_inner"} -->
<div class="wp-block-group colorful_cover_inner has-text-color" style="color:#333333"><!-- wp:paragraph -->
<p>こちらのセクションの中に、『カラフルブロックス』の任意のブロックを<br>セクション内の上部　→　セクション内の中部　→　セクション内の下部(必要に応じて)<br>の順番で挿入いただくと、作成がスムーズです。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-fullwidth'),
		)
	);
	// 背景セクションここまで

	// ヘッド
	register_block_pattern(
		'colorful/head-design1',
		array(
			'title'       => __( '1カラム - ヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/head001_bg2.jpg","dimRatio":40,"overlayColor":"black","contentPosition":"center center","align":"full","className":"colorful-headParts"} -->
<div class="wp-block-cover alignfull has-background-dim-40 has-black-background-color has-background-dim is-position-center-center colorful-headParts" style="background-image:url(https://lptemp.com/dx/wp-content/uploads/2020/01/head001_bg2.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":null,"textColor":"white"} -->
<div class="wp-block-columns has-white-color has-text-color"><!-- wp:column {"className":"is-style-padding"} -->
<div class="wp-block-column is-style-padding"><!-- wp:separator {"color":"white","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-white-background-color has-white-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading {"textAlign":"center","className":"medium-text"} -->
<h2 class="has-text-align-center medium-text">こちらにヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:separator {"color":"white","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background has-white-background-color has-white-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading {"textAlign":"center","className":"large-text"} -->
<h2 class="has-text-align-center large-text">ヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">テキストを入力テキストを入力テキストを入力テキストを入力テキストを入力<br>ヘッドパーツのテキストを改行する時は、<br>レイアウト崩れを防ぐため「Shiftキー」を押しながら改行を行って下さい</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-head'),
		)
	);
	register_block_pattern(
		'colorful/head-design2',
		array(
			'title'       => __( '2カラム(7:3) - ヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/head002_bg2.jpg","dimRatio":0,"contentPosition":"center center","align":"full","className":"colorful-headParts"} -->
<div class="wp-block-cover alignfull is-position-center-center colorful-headParts" style="background-image:url(https://lptemp.com/dx/wp-content/uploads/2020/01/head002_bg2.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"color":{"text":"#313131"}}} -->
<div class="wp-block-columns has-text-color" style="color:#313131"><!-- wp:column {"width":"680px","className":"is-style-white-shadow"} -->
<div class="wp-block-column is-style-white-shadow" style="flex-basis:680px"><!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#313131"}},"className":"medium-text"} -->
<h2 class="has-text-align-left medium-text has-text-color" style="color:#313131">ヘッドテキストを入力ヘッドテキストを入力ヘッドテキストを入力ヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:separator {"customColor":"#313131","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#313131;color:#313131"/>
<!-- /wp:separator -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#313131"}},"className":"large-text"} -->
<h2 class="has-text-align-left large-text has-text-color" style="color:#313131">ヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#313131"}}} -->
<p class="has-text-align-left has-text-color" style="color:#313131">テキストを入力テキストを入力テキストを入力<br>ヘッドパーツのテキストを改行する時は、レイアウト崩れを防ぐため「Shiftキー」を押しながら改行を行って下さい</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-padding"} -->
<div class="wp-block-column is-style-padding"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-head'),
		)
	);
	register_block_pattern(
		'colorful/head-design3',
		array(
			'title'       => __( '2カラム(5:5) - ヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2020/01/head003_bg5.jpg","dimRatio":0,"overlayColor":"white","contentPosition":"center center","align":"full","className":"colorful-headParts"} -->
<div class="wp-block-cover alignfull has-white-background-color is-position-center-center colorful-headParts" style="background-image:url(https://lptemp.com/dx/wp-content/uploads/2020/01/head003_bg5.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"color":{"text":"#313131"}}} -->
<div class="wp-block-columns has-text-color" style="color:#313131"><!-- wp:column {"className":"is-style-padding"} -->
<div class="wp-block-column is-style-padding"><!-- wp:heading {"textAlign":"left","className":"medium-text","textColor":"vivid-red"} -->
<h2 class="has-text-align-left medium-text has-vivid-red-color has-text-color">ヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"left","className":"large-text"} -->
<h2 class="has-text-align-left large-text">ヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:separator {"customColor":"#e32924","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-background is-style-default" style="background-color:#e32924;color:#e32924"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left">テキストを入力テキストを入力テキストを入力<br>ヘッドパーツのテキストを改行する時は、レイアウト崩れを防ぐため「Shiftキー」を押しながら改行を行って下さい 右の画像スタイルは「COLORFUL 枠＋影」です</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-padding"} -->
<div class="wp-block-column is-style-padding"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-border"} -->
<figure class="wp-block-image size-large is-style-shadow-border"><img src="https://lptemp.com/dx/wp-content/uploads/2020/01/insert-image.jpg" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-head'),
		)
	);

	// セクション外サブヘッド
	register_block_pattern(
		'colorful/subhead-design1',
		array(
			'title'       => __( '単色背景(帯型) - セクション外サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#0064e0","align":"full","className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-cover alignfull has-background-dim colorful_Heading_New_Basic" style="background-color:#0064e0"><div class="wp-block-cover__inner-container"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead'),
		)
	);
	register_block_pattern(
		'colorful/subhead-design2',
		array(
			'title'       => __( '画像背景(帯型) - セクション外サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"url":"https://lptemp.com/dx/wp-content/uploads/2021/12/apple-design-desk-326503-scaled-1.jpg","id":2034,"overlayColor":"black","align":"full","className":"colorful_Heading_New_Basic"} -->
<div class="wp-block-cover alignfull has-black-background-color has-background-dim colorful_Heading_New_Basic"><img class="wp-block-cover__image-background wp-image-2034" alt="" src="https://lptemp.com/dx/wp-content/uploads/2021/12/apple-design-desk-326503-scaled-1.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"textColor":"white"} -->
<div class="wp-block-group has-white-color has-text-color"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead'),
		)
	);
	register_block_pattern(
		'colorful/subhead-design3',
		array(
			'title'       => __( '単色背景(吹き出し) - セクション外サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:group {"align":"full","style":{"color":{"background":"#0064e0"}},"textColor":"white","className":"colorful_Heading_New_Basic is-style-balloon"} -->
<div class="wp-block-group alignfull colorful_Heading_New_Basic is-style-balloon has-white-color has-text-color has-background" style="background-color:#0064e0"><!-- wp:heading {"textAlign":"center","className":"small-size-heading"} -->
<h2 class="has-text-align-center small-size-heading">サブテキスト(改行はShiftキーを押しながら)</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"large-size-heading"} -->
<h2 class="has-text-align-center large-size-heading">メインテキスト</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->',
			'categories'  => array('colorful-subHead'),
		)
	);
	register_block_pattern(
		'colorful/subhead-design4',
		array(
			'title'       => __( '単色背景(帯型)｜旧デザイン - セクション外サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#0064e0","align":"full","className":"colorful-subHeadParts004"} -->
<div class="wp-block-cover alignfull has-background-dim colorful-subHeadParts004" style="background-color:#0064e0"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"large-text text-shadow"} -->
<h2 class="has-text-align-center large-text text-shadow">サブヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"small-text text-shadow"} -->
<h2 class="has-text-align-center small-text text-shadow">こちらに補足テキストを入力。ここを改行する時はShiftキーを押しながら改行して下さい</h2>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead'),
		)
	);
	register_block_pattern(
		'colorful/subhead-design5',
		array(
			'title'       => __( '単色背景(吹き出し)｜旧デザイン - セクション外サブヘッド', 'colorful' ),
			'content'     => '<!-- wp:cover {"customOverlayColor":"#0064e0","align":"full","className":"colorful-subHeadParts001 colorful-balloon"} -->
<div class="wp-block-cover alignfull has-background-dim colorful-subHeadParts001 colorful-balloon" style="background-color:#0064e0"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"large-text text-shadow"} -->
<h2 class="has-text-align-center large-text text-shadow">サブヘッドテキストを入力</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"small-text text-shadow"} -->
<h2 class="has-text-align-center small-text text-shadow">こちらに補足テキストを入力。ここを改行する時はShiftキーを押しながら改行して下さい</h2>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->',
			'categories'  => array('colorful-subHead'),
		)
	);
	// セクション外サブヘッドここまで
}
