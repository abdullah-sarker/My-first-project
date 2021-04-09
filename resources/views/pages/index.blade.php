@extends('/concel')
@section('index')


<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($post as $row)
        <div class="post-preview">
          <a href="post.html">
             <img src="{{URL::to($row->image)}}" style="height:300px;">
             <h2 class="post-title">
             <a href="{{ URL::to('post/view/'.$row->id) }}">{{$row->title}}</a>
              
            </h2>
          </a>
          <p class="post-meta">category
            <a href="{{ asset('post/view/'.$row->id) }}">{{$row->name}}</a>
            on slug {{$row->slug}}</p>
        </div>
        <hr>
        @endforeach

       
        
        <hr>
        <!-- Pager -->
        <div class="clearfix">
        {{$post->links()}}
        </div>
      </div>
    </div>


@endsection