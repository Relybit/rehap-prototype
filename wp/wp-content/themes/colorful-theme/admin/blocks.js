'use strict';

var registerPlugin = wp.plugins.registerPlugin;
var _wp$editPost = wp.editPost,
    PluginSidebar = _wp$editPost.PluginSidebar,
    PluginSidebarMoreMenuItem = _wp$editPost.PluginSidebarMoreMenuItem;
var Fragment = wp.element.Fragment;
var _wp$components = wp.components,
    Panel = _wp$components.Panel,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    Button = _wp$components.Button,
    Spinner = _wp$components.Spinner;
var parse = wp.blocks.parse;
var _wp$richText = wp.richText,
    registerFormatType = _wp$richText.registerFormatType,
    toggleFormat = _wp$richText.toggleFormat;
var RichTextToolbarButton = wp.editor.RichTextToolbarButton;
var __ = wp.i18n.__;


var ColorfulIcon = wp.element.createElement('svg', {
    className: 'colorful_icon',
    width: 20,
    height: 20,
    viewBox: "0 0 736.9 736.38"
}, wp.element.createElement('g', {
    class: "color01"
}, wp.element.createElement('path', {
    d: "M324,32.9A37.85,37.85,0,0,0,302.1,52l-2.6,5.5-.3,33.7c-.2,27.2,0,33.8,1,33.8,2.8,0,19,8,27.4,13.5,11.3,7.3,28.2,24.2,34.9,34.9l5,7.8.3-60.8c.2-67.8.4-65.6-6.6-74.9C357.3,40.3,349.1,34.7,343,33,338.9,31.9,327.6,31.8,324,32.9Z"
})), wp.element.createElement('g', {
    class: "color02"
}, wp.element.createElement('path', {
    d: "M121.2,142l.3,33.5,2.7,5.7c3.5,7.6,9.8,14.2,16.7,17.5l5.6,2.8,59,.5c54.4.5,59.4.7,64,2.4,15.1,5.7,25.2,17.2,28.4,32.4.7,3.6,1.1,27.3,1.1,73.7V379h69.1l-.3-78.3-.3-78.2-2.7-9.6a109.43,109.43,0,0,0-76.5-76.7l-9.8-2.6-59-.6c-65.2-.7-64.9-.7-79-7.5a46.18,46.18,0,0,1-17.3-14l-2.2-3Z"
})), wp.element.createElement('g', {
    class: "color03"
}, wp.element.createElement('path', {
    d: "M466.5,132.7c-19.6,2.6-39.2,16.7-48.3,34.8-6.8,13.6-6.6,11.2-7,73.8l-.3,56.9,21.8-.4c21.4-.3,21.9-.4,27.4-3.1,6.7-3.2,14.2-10.9,17.2-17.5,2-4.4,2.2-6.6,2.7-32.7.4-23.8.8-28.5,2.2-31.1,2-3.7,7.9-9.1,11.7-10.7,1.6-.6,13.6-1.3,31.1-1.6,26.9-.6,28.7-.7,33.1-2.9a35.06,35.06,0,0,0,16-15.4l3.4-6.3.3-22.3.3-22.2-54.3.1C493.9,132.2,468.2,132.5,466.5,132.7Z"
})), wp.element.createElement('g', {
    class: "color04"
}, wp.element.createElement('path', {
    d: "M613.9,133.4c-10.1,2.7-18.4,9.9-23.1,20.2-2.3,4.9-2.3,5.2-2.8,64.4l-.5,59.5-3.2,6.8c-3.8,8-11.4,16.3-18.3,20.1-9.9,5.4-12.5,5.6-86.7,5.6H411v69.1l78.3-.3,78.2-.4,9.6-2.6a106.53,106.53,0,0,0,50.4-30c14-14.4,21.8-28.3,27.3-48.7l2.6-9.6L658,228c.6-58.7.6-59.6,2.9-66.5,4.4-13.2,9.3-20.7,17.5-26.7l3.9-2.8-31.9.1C628.5,132.1,617.1,132.5,613.9,133.4Z"
})), wp.element.createElement('g', {
    class: "color01"
}, wp.element.createElement('path', {
    d: "M121.2,269.1l.3,57.4,3.1,8.6c5.9,16.6,16.6,29.2,31.3,36.8,14.3,7.4,13.1,7.3,75.4,7.8l55.8.5-.3-22.3-.3-22.4-3.4-6.3A35.17,35.17,0,0,0,267,313.6c-4.2-1.9-6.6-2.1-32-2.6-27.1-.5-27.6-.5-32.5-3.1a23,23,0,0,1-8-6.8l-3-4.3-.6-28.6c-.4-20.5-.9-29.7-1.9-32.2a38,38,0,0,0-19.5-20.7c-5.8-2.7-6.5-2.7-27.3-3.1l-21.3-.4Z"
})), wp.element.createElement('g', {
    class: "color03"
}, wp.element.createElement('path', {
    d: "M665.3,311.7a122.56,122.56,0,0,1-48.6,62l-8.1,5.3h61.2c59.4,0,61.3-.1,66.7-2.1,7.7-2.9,15.5-10.2,19.1-18.1,2.4-5.3,2.8-7.6,2.8-14.3,0-10.6-3.4-18.5-11.1-25.5-9.5-8.7-11.2-9-48.9-9C668.4,310,665.9,310.1,665.3,311.7Z"
})), wp.element.createElement('g', {
    class: "color05"
}, wp.element.createElement('path', {
    d: "M493.2,443.2c.3,22,.3,22.4,3.1,27.9,3.3,6.9,9.9,13.2,17.5,16.7,5.6,2.7,6,2.7,33.2,3.2,29.9.5,30.6.7,36.1,6.7,5.7,6.1,5.9,7.1,5.9,34,0,27.7.8,33.2,6.2,41.5a34.71,34.71,0,0,0,15.5,13.1c4.4,2,6.6,2.2,26.6,2.5l21.7.4V535.8c-.1-59.6-.4-63.8-6.4-76.4-8.6-18.1-23.6-30.7-41.9-35.3-6.3-1.6-14.1-1.9-62.5-2.5l-55.3-.7Z"
})), wp.element.createElement('g', {
    class: "color07"
}, wp.element.createElement('path', {
    d: "M48.2,423.1c-10.1,2-19.2,9.5-24.1,19.8-2.2,4.8-2.6,6.9-2.6,14.6.1,7.9.4,9.7,3,14.8a36.52,36.52,0,0,0,17.3,16.5l5.7,2.7,33,.3,33,.3,3.3-8.5c5.5-14.1,13.3-25.6,26.2-38.6,6.8-6.9,14.6-13.7,19-16.5,4.1-2.7,7.9-5.2,8.5-5.7C171.7,421.7,53.8,422,48.2,423.1Z"
})), wp.element.createElement('g', {
    class: "color08"
}, wp.element.createElement('path', {
    d: "M233.5,423c-22.1.6-24.7.9-33,3.4-38,11.3-65.1,39.2-75.6,77.8-2.2,8.1-2.3,10-2.9,67.8s-.7,59.7-2.9,67c-3.8,12.8-9.6,21.9-17.6,27.8l-3,2.2,34.5-.3,34.5-.2,5.3-2.9a41.74,41.74,0,0,0,15.4-15.8l2.3-4.3.6-59c.4-44.3.9-60,1.8-63,4.9-15.1,14.8-25.2,28.9-29.5,6.1-1.9,9.5-2,76.3-2H368V422l-55.2.2C282.4,422.3,246.7,422.7,233.5,423Z"
})), wp.element.createElement('g', {
    class: "color06"
}, wp.element.createElement('path', {
    d: "M412.2,500.7c.3,77.3.4,78.9,2.5,86.5a110.8,110.8,0,0,0,27.1,48c18.7,19.4,41.3,30.2,68.1,32.8,5.8.5,32.7,1,59.7,1,45.6,0,49.6.1,56.8,2,11.3,2.9,20.7,8.2,27.2,15.4l5.5,6.1-.3-33.5-.3-33.5-2.6-5.6a35.87,35.87,0,0,0-16.1-17l-6.3-3.4L574,599c-64.8-.6-62.1-.4-72.5-6.4-5.1-3.1-12.7-11.1-15.4-16.4-5-9.9-5.1-10.7-5.1-84.9V422H411.9Z"
})), wp.element.createElement('g', {
    class: "color07"
}, wp.element.createElement('path', {
    d: "M321.2,506.1c-6.5,2.5-14.9,10.5-18.3,17.4-2.3,4.8-2.4,5.9-2.9,32.5-.4,18.5-1,28.4-1.8,30.4a21.41,21.41,0,0,1-9.5,10.9c-4,2.1-5.7,2.2-32.7,2.7l-28.5.5-5.7,2.8a38.2,38.2,0,0,0-16.6,16.2c-2.7,4.9-2.7,5.3-3,27.9l-.3,22.8,55.8-.7c62.4-.8,63.4-.9,76.5-7.7,14.6-7.5,25.6-20.6,31.5-37.3l2.8-8,.3-56.3.3-56.2-21.3.1C328.9,504.1,325.9,504.3,321.2,506.1Z"
})), wp.element.createElement('g', {
    class: "color05"
}, wp.element.createElement('path', {
    d: "M412,680.7c0,59.3.1,61.4,2.1,66.7,2.5,6.9,9.1,14.3,16.1,18.1,4.9,2.8,6,3,15.8,3,8.9,0,11.2-.3,15.1-2.3a35.06,35.06,0,0,0,16-15.4l3.4-6.3.3-33.8.3-33.8-3.1-1.1c-1.8-.6-7.3-3.1-12.3-5.5A121.23,121.23,0,0,1,416.1,626l-4.1-6.5Z"
//}, wp.element.createElement('path', {
//    d: "M14.82,18.27a2.08,2.08,0,0,1-1.44.59,1.84,1.84,0,0,1-.83-.19,1.76,1.76,0,0,1-.69-.51,1.21,1.21,0,0,0-.43-.32,1,1,0,0,0-.52-.11H9.05a1,1,0,0,0-.52.11,1.13,1.13,0,0,0-.43.32l0,.06,0,.07-.11.08-.15.12-.19.12a.84.84,0,0,1-.14.06h0l-.22.08L7,18.81a3.08,3.08,0,0,1-.43,0,2.06,2.06,0,0,1-1.42-.6,2,2,0,0,1-.6-1.43,2.8,2.8,0,0,1,0-.41V16.2A2.09,2.09,0,0,1,4.62,16h0l.08-.12.12-.21L5,15.51l.1-.12.06-.05h0a1.67,1.67,0,0,0,.39-.45,1.35,1.35,0,0,0,.11-.52V12.49A1.26,1.26,0,0,0,5.59,12a1.46,1.46,0,0,0-.32-.42,2.23,2.23,0,0,1-.53-.69,2,2,0,0,1-.2-.85A2,2,0,0,1,8,8.59,2.08,2.08,0,0,1,8.6,10a2.1,2.1,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.46,1.46,0,0,0-.32.42,1.26,1.26,0,0,0-.11.51v1.92a1.31,1.31,0,0,0,.11.52,1.46,1.46,0,0,0,.32.42.43.43,0,0,1,.11.12l.11.1a1,1,0,0,0,.43.31,1,1,0,0,0,.52.11h1.86a1,1,0,0,0,.52-.11,1.08,1.08,0,0,0,.43-.31,1.78,1.78,0,0,1,.69-.52,2,2,0,0,1,.83-.19,2.09,2.09,0,0,1,1.44.6,2,2,0,0,1,0,2.84h0Zm-.45-10.2a1.42,1.42,0,0,0,.32.41,2.28,2.28,0,0,1,.53.7,2,2,0,0,1,.25.84,2.05,2.05,0,0,1-.59,1.43,2,2,0,0,1-2.87,0A2,2,0,0,1,11.42,10a1.87,1.87,0,0,1,.18-.84,2.28,2.28,0,0,1,.53-.7,1.42,1.42,0,0,0,.32-.41,1.31,1.31,0,0,0,.11-.52V5.63a1.31,1.31,0,0,0-.11-.52,1.42,1.42,0,0,0-.32-.41A2.28,2.28,0,0,1,11.6,4a1.87,1.87,0,0,1-.18-.84A2,2,0,0,1,12,1.73,2,2,0,0,1,15.47,3.2a1.92,1.92,0,0,1-.19.85,2.23,2.23,0,0,1-.53.69,1.43,1.43,0,0,0-.31.42,1,1,0,0,0-.11.51V7.55A1.15,1.15,0,0,0,14.37,8.07Z"
})));

