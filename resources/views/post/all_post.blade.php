@extends('/concel')
@section('index')


<div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        
          <a href="{{ route('contact') }}" class="btn btn-danger">Contact</a>
        <hr>

            <table class="table table-resposive" style="font-size:17px;">
                <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($post as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->title}}</td>
                    <td><img src=" {{asset($row->image)}} " style="height: 40px; width: 70px;"></td>
                    <td >
                        <a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-info" style="font-size:10px;">Edit</a>
                        <a href="{{ URL::to('delete/post/'.$row->id) }}" onclick="alert('are you delete')" class="btn btn-danger" style="font-size:10px;" >Delete</a>
                        <a href="{{ URL::to('view/post/'.$row->id) }}" class="btn btn-success " style="font-size:10px;">View</a>
                        
                    </td>
                </tr>
                @endforeach
            </table>
     
      </div>
    </div>
  </div>


  @endsection    
