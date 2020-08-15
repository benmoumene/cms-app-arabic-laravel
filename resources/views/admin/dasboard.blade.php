
@extends('admin.layout')
@section('content')
<div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                <div class="home_statics text-center">
                            <h1 class="heading_title">احصائيات عامة للموقع</h1>

                            <div style="background-color: #9b59b6">
                                <span class="bring_right glyphicon glyphicon-home"></span>

                                <h3>زيارات الموقع</h3>

                                <p class="h4">55</p>
                            </div>

                            <div style="background-color: #00adbc">
                                <span class="bring_right glyphicon glyphicon-user"></span>

                                <h3>عدد الاعضاء</h3>

                                <p class="h4">55</p>
                            </div>
                            
                        </div>

                    <div class="page_content">
                        
                        <div class="quick_links text-center">
                            <a href="#" style="background-color: #c0392b">
                                <h4>استعراض الموقع</h4>
                            </a>
                            <a href="{{route('admin.news_urgent.index')}}" style="background-color: #2980b9">
                                <h4> خبر عاجل</h4>
                            </a>
                            <a href="{{route('admin.news.create')}}" style="background-color: #8e44ad">
                                <h4>خبر جديد</h4>
                            </a>
                           
                            
                        </div>
                                            </div>
                </div>
                        </div>
            </div>
            <!--/End Main content container-->
@endsection