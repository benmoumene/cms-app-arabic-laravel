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
                        <li class="bring_right"><a href="">الاعلانات</a></li>
                        <li class="bring_right"><a href="">إضافة اعلان جديد</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة اعلان جديد</h1>


                    <!--Start status alert-->
                    @include('flash-message')
                    <!--/End status alert-->


                    <div class="form">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.advertisment.store')}}" method="post" >
                                    @csrf
                                <div class="form-group">
                                    <label for="ad_title">عنوان الاعلان</label>
                                    <input type="text" name="title" class="form-control" id="ad_title" placeholder="اسم او عنوان الاعلان">
                                </div>
                                <div class="form-group">
                                    <label for="ad_desc">وصف الاعلان</label>
                                    <input type="text" name="desc" class="form-control" id="ad_desc" placeholder="وصف الاعلان ">
                                </div>
                                <div class="form-group">
                                    <label for="ad_img">صوره الاعلان</label>
                                    <input type="file"  name="image"  id="ad_img">
                                </div>
                                <div class="form-group">
                                    <label for="ad_link">الرابط</label>
                                    <input type="link" name="links" class="form-control" id="ad_link" placeholder="EX : http://www.google.com">
                                </div>

                                <div class="form-group">
                                    <label>الموضع</label>
                                    <select class="form-control" name="position">
                            <?php  $position = ['اعلى الموقع','يمين','يسار','اسفل القائمة','اسفل الموقع'];
                            for($i=0;$i<4;$i++){?>
                            <option value="{{$position[$i]}}"  >{{$position[$i]}}</option>
                            <?php }?>
                                    </select> 
                                </div>
                                <br>
                                <br>

                                <button type="submit" class="btn btn-default">إضافة الاعلان</button>
                                <button type="reset" class="btn btn-default">مسح البيانات</button>
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