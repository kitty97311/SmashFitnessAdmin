@extends('admin.layout')
@section('title')
    {{__("message.about")}}
@endsection
@section('content')


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.about")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">{{__("message.about")}}</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/74u7az9elygjpc52ze8x1qtzq8f35o47i8sfy2u0s3rk420r/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('tinymce/tinymce.min.js')}}"></script>

@if (empty($editor->about_us)) 
    <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{__("message.about")}}</strong>
                    </div>

                    <div class="card-body">
                   
                         <form id="form"action="{{route('about_add')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                                <input type="hidden" class="form-control" name="id" value="{{ Session::get('admin')->id }}" >
                                <input type="hidden" class="form-control" name="email" value="{{ Session::get('admin')->email }}" >
                                  
                                 <div class="form-group">
                                    <label>Descriuption</label>
                                     <textarea cols="80" rows="10" id="myTextarea" name="description" >
                                          
                                     </textarea>
                                     
                                 </div>
                                 <div class="form-group">
                                    <input type="submit" value="Submit"/>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
   <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{__("message.terms")}}</strong>
                    </div>

                    <div class="card-body">
                   
                         <form id="replaceLineBreaks" action="{{route('about_edit')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                                <input type="hidden" class="form-control" name="id" value="{{ $editor->id }}" >
                                 <input type="hidden" class="form-control" name="email" value="{{ Session::get('admin')->email }}" >
                                  
                                 <div class="form-group">
                                    <label>Descriuption</label>
                                     <textarea cols="80" rows="10" id="myTextarea" name="description" value="{{$editor->description}}">
                                        <span style=\"font-size: 20px;\"></span>
                                            <span style=\"color: rgb(255, 140, 0);\">     {{$editor->about_us}}</span>
                                     </textarea>
                                     
                                 </div>
                                 <div class="form-group">
                                    <input type="submit" value="Submit"/>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script type="text/javascript">
    tinymce.init({
        selector: '#myTextarea',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [
          { title: 'My page 1', value: 'https://www.codexworld.com' },
          { title: 'My page 2', value: 'http://www.codexqa.com' }
        ],
        image_list: [
          { title: 'My page 1', value: 'https://www.codexworld.com' },
          { title: 'My page 2', value: 'http://www.codexqa.com' }
        ],
        image_class_list: [
          { title: 'None', value: '' },
          { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
          /* Provide file and text for the link dialog */
          if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
          }
      
          /* Provide image and alt text for the image dialog */
          if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
          }
      
          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
          }
        },
        templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
          { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
          { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });

</script>
@endsection