var ColorfulPluginSidebarMoreMenuItem = function ColorfulPluginSidebarMoreMenuItem() {
    return React.createElement(
        Fragment,
        null,
        React.createElement(
            PluginSidebarMoreMenuItem,
            {
                target: 'colorful_blocks_sidebar',
                icon: ColorfulIcon
            },
            __('Colorful BLOCKS', 'colorful')
        ),
        React.createElement(
            PluginSidebar,
            {
                name: 'colorful_blocks_sidebar',
                className: 'colorful_blocks_sidebar',
                icon: ColorfulIcon,
                title: __('COLORFUL BUTTON', 'colorful')
            },
            React.createElement(
                PanelBody,
                {
                    title: __('カラフルギャラリー', 'colorful'),
                    icon: '',
                    initialOpen: true
                },
                React.createElement(
                    PanelRow,
                    {
                        className: 'colorful_blocks_row'
                    },
                    React.createElement(Button, {
                        className: 'colorful_blocks_bnr colorful_blocks_def2',
                        onClick: function onClick() {
                            document.getElementById("colorful_blocks_modal2").classList.toggle('active');
                            document.getElementById("colorful_blocks_buttons").classList.toggle('active');
                            document.getElementById("colorful_blocks_jump2").classList.toggle('active');
                        }
                    }),
                    React.createElement(
                        'p',
                        null,
                        __('セクションを組み合わせてLPを作成！', 'colorful'),
                    ),
                    React.createElement('hr'),
                    React.createElement(Button, {
                        className: 'colorful_blocks_bnr colorful_blocks_def',
                        onClick: function onClick() {
                            window.open('https://lpcolorful.com/product/clfl-templates', '_blank')
                            //document.getElementById("colorful_blocks_modal").classList.toggle('active');
                            //document.getElementById("colorful_blocks_buttons").classList.toggle('active');
                            //document.getElementById("colorful_blocks_jump").classList.toggle('active');
                        }
                    }),
                    React.createElement(
                        'p',
                        null,
                        __('1クリックでテンプレートから簡単LP作成', 'colorful'),
                    ),
                    React.createElement('hr'),
                    React.createElement(Button, {
                        className: 'colorful_blocks_bnr colorful_blocks_def3',
                        onClick: function onClick() {
                            window.open('edit.php?post_type=block_pattern', '_blank')
                        }
                    }),
                    React.createElement(
                        'p',
                        null,
                        __('あなたオリジナルのデザインをつくろう！', 'colorful'),
                    ),
                    React.createElement('hr'),
                    React.createElement(
                        'a',
                        { href: 'https://seiya-eto.com/clrm/cf/clbn01', target: '_blank' },
                        React.createElement(
                            'img',
                            { src: 'https://lptemp.com/dx/wp-content/uploads/clfl_pickup-baner_01.png', alt: 'カラフルの操作に困ったら' },
                        )
                    ),
                )
            )
        )
    );
};
registerPlugin('colorful-blocks', { render: ColorfulPluginSidebarMoreMenuItem });

