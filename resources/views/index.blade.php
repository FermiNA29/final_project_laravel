@extends('layout/master')

@section('heading')
Questions List
@endsection

@section('container')
<div class="col-md-12">
  <!-- irvan -->
  <a href="pertanyaans/create" class="btn btn-primary">Tambah Pertanyaan</a>
  <!-- end irvan -->
  <div class="card">
    <div class="card-header p-2 mx-auto">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Top Questions</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Votes</a></li>
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Unanswered</a></li>
      </ul>

      {{-- Fermi edit --}}
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
                <a href="#">{{$pertanyaan->users->name}}</a>

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
              <a href="#" class="link-black text-sm mr-2"><i class="far fa-thumbs-up mr-1"></i> Like</a>

              <span class="float-right">
                <a href="/jawabans/{{$pertanyaan->id}}" class="link-black text-sm">
                  <i class="far fa-comments mr-1"></i> Comments
                </a>
              </span>
            </p>

            {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
          </div>
          @endforeach
          <!-- /.post -->
          {{-- fermi edit --}}
        </div>

        <!-- <div class="row mx-auto">
          @foreach ($pertanyaans as $pertanyaan)
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
                <p class="card-text">{{$pertanyaan->judul}}</p>
                <p class="card-text">{{$pertanyaan->isi}}</p>
                <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
              </div>
            </div>
          </div>
          @endforeach
        </div> -->
      </div>
    </div>
    @endsection