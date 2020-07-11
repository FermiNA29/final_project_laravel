@extends('layout.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('heading')
Comment
@endsection

@section('container')
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
              <span class="username">
                <a href="#">{{$pertanyaan->users->name}}</a>
              </span>
              <span class="description">{{$pertanyaan->created_at}}</span>
              <p><i class="far fa-newspaper mr-2"></i>{{$pertanyaan->judul}}</p>
            </div>
            <!-- /.user-block -->
            <p>
              {!!$pertanyaan->isi!!}
            </p>

            <p>
              <a href="/pertanyaans/{{$pertanyaan->id}}" class="link-black text-sm mr-2"><i class="fas fa-book-open mr-1"></i> Detail</a>
              <a href="/pertanyaans/{{$pertanyaan->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
              <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
              <a href="#" class="link-black text-sm mr-2"><i class="far fa-thumbs-up mr-1"></i> Like</a>

            </p>
            <form action="/jawabans" method="post">
              @csrf
              <input type="hidden" name="users_id" value=" {{ Auth::user()->id }}">
              <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
              <input class="form-control form-control-sm" type="text" name="isi" placeholder="Type a comment">
              <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!}</textarea>
              <button type="submit" class="btn btn-success mt-2">Comment</button>
            </form>
          </div> <!-- /.post -->

          <!-- Post Coment -->
          @foreach ($jawabans as $jawaban)
          <div class="post clearfix">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
              <span class="username">
                <a href="#">{{$jawaban->users->name}}</a>
              </span>
              <span class="description">{{$jawaban->created_at}}</span>
                @if(!empty(Auth::user()->id) && (Auth::user()->id == $jawaban->users_id) )
                <form action="/jawabans/{{$pertanyaan->id}}" method="POST">
                  @csrf
                  @method("delete")
                  <button type="submit" class="btn btn-danger float-right">Delete</button>
                  </p>
                  @endif
              
            </div>
            <!-- /.user-block -->
            <p>
              {!!$jawaban['isi']!!}
            </p>


            @if(!empty(Auth::user()->id) && (Auth::user()->id == $jawaban->users_id) )
            <a href="/jawabans/{{$jawaban->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>

            @endif

          </div>
          @endforeach
          <!-- /.post Coment-->

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <div class="timeline timeline-inverse">
          </div>
        </div>
        <!-- /.tab-pane -->


        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
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