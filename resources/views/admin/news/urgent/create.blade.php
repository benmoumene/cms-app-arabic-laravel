@extends('admin.layout')
@section('style')
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/icon.css')}}" rel="stylesheet">
        <link id="css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="{{asset('editor.css')}}" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/froala_editor.css')}}">
  <link rel="stylesheet" href="{{asset('css/froala_style.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/code_view.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/colors.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/emoticons.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/image_manager.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/image.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/line_breaker.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/table.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/char_counter.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/video.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugins/fullscreen.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    


    <link href="{{asset('css/ar.css')}}" rel="stylesheet" class="lang_css arabic">
    <style>
    
#sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}
</style>


@endsection
@section('content')
<div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="">الاخبار</a></li>
                        <li class="bring_right"><a href=""> خبر عاجل</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">إضافة خبر عاجل</h1>


                    <!--Start status alert-->
                    @include('flash-message')
                    <!--/End status alert-->


                    <div class="form">
                        <form class="form-horizontal" enctype="multipart/form-data" @if(isset($new))  action="{{route('admin.news_urgent.update',$new->id)}}" @else action="{{route('admin.news_urgent.store')}}"@endif method="post" >
                                    @csrf      
                                    @if(isset($new))
                                    @method('GET')
                                    @endif              
                      
                                <div class="form-group">
                                    <label for="ad_title">عنوان اشاري</label>
                                    <input type="text" name="reference_address" @if(isset($new)) value="{{$new->reference_address}}" @endif class="form-control" id="ad_title" placeholder="اسم او عنوان الاعلان">
                                </div>
                               
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">الكاتب</label>
                                    <select class="form-control" name="new_writer"  id="new_writer">
                                        @foreach($users as $user)
                                        <option  value="{{ $user->name }}" @if((isset($new))&&( $new->new_writer=='$user->name'))selected @endif > {{ $user->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                <label for="exampleFormControlSelect1">التصنيفات</label>
                                    <select class="form-control" name="category_id"  id="category_id">
                                        @foreach($categories as $category)
                                        <option  value="{{ $category->id }}" @if((isset($new))&&($new->category_id=='$category->id'))selected @endif > {{ $category->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                

                               
                                <br>
                                <br>
                                
                                <input type="submit"  class="btn btn-success" name="publish"  @if(isset($new)) value="تعديل الخبر" @else value="نشر الخبر" @endif>                                
                               
                                <button type="reset" class="btn btn-danger">مسح البيانات</button>
                            </form>


                            
                                
                    </div>
                </div>
            </div>





@endsection
@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/adminy.js')}}"></script>
        <script type="text/javascript">
	$('#input-tags').tagsInput();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('js/froala_editor.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/align.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/code_beautifier.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/code_view.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/colors.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/draggable.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/emoticons.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/font_size.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/font_family.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/image.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/image_manager.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/line_breaker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/link.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/lists.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/paragraph_format.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/paragraph_style.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/video.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/table.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/url.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/entities.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/char_counter.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/inline_style.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/save.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/fullscreen.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/plugins/print.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/languages/ro.js')}}"></script>

  <script>
      new FroalaEditor("#edit", {
        direction: 'rtl'
      });
  </script>

		
@endsection