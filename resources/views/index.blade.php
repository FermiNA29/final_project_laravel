@extends('layout/master')

@section('nav')
<a href= "/login" class="btn btn-primary ml-auto d-inline">Login</a>
<a href="/register" class="btn btn-primary d-inline ml-3">Sign Up</a>
@endsection
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
      <div class="row mx-auto">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Judul Pertanyaan</p>
              <p class="card-text">Isi Pertanyaan ?</p>
              <a href="/questions" class="btn btn-warning text-white">Lihat Pertanyaan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
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