var colorful_blocks_tmp = [];
var colorful_blocks_num = 0;
var colorful_blocks_clip = '';
var colorful_blocks_has_multiple = 0;
function ColorfulGalleryButton(contents, element) {
    // multiple
    var colorful_blocks_modals = document.querySelectorAll('.colorful_blocks_modal');
    for (var i = 0; i < colorful_blocks_modals.length; i++) {
        if (colorful_blocks_modals[i].classList.contains('multiple')) {
            colorful_blocks_has_multiple = 1;
        }
    }
    if (colorful_blocks_has_multiple == 1) {
        // btn
        var colorful_blocks_copy = document.getElementById('colorful_blocks_copy');
        colorful_blocks_copy.classList.remove('none');
        var colorful_blocks_insert = document.getElementById('colorful_blocks_insert');
        colorful_blocks_insert.classList.remove('none');
        colorful_blocks_tmp.push(contents);
        colorful_blocks_clip = colorful_blocks_tmp.join('');
        element.classList.add('active');
        colorful_blocks_num++;
        var colorful_blocks_count = document.getElementById('colorful_blocks_count');
        colorful_blocks_count.innerText = '(' + colorful_blocks_num + ')';
    } else {
        var content = wp.blocks.parse(contents);
        wp.data.dispatch('core/editor').insertBlocks(content);
        ColorfulGalleryClose();
    }
}

