<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin zone</title>
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <link href="/css/jquery-ui.theme.min.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/metisMenu.css" rel="stylesheet" >
    <link href="/plugins/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="/css/admin.css" rel="stylesheet"/>

    <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/plugins/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript" ></script>
    <script src="/js/metisMenu.js" type="text/javascript"></script>
    <script src="/js/admin.js" type="text/javascript"></script>
    @yield('script')
</head>
<body>
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img  src="/images/logo.footer.png"  alt="" width="200">
        </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="user-nav nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-text">Group: <span>{!! Session::get('user')->getGroupName() !!}</span></p>
                </li>
                <li>
                    <p class="navbar-text">Name: <span> {!! Session::get('user')->getFullName() !!}</span></p>
                </li>
                <li>
                    <a href="/admin/logout" ><i class="fa fa-hand-o-right"></i><span>Logout</span></a>
                </li>
            </ul>
        </div>


     </div>
</div>
<div class="hf-wrapper">
    <div class="hf-sidebar">
        <div class="hf-menu-space">
            <div class="content">
                <ul class="hf-navigation metismenu" id="menu">
                    <li class="parent {!! \Request::is('admin')? 'active':null !!}">
                        <a href="/admin/" aria-expanded="false"><i class="fa fa-home" ></i> <span>Панель управления</span></a>
                    </li>

                    <li class="parent {!! \Request::is('admin/news','admin/news/*','admin/promo-types','admin/promo-types/*')? 'active':null !!}">
                        <a href="#" aria-expanded="false" ><span class="fa arrow"></span><i class="fa fa-newspaper-o" ></i> <span class="hf-nav-item">Новости</span></a>
                        <ul class="collapse hf-sub-nav" aria-expanded="false">
                            <li {!! \Request::is('admin/news','admin/news/*')? 'class=active':null !!}>
                                <a href="/admin/news" aria-expanded="false" ><span class="hf-nav-item">Обзор</span></a>
                            </li>
                            <li {!! \Request::is('admin/promo','admin/promo/*')? 'class=active':null !!}>
                                <a href="/admin/promo/create" aria-expanded="false" ><span class="hf-nav-item">Добавить новость</span></a>
                            </li>
                            <li {!! \Request::is('admin/news-categories','admin/news-categories/*')? 'class=active':null !!}>
                                <a href="/admin/news-categories" aria-expanded="false" ><span class="hf-nav-item">Категории</span></a>
                            </li>
                            <li {!! \Request::is('admin/news-tags','admin/news-tags/*')? 'class=active':null !!}>
                                <a href="/admin/news-tags" aria-expanded="false" ><span class="hf-nav-item">Мета теги</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="parent {!! \Request::is('admin/press','admin/press/*')? 'active':null !!}">
                        <a href="/admin/press" aria-expanded="false"><i class="fa fa-laptop" ></i> <span>Блоги</span></a>
                    </li>

                    <li class="parent {!! \Request::is('admin/gallery','admin/gallery/*')? 'active':null !!}">
                        <a href="/admin/gallery" aria-expanded="false"><i class="fa fa-bullhorn" ></i> <span>Реклама</span></a>
                    </li>
                    <li class="parent {!! \Request::is('admin/media','admin/media/*')? 'active':null !!}">
                        <a href="/admin/media" aria-expanded="false"><i class="fa fa-key" ></i> <span>Разрешения</span></a>
                    </li>
                    <li class="parent {!! \Request::is('admin/media','admin/media/*')? 'active':null !!}">
                        <a href="/admin/media" aria-expanded="false"><i class="fa fa-group" ></i> <span>Группы</span></a>
                    </li>
                    <li class="parent {!! \Request::is('admin/media','admin/media/*')? 'active':null !!}">
                        <a href="/admin/media" aria-expanded="false"><i class="fa fa-user" ></i> <span>Пользователи</span></a>
                    </li>
                </ul>
            </div>
         </div>
       <!--<div class="archer-bottom-logo">
            <img class="center-block" src="/images/archer.white.png"  alt="" >
        </div>-->
    </div>

    <div class="container-fluid" id="main-content">
        <div class="page-head">
            <h2>@yield('page-title')

                @if(!Request::is("admin"))
                <?php
                $currentPath  = Route::getCurrentRoute()->getPath();
                $currentPathArray = explode("/", $currentPath);
                if(count($currentPathArray) > 1)
                {
                    $currentPath = $currentPathArray[0] . "/" . $currentPathArray[1];
                }
                ?>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="/{{ $currentPath }}/create" class="btn btn-success pull-right add-btn"><i class="fa fa-plus"></i>Add New</a>
                    </div>
                    <div class="btn-group">
                        <a href="/{{ $currentPath }}/" class="btn btn-primary pull-right add-btn"><i class="fa fa-hand-o-right"></i>View All</a>
                    </div>
                </div>
                @endif
            </h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(null !== Session::get('form-message') && null!==Session::get('form-message-type'))
                        <div class="alert {!!  Session::get('form-message-type')!!}">
                            <p>{!! Session::get('form-message') !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>