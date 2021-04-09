@extends('/concel')
@section('index')


<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
          <a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">All category</a>
        <hr>
      

          @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


        <form action="{{ route('store.category') }}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category name</label>
              <input type="text" class="form-control" placeholder="Category name" name="name" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="text" class="form-control" placeholder="Slug name" name="slug" >
            </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
        </form>
      </div>
    </div>
  </div>


  @endsection    
