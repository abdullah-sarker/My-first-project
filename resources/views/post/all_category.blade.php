@extends('/concel')
@section('index')


<div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 mx-auto">
        
          <a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">All category</a>
        <hr>

            <table class="table table-resposive" style="font-size:17px;">
                <tr>
                    <th>SL</th>
                    <th>category name</th>
                    <th>slug name</th>
                    <th>Action</th>
                </tr>
                @foreach($category as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->slug}}</td>
                    <td>{{$row->created_at}}</td>
                    <td >
                        <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-info" style="font-size:10px;">Edit</a>
                        <a href="{{ URL::to('delete/category/'.$row->id) }}" onclick="alert('are you delete')" class="btn btn-danger" style="font-size:10px;" >Delete</a>
                        <a href="{{ URL::to('view/category/'.$row->id) }}" class="btn btn-success " style="font-size:10px;">View</a>
                    </td>
                </tr>
                @endforeach
            </table>
     
      </div>
    </div>
  </div>


  @endsection    
