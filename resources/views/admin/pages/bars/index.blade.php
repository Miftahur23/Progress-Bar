@extends('admin.master')
@section('content')

<h1>Progress Bar</h1>

<h1>{{$users->completed}}/3</h1>

<hr>

 {{-- <a href="{{route('create.category')}}" button type="submit" class="btn btn-primary">Create Category</button> </a> --}}
<div style="padding-left: 250px; padding-right: 250px; text-align:center;">
  <h1>Baaaar</h1>
</div>
<hr>

<div class="card" style="padding: 15px; margin:15px;">   

  {{-- @dd($users)   --}}
  
  @if($users->completed == 1)
  
  <form action="{{route('bars.update', $users->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
          <div class="form-group col-6">
            <label for="name">Address</label>
            <input type="text" class="form-control" id="name" name="address" placeholder="Enter Name">
          </div>
          <div class="form-group col-6">
              <label for="email">Country</label>
              <input type="text" class="form-control" id="email" name="country" placeholder="Enter Email">
          </div> 
    </div>   
    <button type="submit" class="btn btn-success btn-sm mt-2" style="text-align:right;">Save</button>
  </form>


  @elseif($users->completed=='2')

  <h1>step 2 Personal INFO</h1>

  <form action="{{route('bars.update', $users->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
          <div class="form-group col-6">
            <label for="name">Hobby</label>
            <input type="text" class="form-control" id="name" name="hobby" placeholder="hobby">
          </div>
          <div class="form-group col-6">
              <label for="email">Height</label>
              <input type="text" class="form-control" id="email" name="height" placeholder="height">
          </div> 
    </div>   
    <button type="submit" class="btn btn-success btn-sm mt-2" style="text-align:right;">Save</button>
  </form>

  @else

  <h1>step 3 Bank INFO</h1>

  <form action="{{route('bars.update', $users->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
          <div class="form-group col-6">
            <label for="name">Account ID</label>
            <input type="text" class="form-control" id="name" name="account_id" placeholder="Enter Name">
          </div>
          <div class="form-group col-6">
              <label for="email">PIN </label>
              <input type="text" class="form-control" id="email" name="pin" placeholder="Enter Email">
          </div> 
    </div>   
    <button type="submit" class="btn btn-success btn-sm mt-2" style="text-align:right;">Save</button>
  </form>

  @endif


</div>
@endsection