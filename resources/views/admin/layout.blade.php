<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">
    @yield('style')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <!--Start header-->
    <div class="row header_section">
        <div class="col-sm-3 col-xs-12 logo_area bring_right">
            <h1 class="inline-block"><img src="img/logo.png" alt="">لوحة تحكم</h1>
            <span class="glyphicon glyphicon-align-justify bring_left open_close_menu" data-toggle="tooltip"
                  data-placement="right" title="Tooltip on left"></span>
        </div>
        <div class="col-sm-3 col-xs-12 head_buttons_area bring_right hidden-xs">
            
            <div class="inline-block full_screen bring_right hidden-xs">
                <span class="glyphicon glyphicon-fullscreen" data-toggle="tooltip" data-placement="left"
                      title="شاشة كاملة"></span>
            </div>
        </div>
        @if(Auth::check())
        <div class=" col-sm-4 col-xs-12 user_header_area bring_left left_text">

            <div class="user_info inline-block">
                <img src="{{asset('images\users\\'.Auth::user()->picture)}}" alt="" class="img-circle">
                <span class="h4 nomargin user_name">{{Auth::user()->name}}</span>
                <span class="glyphicon glyphicon-cog"></span>
            </div>
        </div>
        @endif

    </div>
    <!--/End header-->

    <!--Start body container section-->
    <div class="row container_section">

        <!--Start left sidebar-->
        @if(Auth::check())
        <div class="user_details close_user_details  bring_left">
            <div class="user_area">
            
                <img class="img-thumbnail img-rounded bring_right" src="{{asset('images\users\\'.Auth::user()->picture)}}">

                <h1 class="h3">{{Auth::user()->name}}</h1>


                <p><a href="">تغيير كلمة المرور</a></p>

                <p><a href="{{route('logout')}}">تسجيل الخروج</a></p>
            </div>
            </div>
        <!--/End left sidebar-->

        <!--Start Side bar main menu-->
        <div class="main_sidebar bring_right">
            <div class="main_sidebar_wrapper">
                <form class="form-inline search_box text-center">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="كلمة البحث">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </form>

                <ul>
                    <li><span class="glyphicon glyphicon-home"></span><a href="#">الصفحة الرئيسية</a></li>
                    @if(Auth::user()->type=='admin')
                    <li><span class="glyphicon glyphicon-user"></span><a href="">إدارة الاعضاء</a>
                        <ul class="drop_main_menu">
                            <li><a href="{{route('admin.addUser')}}">إضافة جديد</a></li>
                            <li><a href="{{route('admin.allUser')}}">عرض الكل</a></li>
                        </ul>
                    </li>
                    @endif
                    <li><span class="glyphicon glyphicon-edit"></span><a href="">الاخبار</a>
                        <ul class="drop_main_menu">
                            <li><a href="{{route('admin.news.create')}}">إضافة جديد</a></li>
                            <li><a href="{{route('admin.news.index')}}">عرض الكل</a></li>
                        </ul>
                    </li>
                    <li><span class="glyphicon glyphicon-th-large"></span><a href="">تصنيفات</a>
                    <ul class="drop_main_menu">
                            <li><a href="{{route('admin.category.create')}}">إضافة جديد</a></li>
                            <li><a href="{{route('admin.category.index')}}">عرض الكل</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->type=='admin')

                    <li><span class="glyphicon glyphicon-bullhorn"></span><a href="">الاعلانات</a>
                        <ul class="drop_main_menu">
                            <li><a href="{{route('admin.advertisment.create')}}">إضافة جديد</a></li>
                            <li><a href="{{route('admin.advertisment.index')}}">عرض الكل</a></li>
                        </ul>
                    </li>
                    @endif
                   
                    <li><span class="glyphicon glyphicon-save"></span><a href="{{route('admin.draft.index')}}"> المسودة</a></li>

                </ul>
            </div>
        </div>
        @endif

        <!--/End side bar main menu-->

        <!--Start Main content container-->
        <div class="main_content_container">
            
@Yield('content')
        </div>
        <!--/End body container section-->
    </div>
</div>
@Yield('script')
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>

</html>