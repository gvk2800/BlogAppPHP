@extends('home')
@section('title')
Form (Category)
@endsection
@section('content')
<h2>Category Details</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
<form class="form" action='/cstore'method="post">
  @csrf()  
  <div class="name">
    <label for="category_name" class="form-label">Name</label>
    <input name="name"type="text" class="form-control" id="category_name">
  </div>
  <div class="description">
    <label for="category_description" class="form-label">Description</label>
    <!-- <input name="udes" type="text" class="form-control" id="input_address" placeholder="Permanent Adress"> -->
    <textarea class='form-control'name="description" id="udes" cols="30" rows="10" ></textarea>
  </div>
  <div class="btn">
    <button type="submit" class="btn btn-primary">Final Submit</button>
  </div>
</form>
</div>
<style>
    .card{
        margin: 15px;
    }
    .form{
        margin :5px;
    }
    .btn{
        margin :0px 0px;
    }
</style>
@endsection
