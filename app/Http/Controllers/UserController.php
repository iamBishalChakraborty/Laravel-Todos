<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
