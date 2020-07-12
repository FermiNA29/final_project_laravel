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
          <li class="nav-item"><a class="nav-link active" href="#" data-toggle="tab" onclick="sortList()">Old Questions</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab" onclick="sortList()">Votes</a></li>
        </ul>
      </div><!-- /.card-header -->




      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->

            <div id="list2">

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
                  {!!$pertanyaan->isi!!}

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
                                                     document.getElementById('upvote_pertanyaan-form{{$pertanyaan->id}}').submit();">
                    <form id="upvote_pertanyaan-form{{$pertanyaan->id}}" action="/upvote_pertanyaan" method="POST">
                      @csrf
                      <input type="text" name="users_id" value="{{Auth::id()}}" id="users_id" hidden>
                      <input type="text" name="pertanyaans_id" value="{{$pertanyaan->id}}" id="pertanyaans_id" hidden>
                    </form>
                    <i class="fas fa-arrow-up "></i> Up-vote
                  </a><br>
                  <a href="/downvote_pertanyaan" onclick="event.preventDefault();
                                                     document.getElementById('downvote_pertanyaan-form').submit();" @if ($pertanyaan->users->poin < 15 ) id="disabled" @else @endif>
                      <form id="downvote_pertanyaan-form" action="/downvote_pertanyaan" method="POST" hidden>
                        @csrf
                        <input type="text" name="users_id" value="{{Auth::id()}}" id="users_id">
                        <input type="text" name="pertanyaans_id" value="{{$pertanyaan->id}}" id="pertanyaans_id">
                      </form>
                      <i class="fas fa-arrow-down"></i> Down-vote
                  </a>

                  <span class="float-right">

                    @foreach ($vote as $votes)
                    @if ($pertanyaan->id == $votes->pertanyaans_id)
                    <div id="categorie5.1-{{$votes->sum_poin}}">Vote : {{$votes->sum_poin}}</div>
                    @endif
                    @endforeach
                    <a href="/jawabans/{{$pertanyaan->id}}" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Comments
                    </a>
                  </span>
                </p>


              </div> @endforeach

            </div>
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

<style>
  #disabled {
    pointer-events: none;
    cursor: default;
    color: gray;
  }
</style>
<script>
  function sortList() {
    var toSort = document.getElementById('list2').children;
    toSort = Array.prototype.slice.call(toSort, 0);

    toSort.sort(function(a, b) {
      var aord = +a.id.split('-')[1];
      var bord = +b.id.split('-')[1];
      // two elements never have the same ID hence this is sufficient:
      return (aord < bord) ? 1 : -1;
    });

    var parent = document.getElementById('list2');
    parent.innerHTML = "";

    for (var i = 0, l = toSort.length; i < l; i++) {
      parent.appendChild(toSort[i]);
    }
  }
</script>
@endsection