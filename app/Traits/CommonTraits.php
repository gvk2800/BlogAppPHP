<?php
namespace App\Traits;

use Illuminate\Http\Request;
Use URL;

trait CommonTraits
{
    public function saveFiles($file,$path,$filename=null)
    {
        // dd($file,$path,$filename);
        $extension=$file->getClientOriginalExtension();
        if($filename)
        {
            $filename=time().'.'.$extension;
        }
        else{
            $fileName=$filename.'.'.$extension;
        }
        $success=$file->move(public_path($path),$filename);
        $f1=$success ? $path."/".$filename : null;
        return $f1;
    }
}