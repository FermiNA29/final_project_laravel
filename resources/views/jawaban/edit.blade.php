@extends('layout.master')

@push('script-head')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('heading')
    Edit
@endsection

@section('container')
<div class="card">
    <div class="card-body">
    <form action="/jawabans/{{$jawaban->id}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="isi">Question:</label>
                <input type="hidden" name="pertanyaan_id" value="{{$jawaban->pertanyaan_id}}">
                {{-- <input type="text" class="form-control" name="isi" value="{{$jawaban->isi}}" placeholder="Enter Question" id="isi"> --}}
                <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!} {!!$jawaban->isi!!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
@endpush