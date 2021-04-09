@extends('/concel')
@section('index')


<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
       <a href="{{ route('contact') }}" class="btn btn-danger">Contact</a>
        <hr>
      
        <div>
                <h3>{{$post->title}}</h3>
                <img src="{{ URL::to($post->image)}}" height="340px;">
                <p>Category name: {{$post->name}}</p>
                <p>{{$post->details}}</p>
        </div>

      </div>
    </div>
  </div>


  @endsection    
