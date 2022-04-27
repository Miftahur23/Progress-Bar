@extends('admin.master')
@section('content')

<h1>Categories</h1>
<hr>

 {{-- <a href="{{route('create.category')}}" button type="submit" class="btn btn-primary">Create Category</button> </a> --}}
<div style="padding-left: 250px; padding-right: 250px; text-align:center;">
  <form action="{{route('store.category')}}" method="POST">
    @csrf
    <div class="row">
          <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
          </div>
          <div class="form-group col-6">
              <label for="email">Details</label>
              <input type="text" class="form-control" id="email" name="details" placeholder="Enter Category Details">
          </div> 
    </div>   
    <button type="submit" class="btn btn-success btn-sm mt-2" style="text-align:right;">Save</button>
  </form>
</div>
<hr>

<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($category as $key=>$value) 

                          <tr>
                            {{-- @dd($volunteers) --}}
                            <th>{{$key+1}}</th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->details}}</td>  
                            <td>
                              <a class="btn btn-success btn-sm" href="{{route('view.category',$value->id)}}"><i class="fas fa-eye"></i></a>  
                              <a class="btn btn-warning btn-sm" href="{{route('edit.category',$value->id)}}"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger btn-sm" href="{{route('delete.category',$value->id)}}"><i class="fas fa-trash"></i></a>
                            </td>  
                          </tr>
                    
                  @endforeach
                </tbody>
              </table>
</div>
@endsection