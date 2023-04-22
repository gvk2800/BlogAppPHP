<?php

namespace App\Http\Controllers;
use App\categories;

use Illuminate\Http\Request;
use Session;
class BlogCategoryController extends Controller
{
    //
    public function vv()
    {
        return "Hiiiiiii";
    }
    public function form()
    {
        return view('category/form');
    }
    public function cstore(Request $r)
    {
        $r->validate([
            'name'=>'required|min:5|unique:categories,Category_Name',
            'description'=>'required|min:5'
        ]);
        $newc= new categories;
        $newc->Category_Name=$r->name;
        $newc->Category_Description=$r->description;
        $newc->slug=str_replace(" ","-",$r->name);
 
        $newc->save();
        Session::flash('sucess','Category Saved Sucessfully');

        return redirect()->route('abd');
        // dd($newc);
        // dd($r);
    }
    public function index(){
        // $ud=categories::get();
        // dd($ud);
        $d=categories::with('blogs')->paginate(4);
        // dd($d);
        return view('category/alldet',compact('d'));
    }
    public function cedit($slug)
    {
        // dd($slug);
        $var=categories::where('slug',$slug)->first();
        $id=$var;
        return view('category/cedit',compact('id'));
    }
    public function cshow($id=null)
    {
        $data=categories::where('slug',$id)->first();
        // dd($data);
        return $data;
    }
    public function cupdate(Request $req)
    {
        //dd($req);
        $req->validate([
            'name'=>'required|min:5|unique:categories,Category_Name,'.$req->id,
            'description'=>'required|min:5'
        ]);
        // dd($req);
        // $d=categories::find($req->id);
        $d=categories::where('slug',$id)->first();
        // $d->id=$req->idd;
        // dd($d);
        $d->Category_Name=$req->name;
        $d->Category_Description=$req->description;
        $d->slug=str_replace(" ","-",$r->Category_Name);
        // dd($d);
        $d->save();
        return redirect()->route('abd');
    }
    public function cdel(Request $r)
    {
        $obj=categories::where('id',$r->id)->delete();
        return redirect()->back();
        // dd($r);
    }
    public function ctrash()
    {
        $d=categories::onlyTrashed()->get();
        // $d=DB::table('categories')->whereNotNull('deleted_at')->get();
        // $d=DB::select("select * from categories where deleted_at != null");
        return view('category/trashdet',compact('d'));
    }

    public function restoreData(Request $request){
        $cat = categories::onlyTrashed()->find($request->id);
        $cat->restore();

        $d=categories::onlyTrashed()->get();

        return view('category/trashdet', compact('d'));

    }

    public function perDelete(Request $request){
        $cat = categories::withTrashed()->find($request->id);
        if($cat->deleted_at){
            $cat->forceDelete();
        }

        $d=categories::onlyTrashed()->get();

        return view('category/trashdet', compact('d'));

    }
}
