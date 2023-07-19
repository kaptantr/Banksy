@if(Helper::GeneralWebmasterSettings("header_menu_id") >0)
    <?php
    // Get list of footer menu links by group Id
    $HeaderMenuLinks = Helper::MenuList(Helper::GeneralWebmasterSettings("header_menu_id"));
    ?>
    @if(count($HeaderMenuLinks)>0)

        <?php
        // Current Full URL
        $fullPagePath = Request::url();
        // Char Count of Backend folder Plus 1
        $envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
        // URL after Root Path EX: admin/home
        $urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
        ?>
        <?php
        $category_title_var = "title_" . @Helper::currentLanguage()->code;
        $category_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
        ?>

    @desktop
        @if($type == 4)
            <div class="row" style="width:50%;margin:0 auto;">
        @endif
        @if($type == 5)
            <div class="row" style="width:42%;margin:0 auto;">
        @endif
    @elsedesktop
        @if($type == 4)
            <div class="row" style="margin:0 auto;">
        @endif
        @if($type == 5)
            <div class="row" style="margin:0 auto;">
        @endif
    @enddesktop
            <?php $colCount = 0; ?>
            @foreach($HeaderMenuLinks as $HeaderMenuLink)
                <?php
                    if ($HeaderMenuLink->$category_title_var != "") {
                        $link_title = $HeaderMenuLink->$category_title_var;
                    } else {
                        $link_title = $HeaderMenuLink->$category_title_var2;
                    }
                ?>
                @if($HeaderMenuLink->type == $type)
                    @if($type == 4)
                        <div class="col-lg-4 item" style="padding: 5px">
                            <a href="{!! url($HeaderMenuLink->link) !!}" style="color: #fff !important;">{{ $link_title }}</a>
                        </div>
                    @endif

                    @if($type == 5)
                    @desktop
                        <?php $colCount++; ?>
                        <div class="col-lg-{{ $colCount>1 ? 4 : 6 }} item footer-bottom-menu2">
                    @elsedesktop
                        <div class="col-lg-6 item" style="padding: 5px">
                    @enddesktop
                            <a href="{!! url($HeaderMenuLink->link) !!}" style="color: #000 !important;">{{ $link_title }}</a>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
        <style>
            .alt-menu {
                height: 105px;
                background-color: #000;
            }
            .alt-menu .item
            {
                text-align: center;
            }
            .alt-menu .item a
            {
                font-family : Autobahn;
                font-size : 24px !important;
                color : #fff !important;
            }
            .footer-bottom-menu2:first-child {
                text-align: right;
                padding-right: 35px;
                border-right: 5px solid #000;
            }
        </style>
    @endif
@endif
