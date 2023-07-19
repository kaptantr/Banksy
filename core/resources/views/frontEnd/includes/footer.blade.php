<?php
$footer_style = "";
if (Helper::GeneralSiteSettings("style_footer_bg") != "") {
    $bg_file = URL::to('uploads/settings/' . Helper::GeneralSiteSettings("style_footer_bg"));
    $bg_color = Helper::GeneralSiteSettings("style_color1");
    $footer_style = "style='background: $bg_color url($bg_file) repeat-x center top'";
}
if (Helper::GeneralSiteSettings("style_footer") != 1) {
    $footer_style = "style=padding:0";
}
?>

<div class="alt-menu navbar navbar-default" style="margin-bottom:0">
@desktop
    <div class="container" style="margin: 35px auto;">
@elsedesktop
    <div class="container" style="margin: 0px auto;">
@enddesktop
        @include('frontEnd.includes.menu-bottom', ['type' => 4])
    </div>
</div>

<div class="alt-menu navbar navbar-default" style="margin-bottom:0;background-color: transparent;">
@desktop
    <div class="container" style="margin: 35px auto;">
@elsedesktop
    <div class="container" style="margin: 15px auto;">
@enddesktop
        @include('frontEnd.includes.menu-bottom', ['type' => 5])
    </div>
</div>
