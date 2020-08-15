@extends('admin.layout')
@section('style')
<meta name="_token" content="{{csrf_token()}}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
@section('content')
<div class="main_container col-md-9 col-md-8 col-sm-12 col-xs- "  style="margin-left:20px;">
<div class="row main_container_head" style="margin-top:20px;margin-right:-60px;" >
                    <h4 ><span class="glyphicon glyphicon-folder-open"></span>عرض الاخبار </h4>
                </div>
                <div class="row control_panal_body">
                    <!--Start Admin Panal Section Description-->
                    <form action= "{{ route('search') }}" method="GET" dir="rtl" style="margin-right:-2000px;" >
    <div class="row">
           
        <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
            <div class="job-field">
            <input class="form-control" name="reference_address" id="myInput" type="text" placeholder="بحث عن الخبر .."   dir="rtl">
            </div>

       <!-- <div class="job-field">
                <select name="category_id">

                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                     @endforeach
                </select>
            </div>
            -->
            
        </div>
       
    </div>
</form>

                    <div id="success-message" class="alert alert-success h5" style="display:none" role="alert"></div>
                    <div id="error-message"  class="alert alert-danger h4"  style="display:none" role="alert" ></div>


                    <div class="admin_index" style="margin-top:40px;">
                        <!--Start Site Main Options and Data-->
                        <div class="panel panel-default view_users" >
                        <div class="panel-heading text-right h4">عرض كل الاخبار</div>
                            <table class="table" id="myList" >
                                <tr class="h4 text-center">
                                    <td class="">#</td>
                                    <td class="">عنوان الخبر</td>
                                    <td class="">التعديلات</td>
                                    <td class="">القراءات </td>
                                    <td class="">التصنيف </td>
                                    <td class="">الاشراف </td>
                                    <td class="">التاريخ </td>
                                    <td class="text-center">التحكم</td>
                                </tr>
                                @foreach($news as $new)
                                <tr class="text-center" id="new-{{$new->id}}">
                                    <td class="english">{{ $new->id}}</td>
                                    <td> {{ $new->reference_address}} </td>
                                    <td>{{$new->updates_count}}</td>
                                    <td>0</td>
                                    <td class="english">{{ $new->category->name}}</td>
                                    <td class="english">{{ $new->new_writer}}</td>
                                    <td class="english">{{ $new->created_at}}</td>
                                    <td class="text-center">
                                    <form>
                                        <a href="{{route('admin.news.edit',$new->id)}}" class="btn btn-warning edit" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <button type="submit"class="btn btn-danger delete" data-id="{{$new->id}}" title="delete" ><i class="glyphicon glyphicon-remove"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </table>


                            <nav class="english text-center ltr">
                                {{$news->links()}}
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

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
<script>
$(".delete").click(function(e){
            e.preventDefault();
              var id = $(this).data("id");
              var token = $("meta[name='_token']").attr("content");
                        

              $.ajax(
              {
                  url: "/adminPanel/news/delete/"+id,
                  type: 'DELETE',
                  dataType: "JSON",
                  data: {
                      "id": id,
                      "_token": token,
                  },
                  success: function (response)
                  {
                  $('#new-'+id).hide();
                  }
              });
              console.log("It failed");
          });

</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList tr ").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    

@endsection
