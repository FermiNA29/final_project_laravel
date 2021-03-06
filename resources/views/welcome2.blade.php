@extends('layout/master2')

@section('container')
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2 mx-auto">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Top Questions</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Votes</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Unanswered</a></li>
        </ul>
      </div>

        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection