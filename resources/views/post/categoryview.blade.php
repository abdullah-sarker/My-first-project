@extends('/concel')
@section('index')


<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
          <a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">All category</a>
        <hr>
      
        <div>
            <ol>
                <li>category name: {{$cetagory->name}}</li>
                <li>category slug: {{$cetagory->slug}}</li>
                <li>created at: {{$cetagory->created_at}}</li>
            </ol>
        </div>

      </div>
    </div>
  </div>


  @endsection    
