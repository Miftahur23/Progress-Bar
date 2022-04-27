@extends('admin.master')
@section('content')


<h1>Category Details</h1>


{{-- validation --}}
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
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
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
