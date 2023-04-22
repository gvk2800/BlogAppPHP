<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog; 
use App\categories; 
use App\tag;
use App\Traits\CommonTraits;

class BlogController extends Controller
{
    //
    use CommonTraits;
    public function index()
    {
        $cat=categories::get();
        $blog=blog::with('category')->paginate(10);
        $tags=tag::all();
        // dd($blog);
        return view('Blog.index',compact('blog','cat','tags'));
    }
    public function bstore(Request $re)
    {
        // dd($re);
        $newblog=new blog;
        $newblog->title=$re->title;
        $newblog->content=$re->content;
        $newblog->category_id=$re->category;
        
        if($re->file('blog_image'))
        {
            $path="blog";
            $filename=str_replace(" ","",$re->title);
            $sp=$this->saveFiles($re->file('blog_image'),$path,$filename);
            // dd($sp);
            $newblog->file_path=$sp;
        }
        $newblog->save();
        $newblog->tags()->sync($re->tag);
        session()->flash('success','Blog Saved Successufully');
        return redirect()->back();


    }
    public function bupdate(Request $re)
    {
        // dd($re);
        $editBlog=blog::where('id',$re->id)->first();

        $editBlog->title=$re->title;
        $editBlog->content=$re->content;
        $editBlog->category_id=$re->category;
        $editBlog->save();
        session()->flash('warning','Blog Updated Succesfully');
        return redirect()->route('blog.index');


    }
    public function bdel(Request $r)
    {
        $blog=blog::where('id',$r->blog_id)->first();
        if($blog->deleted_at)
        {
            $blog->forceDelete();
        }
        else
        {
            $blog->delete();
        }
        return response()->json(['status'=>'success','message'=>'Blog deleted successfully']);
    }
}
