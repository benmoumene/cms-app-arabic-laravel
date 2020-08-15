@extends('admin.layout')
@section('style')
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/icon.css')}}" rel="stylesheet">
        <link id="css" rel="stylesheet">
        <link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">

@endsection
@section('content')
<div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="">إدارة الاعضاء</a></li>
                        <li class="bring_right"><a href="">إضافة عضو جديد</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة عضو جديد</h1>


                    <!--Start status alert-->
                    @include('flash-message')
                    <!--/End status alert-->


                    <div class="form">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.storeUser')}}" method="post" >
                        @csrf
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">اسم العضو</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="input0" placeholder="اسم العضو">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="input2" placeholder="البريد الالكتروني">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="input3" placeholder="كلمة المرور">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">الصورة الشخصية</label>
                                <div class="col-sm-10">
                                    <input type="file" name="picture" class="form-control" style="height: unset;" id="input4">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-danger">إضافة العضو</button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/adminy.js')}}"></script>

@endsection