function ColorfulGalleryList(elements) {
    var dir = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : colorful_blocks_imgurl;

    for (var i in ColorfulGallery[elements]) {
        var j = Number(i) + 1;
        var list = '<a onclick="ColorfulGalleryButton(ColorfulGallery[\'' + elements + '\'][' + i + '][1], this)" class="colorful_blocks_img"><img src="' + dir + 'templates/' + elements + j + '.png" alt="' + j + '" loading="lazy"><span>' + ColorfulGallery[elements][i][0] + '</span></a>';
        if(elements.indexOf('selections') != -1) {
             list = '<a onclick="ColorfulGalleryButton(ColorfulGallery[\'' + elements + '\'][' + i + '][1], this)" class="colorful_blocks_img"><img src="' + dir + 'selections/' + elements + j + '.png" alt="' + j + '" loading="lazy"><span>' + ColorfulGallery[elements][i][0] + '</span></a>';
        }
        //var list = '<a onclick="ColorfulGalleryButton(ColorfulGallery[\'' + elements + '\'][' + i + '][1], this)" class="colorful_blocks_img colorful_noimage"><img src="' + dir + 'noimage.png" alt="' + j + '"><span>' + ColorfulGallery[elements][i][0] + '</span></a>';
        //var list = '<a onclick="ColorfulGalleryButton(ColorfulGallery[\'' + elements + '\'][' + i + '], this)" class="colorful_blocks_img"><img src="' + dir + elements + '/' + j + '.png" alt="' + j + '"><span>' + j + '</span></a>';
        document.write(list);
    }
}

