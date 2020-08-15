@extends('admin.layout')
@section('style')
<link id="css" href="{{asset('css/light_style.css')}}" rel="stylesheet">
<link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">
@endsection
@section('content')
<div class="main_container  main_menu_open" style="margin-right:-20px;margin-top:70px;">

        <!--Start Login Form--> 
        <div class="login_area">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title">تسجيل الدخول الي لوحة التحكم</h4>
                    </div>
                    <div id="test" class="modal-body notvis">
                       <span > ادخل البريد الالكتروني وكلمة المرور </span>
                        
                        <form method="POST" action="{{ route('login') }}" >
                        @csrf
                            <div class="input-group input-group-lg"style="margin-top:20px;direction: ltr">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon glyphicon glyphicon-user" id="username"></span>
                            </div>
                            <div class="input-group input-group-lg" style="direction: ltr" >
                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span class="input-group-addon glyphicon glyphicon-lock" id="password"></span>
                            </div>
                       
                        <div class="checkbox" style="margin-right:20px;" style="direction:rtl;float:right">
                            <label>
                            <input class="form-check-input" type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>   حفظ بيانات الدخول 
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">تسجيل دخول</button>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="float:left" >
                                        {{ __('نسيت كلمة المرور؟') }}
                                    </a>
                                @endif

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End Login From-->
        
        <!--Please Remove this <a> tag-->
        <!--Please Remove this <a> tag-->
</div>
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>


        <!--Start Login Area Show Animation-->
        <script type="text/javascript">
            $(document).ready(function () {
                $(".login_area").show(1000);
            });
        </script>
        <!--End Login Area Show Animation-->
        
@endsection

