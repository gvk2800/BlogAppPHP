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
            <th>Category Name</th>
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
            
            <td>
            <form action="{{Route('cRestore')}}"method="post">
                @csrf()
                <input type="hidden"name="id" value="{{$u->id}}">
                <button type="submit"class="btn btn-success">Restore</button>

                </form>
            </td>
            <td>
                <form action="{{Route('cPerDelete')}}"method="post">
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
    
    </div>
</div>

@endsection