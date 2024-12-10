<div class="mb-icon-nav js-mobile-panel bars-display">
    <i class="fa fa-bars" aria-hidden="true"></i>
</div>
<nav class="navbar-menu">

    <div class="navbar-menu-container">
        <a class="top-logo" href="{{ route('get.home') }}" title="">
            <!-- logo test -->
            <img src="{{ url('../images/logo.png') }}" alt="">
            <!-- logo testt -->
        </a>
        <ul id="menu-main-menu" class="container-menu level-1">
            <li class="navbar_item {{ \Request::route()->getName() == 'get.home' ? 'active' : '' }}"><a
                    href="{{ route('get.home') }}">Trang chủ</a></li>
            @foreach($categoriesGlobal ?? [] as $item)
            <li class="navbar_item {{ \Request::path() == 'chuyen-muc-'. $item->slug.'-'. $item->id ? 'active' : '' }}">
                <a href="{{ route('get.category.item',['slug' => $item->slug,'id' => $item->id]) }}"
                    title="{{ $item->ten }}">{{ $item->ten }} </a>
            </li>
            @endforeach
            <!-- <li class="navbar_item {{ \Request::route()->getName() == 'get.blog.index' ? 'active' : '' }}">
                <a href="{{ route('get.blog.index') }}" title="Bài viết">Bài viết</a>
            </li> -->
            <li class="navbar_item {{ \Request::route()->getName() == 'get_user.recharge.index' ? 'active' : '' }}">
                <a href="{{ route('get_user.recharge.index') }}" title="Nạp tiền">Nạp tiền</a>
            </li>
            <li class="navbar_item {{ \Request::route()->getName() == 'get.service.price' ? 'active' : '' }}"><a
                    href="{{ route('get.service.price') }}">Bảng giá</a></li>
        </ul>
        <div class="header-default {{ $container ? $container : '' }} container-header">
            <div class="header-area">
                <div class="user-welcome js-reload-html-header">

                    <a rel="nofollow" class="btn btn-green" href="{{ route('get.login') }}">Đăng nhập</a>
                    <a rel="nofollow" class="btn btn-green" href="{{ route('get.register') }}"> Đăng ký</a>

                </div>

            </div>
        </div>
    </div>
</nav>