function ColorfulGalleryInsert() {
    var colorful_blocks_buttons = document.getElementById('colorful_blocks_buttons');
    colorful_blocks_buttons.classList.add('loading');
    setTimeout(ColorfulGalleryInsertCallback, 500);
}
var ColorfulGalleryInsertCallback = function ColorfulGalleryInsertCallback() {
    for (var i = 0; i < colorful_blocks_tmp.length; i++) {
        var content = wp.blocks.parse(colorful_blocks_tmp[i]);
        wp.data.dispatch('core/editor').insertBlocks(content);
    }
    ColorfulGalleryCancel();
    ColorfulGalleryClose();
};

function ColorfulGalleryCopy() {
    var colorful_blocks_clipboard = new ClipboardJS('.colorful_blocks_copy', {
        text: function text(trigger) {
            return colorful_blocks_clip;
        }
    });
    colorful_blocks_clipboard.on('success', function (e) {
        alert(__('コピーしたブロックは「Ctrl + v」で挿入することができます。', 'colorful'));
        ColorfulGalleryCancel();
        ColorfulGalleryClose();
    });
}

function ColorfulGalleryClose() {
    colorful_blocks_has_multiple = 0;
    var colorful_blocks_buttons = document.getElementById('colorful_blocks_buttons');
    colorful_blocks_buttons.classList.remove('active');
    var colorful_blocks_modals = document.querySelectorAll('.colorful_blocks_modal');
    for (var i = 0; i < colorful_blocks_modals.length; i++) {
        colorful_blocks_modals[i].classList.remove('active');
    }
    var colorful_blocks_jump = document.querySelectorAll('.colorful_blocks_jump');
    for (var _i = 0; _i < colorful_blocks_jump.length; _i++) {
        colorful_blocks_jump[_i].classList.remove('active');
    }
}

