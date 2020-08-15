@extends('admin.layout')
@section('style')
<meta name="_token" content="{{csrf_token()}}" />
<link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">
@endsection
@section('content')
<div class="main_container col-md-9 col-md-8 col-sm-12 col-xs- " style="margin-left:20px;" >
                <div class="row main_container_head" style="margin-top:20px;margin-right:-60px;" >
                    <h4><span class="glyphicon glyphicon-folder-open"></span> إضافة قسم جديد</h4>
                </div>

                <div class="row control_panal_body"  style="margin-right:-80px;">
                    <!--Start Admin Panal Section Description-->
                    <p class="page_desc"  style="margin-right:40px;">يمكنك إضافة قسم جديد الي موقعك من الحقول ادناه</p>
                    <!--End Admin Panal Section Description-->


                    <div class="alert alert-success h5"  style="display:none;"role="alert">تمت الاضافه بنجاح</div>
                    <div class="alert alert-danger h4" style="display:none;"  role="alert"><strong>خطأ!</strong> .. لم يتم الاضافه</div>


                    <div class="admin_index" style="margin-top:40px;">
                        <!--Start Site Main Options and Data-->
                        <div class="panel panel-default site_info">
                            <div class="panel-heading text-right h4">إضافة قسم جديد</div>

                            <form action="{{route('admin.category.store')}}" method="post" style="margin-right:20px;margin-bottom:20px;margin-left:10px;">
                                @csrf
                                <div class="form-group">
                                    <label for="sec_name">عنوان القسم</label>
                                    <input type="text" name="name" class="form-control" id="sec_name" placeholder="اسم القسم">
                                </div>
                                <div class="form-group">
                                    <label for="sec_desc">وصف القسم</label>
                                    <textarea rows="5" name="desc" class="form-control" id="sec_desc" placeholder="اوصف محتوي القسم فيما لا يتعدي ٧٠ حرف"></textarea>
                                </div>

                                

                                <button type="submit" class="btn btn-default">إضافة قسم</button>
                                <button type="reset" class="btn btn-default">مسح البيانات</button>
                            </form>



                        </div>
                        <!--End Site Main Options and Data-->
                    </div>
                </div>
            </div>
            <!--Start Admin Panal MAin Content Right Block-->

@endsection