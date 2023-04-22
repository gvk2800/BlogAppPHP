@extends('home')
@section('title')
Blog Details 
@endsection
@section('content')

<div class="container">
<h1>Available BLOG Details from DB</h1>
<a href="#"class="btn btn-warning" title="create blog" data-bs-target="#createblogmodal"data-bs-toggle="modal">Add Blogś</a>
    <div class="table">
    <table class='table table-striped'>
    <thead>
        <tr>
            <th>Title</th>
            <th>content</th>
            <th>Category ID</th>    
            <th>Category Name</th>   
            <th>Tags</th> 
            <th>Created At</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody> 
      
        @foreach($blog as $blogs)
        <tr id="blog{{$blogs->id}}">
            <td>{{$blogs->title}}</td>
            <td>{{$blogs->content}}</td>
            <td>{{$blogs->category_id}}</td>
            <td><span class="badge bg-success">{{$blogs->category->Category_Name}}</span></td>
            <td>
              @foreach($blogs->tags as $ta)
              <span class="badge bg-danger">{{$ta->Tag_Name}}</span>
              @endforeach
            </td>
            <td>{{$blogs->created_at}}</td>
            <td><a href="#"data-bs-target="#editblog"data-bs-toggle="modal"class="btn btn-secondary" onclick="editblog({{$blogs}})"title="edit">Edit Blog</a></td>
            <td>
              <a class="btn btn-danger"href="#"onclick="Delete_blog({{$blogs->id}})">Delete Blog</a>
            </td>
            <td>
              <a class="btn btn-outline-info"href="#"data-bs-target="#viewblog"data-bs-toggle="modal"onclick="View_blog({{$blogs}})">View Blog</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$blog->links()}}
    </div>
</div>
<!-- create Modal -->
<div class="modal fade" id="createblogmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{Route('blog.store')}}"method='post'enctype="Multipart/form-data">
        @csrf()
      <div class="modal-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control"name="title"placeholder="please enter name">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Category</label>
                    <select class="form-control js-example-basic-single"name="category" id="category">
                        <option selected disabled>-- Select Categroy --</option>
                        @foreach($cat as $c)
                          <option value="{{$c->id}}">{{$c->Category_Name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="row">
                   <div class="form-group col-md-6 col-sm-12">
                    <label for="">Tag</label>
                    <select name="tag[]" id="tag" multiple class="form-control">
                      <option disabled>--Select Tags--</option>
                      @foreach($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->Tag_Name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-6 col-sm-12">
                    <label for="">Blog Image</label>
                    <input type="file"name="blog_image">
                   </div>
                  </div>
                  <div class="form-groups">
                    <label for="content">Content of Blog</label>
                    <textarea class="form-control" row=6 name="content" id="content"placeholder="Write Content"></textarea>
                  </div>
                </div>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Blog</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editblog" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{Route('blog.update')}}"method='post'>
        @csrf()
        @method('put')
        <input type="hidden"name='id'id='blog_id'>
      <div class="modal-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control"name="title"placeholder="please enter name"id="edit_title">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Category</label>
                    <select class="form-control"name="category" id="edit_category">
                        <option selected disabled>-- Select Categroy --</option>
                        @foreach($cat as $c)
                          <option id="cat{{$c->id}}"value="{{$c->id}}">{{$c->Category_Name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-groups">
                    <label for="content">Content of Blog</label>
                    <textarea class="form-control" row=6 name="content" id="edit_content"placeholder="Write Content"></textarea>
                  </div>
                </div>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Blog</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- View Modal -->
<div class="modal fade" id="viewblog" tabindex="-1" aria-labelledby="viewBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Blog Title</label>
                    <input type="text" class="form-control"name="title"placeholder="please enter name"id="view_title"readonly>
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="">Blog Category</label>
                    <input type="text"class="form-control"name="view_category"id="view_category"readonly>
                  </div>
                  <div class="form-groups">
                    <label for="content">Content of Blog</label>
                    <textarea class="form-control" row=6 name="content" id="view_content"placeholder="Write Content"></textarea>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  function editblog(blog)
  {
    console.log(blog);
    // alert('edit')
    $('#edit_title').val(blog.title);
    $('#blog_id').val(blog.id);
    $('#edit_content').val(blog.content);
    $("#edit_category").val(blog.category_id);
    // $('#cat'+blog.category_id).val(blog.catgory);
  }
  function Delete_blog(id)
  {
    $.ajax({
    type:'delete',
    url:"{{Route('blog.del')}}",
    data:{
      blog_id:id,
      _token:"{{csrf_token()}}"
    },
    success:function(response)
    {
      console.log(response);
      if(response.status="success")
        $('#blog'+id).remove();
      alert(response.message);  

    },
    error:function(response)
    {
      console.log(response);
    }
   })
  }
  $(document).ready(function(){
    $('.js-example-basic-single').select2({
    dropdownParent: $('#createblogmodal')
    });
  })
  
  function viewblog(data)
  {
    $("#blog_image").attr("src",data.file_path);
  }
</script>
@endsection 