@extends('home')
@section('title')
Edit Details (Tag)
@endsection
@section('content')
<h2>Edit Tag Details</h2>
<div class="card">
<form class="form" action='/aupdate'method="post">
  @csrf()  
  <input type="hidden" name="id"value="{{$id->id}}">
  <div class="name">
    <label for="tag_name" class="form-label">Name</label>
    <input name="name"type="text" class="form-control" id="tag_name"value="{{$id->Tag_Name}}">
  </div>
  <div class="description">
    <label for="tag_description" class="form-label">Description</label>
    <!-- <input name="udes" type="text" class="form-control" id="input_address" placeholder="Permanent Adress"> -->
    <textarea class='form-control'name="description" id="udes" cols="30" rows="10">{{$id->Tag_Description}}</textarea>
  </div>
  <div class="btn">
    <button type="submit" class="btn btn-primary">Update Tag</button>
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
