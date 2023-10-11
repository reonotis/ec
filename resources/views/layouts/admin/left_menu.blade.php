<?php
$routeNum = 0;
$routeName = Route::currentRouteName();
switch($routeName){
    case 'admin.home':
        $routeNum = 1;
        break;
    case str_starts_with($routeName, 'admin.owner'):
        $routeNum = 2;
        break;
    case '':
        break;
}

?>

<ul class="side-menu-ul" >
    <li><a href="{{ route('admin.home') }}" class="sidebar-title <?= ($routeNum === 1) ? "active": ""; ?>" >ホーム</a></li>
    <li><a href="{{ route('admin.owner.index') }}" class="sidebar-title <?= ($routeNum === 2) ? "active": ""; ?>"  >オーナー</a></li>
    <li><a href="{{ route('admin.home') }}" class="sidebar-title " >ショップ</a></li>
    <li><a href="{{ route('admin.home') }}" class="sidebar-title " >ユーザー</a></li>
</ul>
