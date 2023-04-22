@extends('home')
@section('title')
Tag Details 
@endsection
@section('content')

<div class="container">
<h1>Available Tag Details from DB</h1>
<a href="/aform"class="btn btn-warning">Add Tag</a>
    <div class="table">
    <table class='table table-striped'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Tag Name</th>
            <th>Tag Description</th>
            <th>Blogs</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ud as $u)
        <tr>
            <td>{{$u->id}}</td>
            <!-- <td>{{$u->Roll_Number}}</td> -->
            <td>{{$u->Tag_Name}}</td>
            <td>{{$u->Tag_Description}}</td>
            <td>
                @foreach($u->blogs as $bl)
                <span class="badge bg-warning">{{$bl->title}}</span>
                @endforeach
            </td>
            <td><a href='/ashow/{{$u->id}}' class="btn btn-success">View Tag Details</a>
            </td>
            <td>
                
                <form action="/aedit"method="post">
                @csrf()    
                <input type="hidden"name="id" value="{{$u->id}}">
                <button type="submit"class="btn btn-primary">Edit Tag Details</button>

                </form>
            </td>
            <td>
                <form action="/adel"method="post">
                @csrf()    
                @method('delete')
                <input type="hidden"name="id" value="{{$u->id}}">
                <button type="submit"class="btn btn-danger">Delete Tag</button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$ud->links()}}
    </div>
</div>

@endsection