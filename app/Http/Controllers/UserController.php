<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){


        $data = [
          'name' => 'Bishal Chakraborty',
          'email' => 'cbishal695@gmail.com',
          'password' => 'Bishal@1997'
        ];
//        $user = new User();
//        $user->name = 'BishalCh';
//        $user->email = 'Bishal123@bishal.com';
//        $user->password = bcrypt('BishalCh');
//        $user->save();

//         User::create($data);

//        User::where('id',1)->update(['name' => 'Chakraborty']);

        return User::all();


//        DB::insert('insert into users(name,email, password) value (?,?,?)', [
//            'Bishal','bcborty15@gmail.com','abcde'
//        ]);

        return view('user');
    }

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
