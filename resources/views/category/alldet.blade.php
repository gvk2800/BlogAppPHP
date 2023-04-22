@extends('home')
@section('title')
Category Details 
@endsection
@section('content')

<div class="container">
<h1>Available Details from DB</h1>
<a href="/cform"class="btn btn-warning">Add Entry</a>
    <div class="table">
    <table class='table table-striped'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Category Description</th>    
            <th>Blogs</th>    
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($d as $u)
        <tr>
            <td>{{$u->id}}</td>
            <!-- <td>{{$u->Roll_Number}}</td> -->
            <td>{{$u->Category_Name}}</td>
            <td>{{$u->Category_Description}}</td>
            <td>@foreach($u->blogs as $bg)
                <span class="badge bg-secondary">{{$bg->title}}</span>
                @endforeach
            </td>
            <td><a href='/cshow/{{$u->slug}}' class="btn btn-primary">View Details</a></td>
            <td><a href='/cedit/{{$u->slug}}' class="btn btn-success">Edit Details</a></td>
            <td>
                <form action="/cdel"method="post">
                @csrf()    
                @method('delete')
                <input type="hidden"name="id" value="{{$u->id}}">
                <button type="submit"class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$d->links()}}
    </div>
</div>

@endsection