@extends('home')
@section('title')
Form (Blog Tag)
@endsection
@section('content')
<h2>Blog Tag Details</h2>
<div class="card">
<form class="form" action='/astore'method="post">
  @csrf()  
  <div class="name">
    <label for="tag_name" class="form-label">Tag Name</label>
    <input name="name"type="text" class="form-control" id="tag_name">
  </div>
  <div class="description">
    <label for="tag_description" class="form-label">Tag Description</label>
    <!-- <input name="udes" type="text" class="form-control" id="input_address" placeholder="Permanent Adress"> -->
    <textarea class='form-control'name="description" id="udes" cols="30" rows="10"></textarea>
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
