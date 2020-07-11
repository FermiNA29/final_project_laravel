@extends('layout/master')

@section('heading')
Questions List
@endsection

@section('container')
<div class="container">

  <div class="col-md-12">
    <!-- irvan -->
    <a href="pertanyaans/create" class="btn btn-primary mb-3 mt-3">Tambah Pertanyaan</a>
    <!-- end irvan -->
    <div class="card">
      <div class="card-header p-2 mx-auto">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Top Questions</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Votes</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Unanswered</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            @foreach ($pertanyaans as $pertanyaan)
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                <span class="username">
                  <a href="#">{{$pertanyaan->users->name}} </a>

                  @if(!empty(Auth::user()->id) && (Auth::user()->id == $pertanyaan->users_id) )
                  <form action="/pertanyaans/{{$pertanyaan->id}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                  </form>
                  @else
                  @endif
                </span>
                <span class="description">{{$pertanyaan->created_at}}</span>
                <p><i class="far fa-newspaper mr-2"></i>{{$pertanyaan->judul}}</p>
              </div>
              <!-- /.user-block -->
              <p>
                {{$pertanyaan->isi}}

              </p>
              @if ($pertanyaan->tags != "")
              @foreach(explode(',', $pertanyaan->tags) as $tag)
              <button type="button" class="btn btn-outline-success btn-sm">{{$tag}}</button>
              @endforeach
              @endif
              <p>
                <a href="/pertanyaans/{{$pertanyaan->id}}" class="link-black text-sm mr-2"><i class="fas fa-book-open mr-1"></i> Detail</a>

                @if(!empty(Auth::user()->id) && (Auth::user()->id == $pertanyaan->users_id) )
                <a href="/pertanyaans/{{$pertanyaan->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>

                @else
                @endif
                <br>
                <a href="/upvote_pertanyaan" onclick="event.preventDefault();
                                                     document.getElementById('upvote_pertanyaan-form').submit();">
                  <form id="upvote_pertanyaan-form" action="/upvote_pertanyaan" method="POST">
                    @csrf
                    <input type="text" name="users_id" value="{{Auth::id()}}" id="users_id" hidden>
                    <input type="text" name="pertanyaans_id" value="{{$pertanyaan->id}}" id="pertanyaans_id" hidden>
                  </form>
                  <i class="fas fa-arrow-up "></i> Up-vote
                </a><br>

                <a href="/downvote_pertanyaan" onclick="event.preventDefault();
                                                     document.getElementById('downvote_pertanyaan-form').submit();">
                  <form id="downvote_pertanyaan-form" action="/downvote_pertanyaan" method="POST" hidden>
                    @csrf
                    <input type="text" name="users_id" value="{{Auth::id()}}" id="users_id">
                    <input type="text" name="pertanyaans_id" value="{{$pertanyaan->id}}" id="pertanyaans_id">
                  </form>
                  <i class="fas fa-arrow-down"></i> Down-vote
                </a>

                <span class="float-right">
                  <a href="/jawabans/{{$pertanyaan->id}}" class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Comments
                  </a>
                </span>
              </p>


            </div> @endforeach
            <!-- /.post -->
            {{-- fermi edit --}}
          </div>

          {{-- <div class="row mx-auto">
          @foreach ($pertanyaans as $pertanyaan)
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <p class="card-text">{{$pertanyaan->judul}}</p>
          <p class="card-text">{{$pertanyaan->isi}}</p>
          <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
        </div>

      </div>
      @endforeach
      <!-- /.post -->
      {{-- fermi edit --}}
    </div>


  </div>

</div>

</div>
@endsection