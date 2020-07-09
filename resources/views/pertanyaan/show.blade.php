@extends('layout.master')

@section('heading')
    Detail
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
                </form>  
                </span>
                <span class="description">{{$pertanyaan->created_at}}</span>
                <p><i class="far fa-newspaper mr-2"></i>{{$pertanyaan->judul}}</p>
              </div>
              <!-- /.user-block -->
              <p>
                {{$pertanyaan->isi}}
              </p>
            </div>
            <!-- /.post -->

            <!-- Post -->
            @foreach ($jawabans as $jawaban)
            <div class="post clearfix">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                <span class="username">
                  <a href="#">Sarah Ross</a>
                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                </span>
                <span class="description">{{$jawaban->created_at}}</span>
              </div>
              <!-- /.user-block -->
              <p>
                {{$jawaban->isi}}
              </p>

              
            </div>
            <!-- /.post -->
            @endforeach

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