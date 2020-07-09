@extends('layout.master')

@section('heading')
    Create Question
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <form action="/pertanyaans" method="post">
            @csrf
            <div class="form-group">
                <label for="judul">Title:</label>
                <input type="judul" class="form-control" name="judul" placeholder="Enter judul" id="judul">
            </div>
            <div class="form-group">
                <label for="isi">Question:</label>
                <input type="text" class="form-control" name="isi" placeholder="Enter Question" id="isi">
            </div>
            <div class="form-group">
                <label for="users_id">users_id:</label>
                <input type="text" class="form-control" name="users_id" placeholder="Enter Question" id="users_id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
@endsection