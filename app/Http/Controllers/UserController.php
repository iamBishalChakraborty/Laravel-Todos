<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public  function upload (Request $request) {
        if ($request->hasFile('image')){
            if ($request->image->store('images', 'public')){
                if (auth()->user()->avatar){
                    Storage::delete('public/images/'.auth()->user()->avatar);
                }
                auth()->user()->update(['avatar' => $request->image->hashName()]);
                return redirect()->back()->with('success','Image Uploaded Successfully');
            }else{
                return redirect()->back()->with('error','Unable to Save the Image');
            }
        }else{
            return redirect()->back()->with('error','Unable to Fetch the Image');
        }
    }
}
