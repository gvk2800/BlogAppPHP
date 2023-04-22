<?php

namespace App\Http\Controllers;
use App\tag;
use Illuminate\Http\Request;
use Session;
class BlogTagController extends Controller
{
    //
    public function aform()
    {
        return view('/tag/aform');
    }
    public function astore(Request $r)
    {
        $newc= new tag;
        // dd($r);
        $newc->Tag_Name=$r->name;
        $newc->Tag_Description=$r->description;
        $newc->save();

        Session::flash('sucess','Tag Details Saved Sucessfully');
        return redirect()->route('ain');
        // dd($newc);
        // dd($r);
    }
    public function ashow($id)
    {
        $data=tag::where('id',$id)->first();
        // dd($data);
        return $data;
    }
    public function aindex(){
        // $ud=categories::get();
        $ud=tag::with('blogs')->paginate(4);
        return view('tag/alltag',compact('ud'));
    }
    public function aedit(Request $r)
    {
        // dd($r);
        $id=tag::find($r->id);
        return view('tag/aedit',compact('id'));
    }
    public function aupdate(Request $req)
    {
        // dd($req);
        $d=tag::find($req->id);
        // $d->id=$req->idd;
        // dd($d);
        $d->Tag_Name=$req->name;
        $d->Tag_Description=$req->description;
        // dd($d);
        $d->save();
        return redirect()->route('ain');
    }
    public function adel(Request $r)
    {
        $obj=tag::where('id',$r->id)->delete();
        return redirect()->back();
        // dd($r);
    }
}
