@extends('admin.master')
@section('content')
    

<h1>Category Details</h1>


<form action="{{route('update.category',$category->id)}}" method="POST">
    
        @method('PUT')
        @csrf
    <div class="row">
        
        <div class="form-group col-6 ">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name}}" placeholder="Enter Category Name">
          </div>
          <div class="form-group col-6">
              <label for="email">Details</label>
              <input type="text" class="form-control" id="email" name="details" value="{{ $category->details}}"placeholder="Enter Category Details">
          </div> 

        </div>    
    <br>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
  @endsection