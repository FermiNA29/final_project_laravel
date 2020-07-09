@extends('layout.master')

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
                  <a href="#">Jonathan Burke Jr.</a> 
                </span>
                <span class="description">{{$pertanyaan->created_at}}</span>
                <p><i class="far fa-newspaper mr-2"></i>{{$pertanyaan->judul}}</p>
              </div>
              <!-- /.user-block -->
              <p>
                {{$pertanyaan->isi}}
              </p>

              <p>
                <a href="/pertanyaans/{{$pertanyaan->id}}" class="link-black text-sm mr-2"><i class="fas fa-book-open mr-1"></i> Detail</a>
                <a href="/pertanyaans/{{$pertanyaan->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                <a href="#" class="link-black text-sm mr-2"><i class="far fa-thumbs-up mr-1"></i> Like</a>

              </p>
                <form action="/jawabans" method="post">
                    @csrf
                    <input type="hidden" name="users_id" value="{{$pertanyaan->users_id}}">
                    <input type="hidden" name="pertanyaan_id" value="{{$pertanyaan->id}}">
                    <input class="form-control form-control-sm" type="text" name="isi" placeholder="Type a comment">
                    <button type="submit" class="btn btn-success mt-2">Comment</button>
                </form>
              
            </div>
            <!-- /.post -->

            <!-- Post Coment -->
            @foreach ($jawabans as $jawaban)
            <div class="post clearfix">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                <span class="username">
                  <a href="#">Sarah Ross</a>
                  <form action="/jawabans/{{$pertanyaan->id}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                  </form>
                </span>
                <span class="description">{{$jawaban->created_at}}</span>
              </div>
              <!-- /.user-block -->
              <p>
                {{$jawaban['isi']}}
              </p>
              <p>
                <a href="/jawabans/{{$jawaban->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
              </p>
              <form class="form-horizontal">
                <div class="input-group input-group-sm mb-0">
                  <input class="form-control form-control-sm" placeholder="Response">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-danger">Send</button>
                  </div>
                </div>
              </form>
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
    <!-- /.nav-tabs-custom -->
  </div>
@endsection