function ColorfulGalleryMultiple() {
    // multiple
    var colorful_blocks_modals = document.querySelectorAll('.colorful_blocks_modal');
    for (var i = 0; i < colorful_blocks_modals.length; i++) {
        colorful_blocks_modals[i].classList.add('multiple');
    }
    // btn
    var colorful_blocks_multiple = document.getElementById('colorful_blocks_multiple');
    colorful_blocks_multiple.classList.toggle('none');
    var colorful_blocks_cancel = document.getElementById('colorful_blocks_cancel');
    colorful_blocks_cancel.classList.toggle('none');
}

function ColorfulGalleryCancel() {
    colorful_blocks_tmp = [];
    colorful_blocks_num = 0;
    colorful_blocks_clip = '';
    colorful_blocks_has_multiple = 0;
    var colorful_blocks_count = document.getElementById('colorful_blocks_count');
    colorful_blocks_count.innerText = '';
    // btn
    var colorful_blocks_multiple = document.getElementById('colorful_blocks_multiple');
    colorful_blocks_multiple.classList.remove('none');
    var colorful_blocks_close = document.getElementById('colorful_blocks_close');
    colorful_blocks_close.classList.remove('none');
    var colorful_blocks_cancel = document.getElementById('colorful_blocks_cancel');
    colorful_blocks_cancel.classList.add('none');
    var colorful_blocks_insert = document.getElementById('colorful_blocks_insert');
    colorful_blocks_insert.classList.add('none');
    var colorful_blocks_buttons = document.getElementById('colorful_blocks_buttons');
    colorful_blocks_buttons.classList.remove('loading');
    var colorful_blocks_copy = document.getElementById('colorful_blocks_copy');
    colorful_blocks_copy.classList.add('none');
    // multiple
    var colorful_blocks_modals = document.querySelectorAll('.colorful_blocks_modal');
    for (var i = 0; i < colorful_blocks_modals.length; i++) {
        colorful_blocks_modals[i].classList.remove('multiple');
    }
    var colorful_blocks_imgs = document.querySelectorAll('.colorful_blocks_img');
    for (var _i = 0; _i < colorful_blocks_imgs.length; _i++) {
        colorful_blocks_imgs[_i].classList.remove('active');
    }
}

function ColorfulGalleryJump(obj) {
    var index = obj.selectedIndex;
    var value = obj.options[index].value;

    var target = document.querySelectorAll('.colorful_blocks_modal.active .colorful_blocks_modal_gallery .' + value);
    var targetTop = target[0].getBoundingClientRect().top;

    var colorful_blocks_modal_gallery = document.querySelectorAll('.colorful_blocks_modal.active .colorful_blocks_modal_gallery');
    colorful_blocks_modal_gallery[0].scrollBy(0, targetTop);
}

function ColorfulAccordion(obj) {
     obj.parentNode.classList.toggle('is-opened');
}
