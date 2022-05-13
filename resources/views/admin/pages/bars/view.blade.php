@extends('admin.master')
@section('content')
    
<h3> Categories </h3>

<p><b>Name: {{$category->name}}</b></p>
<p><b>Details:{{$category->details}}</b></p>

@endsection 