@extends('admin.layout')
@section('style')
<meta name="_token" content="{{csrf_token()}}" />
@endsection
@section('content')
<div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="">الاعلانات </a></li>
                        <li class="bring_right"><a href="">عرض كل الاعلانات</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <h1 class="heading_title">عرض كل الاعلانات</h1>

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td>صورة الاعلان</td>
                                <td>عنوان الاعلان </td>
                                <td>وصف الاعلان</td>
                                <td>رابط الاعلان</td>
                                <td>موضع الاعلان</td>
                                <td>التحكم</td>
                            </tr>
                            @foreach($ads as $ad)
                            <tr id="ad-{{$ad->id}}">
                                <td>{{$ad->id}}</td>
                                <td><img src="{{asset('images\ads\\'.$ad->image)}}" class="img-rounded ad_thumb" height="100px"></td>
                                <td>{{$ad->title}}</td>
                                <td>{{$ad->desc}}</td>
                                <td>{{$ad->links}}</td>
                                <td>{{$ad->position}}</td>
                                <td>
                                <form>
                                    <button class="btn btn-danger delete"  data-id="{{$ad->id}}"data-toggle="tooltip" data-placement="top" title="حذف" style="text-align:center"><i class="glyphicon glyphicon-remove"></i></button>
                               </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                
                            </tr>
                        </table>

                        <nav class="text-center">
                            {{$ads->links()}}
                        </nav>
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
                  url: "/adminPanel/ads/delete/"+id,
                  type: 'DELETE',
                  dataType: "JSON",
                  data: {
                      "id": id,
                      "_token": token,
                  },
                  success: function (response)
                  {
                  $('#ad-'+id).hide();
                  }
              });
              console.log("It failed");
          });

</script>

    

@endsection
