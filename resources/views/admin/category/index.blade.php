@extends('admin.layout')
@section('style')
<meta name="_token" content="{{csrf_token()}}" />
<link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">
@endsection
@section('content')
<div class="main_container col-md-9 col-md-8 col-sm-12 col-xs- " style="margin-left:20px;" >
                <div class="row main_container_head" style="margin-top:20px;margin-right:-60px;" >
                    <h4 ><span class="glyphicon glyphicon-folder-open"></span>اقسام الموقع </h4>
                </div>

                <div class="row control_panal_body" style="margin-right:-80px;">
                    <!--Start Admin Panal Section Description-->
                    <p class="page_desc"  style="margin-right:40px;" >يمكنك عرض اقسام موقعك والتحكم فيهم من الحقول ادناه</p>
                    <!--End Admin Panal Section Description-->


                    <div id="success-message" class="alert alert-success h5" style="display:none" role="alert"></div>
                    <div id="error-message"  class="alert alert-danger h4"  style="display:none" role="alert" ></div>


                    <div class="admin_index" style="margin-top:40px;">
                        <!--Start Site Main Options and Data-->
                        <div class="panel panel-default view_users" >
                        <div class="panel-heading text-right h4">عرض كل الاقسام</div>
                            <table class="table" >
                                <tr class="h4 text-center">
                                    <td class="">#</td>
                                    <td class="">عنوان القسم</td>
                                    <td class="">الوصف</td>
                                    <td class="">عدد المواضيع</td>
                                    <td class="text-center">التحكم</td>
                                </tr>
                                @foreach($categories as $category)
                                <tr class="text-center" id="category-{{$category->id}}">
                                    <td class="english">{{ $category->id}}</td>
                                    <td> {{ $category->name}} </td>
                                    <td>{{ $category->desc}}</td>
                                    <td class="english">{{ $category->news->count()}}</td>
                                    <td class="text-center">
                                    <form>
                                        <a href="" title="edit" class="glyphicon glyphicon-pencil"></a>
                                        <button type="submit"class="btn btn-danger delete" data-id="{{$category->id}}" title="delete" ><i class="glyphicon glyphicon-remove"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </table>


                            <nav class="english text-center ltr">
                                {{$categories->links()}}
                            </nav>

                        </div>
                        <!--End Site Main Options and Data-->
                    </div>
                </div>
            </div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(".delete").click(function(e){
            e.preventDefault();
              var id = $(this).data("id");
              var token = $("meta[name='_token']").attr("content");
                        

              $.ajax(
              {
                  url: "/adminPanel/category/delete/"+id,
                  type: 'DELETE',
                  dataType: "JSON",
                  data: {
                      "id": id,
                      "_token": token,
                  },
                  success: function (response)
                  {
                  $('#category-'+id).hide();
                  $('#success-message').fadeIn().html('تمت الازالة بنجاح');
                 setTimeout(() => {
                    $('#success-message').fadeOut('slow');

                 },3,200);
                  }
                  error: function(data){
                    $('#error-message').fadeIn().html('لم تتم الازالة');
                 setTimeout(() => {
                    $('#error-message').fadeOut('slow');

                  }
              });
                    });

</script>


@endsection