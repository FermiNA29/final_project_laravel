@extends('layout.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('heading')
Edit Question
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <form action="/pertanyaans/{{$pertanyaan->id}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="judul">Title:</label>
                <input type="judul" class="form-control" name="judul" value="{{$pertanyaan->judul}}" placeholder="Enter judul" id="judul">
            </div>
            <div class="form-group">
                <label for="isi">Question:</label>
                <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!}{{$pertanyaan->isi}}</textarea>
            </div>
            <div class="form-group">
                <label for="isi">Tags:</label>
                <input type="text" class="form-control" name="tags" value="{{$pertanyaan->tags}}" placeholder="Enter Tags" id="tags">
            </div>
            <div class="form-group" hidden>
                <label for="isi">User id:</label>
                <input type="text" class="form-control" name="users_id" value="{{$pertanyaan->users_id}}" placeholder="Enter u id" id="users_id">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush