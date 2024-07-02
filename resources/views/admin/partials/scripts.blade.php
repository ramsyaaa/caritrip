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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script>
    CKEDITOR.on("instanceReady", function(event) {
        event.editor.on("beforeCommandExec", function(event) {
            // Show the paste dialog for the paste buttons and right-click paste
            if (event.data.name == "paste") {
                event.editor._.forcePasteDialog = true;
            }
            // Don't show the paste dialog for Ctrl+Shift+V
            if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
                event.cancel();
            }
        })
    });
    CKEDITOR.replace('editor');
    CKEDITOR.replace('itenary_list');
    CKEDITOR.replace('include_list');
    CKEDITOR.replace('exclude_list');
    CKEDITOR.replace('boat_safety_equipment');
    CKEDITOR.replace('boat_facility');
</script>
@include('vendor.sweet.alert')
@yield('scripts')
