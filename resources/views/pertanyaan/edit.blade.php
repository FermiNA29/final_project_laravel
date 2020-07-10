@extends('layout.master')

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
                <input type="text" class="form-control" name="isi" value="{{$pertanyaan->isi}}" placeholder="Enter Question" id="isi">
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