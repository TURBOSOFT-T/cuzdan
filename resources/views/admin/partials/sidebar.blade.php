<style>
    .app-sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding-top: 70px;
        width: 230px;
        overflow: auto;
        z-index: 10;
        background-color: #a31a72;
        -webkit-box-shadow: 0px 8px 17px rgba(197, 29, 29, 0.2);
        box-shadow: 0px 8px 17px rgba(145, 34, 34, 0.2);
        -webkit-transition: left 0.3s ease, width 0.3s ease;
        -o-transition: left 0.3s ease, width 0.3s ease;
        transition: left 0.3s ease, width 0.3s ease;
    }
</style>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <title>Font Awesome Icons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p><img src="/assets/images/{{ Auth::user()->image_path }}" class="rounded-circle img-fluid"
                    style="width: 60px;" alt="Avatar"></p>
            <p class="app-sidebar__user-name"> {{ Auth::user()->last_name }}</p>

        </div>


    </div>

    <ul class="app-menu">


       <li>
            <a class="app-menu__item" href="{{ route('WalletSellers.index') }}"><i class="fa fa-archive" style="font-size:26px"></i>
              &nbsp;&nbsp;  <span class="app-menu__label">Cüzdan Satıcıları</span>
            </a>
        </li>

        <li>
            <a class="treeview-item" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-users"></i> All
                Users</a>
        </li>
       {{--  <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('users.index') }}"><i class="icon fa fa-circle-o"></i> All
                        Users</a>
                </li>
                <li>
                    <a class="treeview-item" href="#" target="_blank" rel="noopener noreferrer"><i
                            class="icon fa fa-circle-o"></i> Roles</a>
                </li>
                <li>
                    <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Permissions</a>
                </li>
            </ul>
        </li> --}}
        <li>
            <a class="app-menu__item" href="{{ route('walletOrderLists.index') }}">&nbsp; <i class="fa fa-shopping-cart" style="font-size:26px"></i>&nbsp;&nbsp;
                <span class="app-menu__label">Cüzdan Satıcıları Para Transfer İşlemleri</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('walletSellerMoneyTransferLists.index') }}"><i class="fa fa-archive" style="font-size:26px"></i>
               &nbsp;&nbsp; <span class="app-menu__label">Cüzdan  Maliyet Tablosu</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="#"><i style='font-size:26px' class='fas'>&#xf500;</i>
                <span class="app-menu__label">Cüzdan Satıcıları</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-footer .d-block">
        &nbsp;
        &nbsp;
        <a href="/cuzdan/arayuz/production/dashboard.php?page_content=cuzdan_ayarlar" data-toggle="tooltip"
            data-placement="top" title="" data-original-title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;&nbsp;&nbsp;

        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;&nbsp;&nbsp;
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;&nbsp;&nbsp;
        <a id="logout-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <style>
        .sidebar-footer {

            bottom: 0px;
            clear: both;
            display: block;
            padding: 5px 0 0 0;
            position: fixed;
            width: 230px;
            background: #d7d1d1;
        }
    </style>

</aside>


<!-- /menu footer buttons -->
