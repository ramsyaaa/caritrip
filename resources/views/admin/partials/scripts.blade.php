<script src="{{asset('vendor/dashboard')}}/assets/js/core/libs.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/vendor/sheperd/dist/js/sheperd.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/plugins/select2.js" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/plugins/slider-tabs.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/vendor/swiperSlider/swiper-bundle.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/vendor/lodash/lodash.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/iqonic-script/utility.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/iqonic-script/setting.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/setting-init.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/core/external.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/charts/widgetcharts.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/charts/dashboard.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/charts/alternate-dashboard.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/hope-ui.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/hope-uipro.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/sidebar.js?v=4.0.0" defer=""></script>
<script src="{{asset('vendor/sweetalert')}}/sweetalert.min.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/plugins/circle-progress.js"></script>
<script src="{{asset('vendor/dashboard')}}/assets/js/plugins/custom-circle-progress.js"defer=""></script>
<script>
    CKEDITOR.replace('editor', {
        removePlugins: 'uploadimage,image2',
        extraPlugins: 'image',
        toolbar: [
            { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt' ] },
            { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
            '/',
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            { name: 'about', items: [ 'About' ] }
        ]
    });
</script>
@include('vendor.sweet.alert')
@yield('scripts')
