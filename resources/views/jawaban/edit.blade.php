@extends('layout.master')

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
                <input type="text" class="form-control" name="isi" value="{{$jawaban->isi}}" placeholder="Enter Question" id="isi">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
  </div>
@endsection