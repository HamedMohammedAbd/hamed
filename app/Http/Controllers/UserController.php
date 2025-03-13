<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = Hash::make($_POST['password']);
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $users = User::all();
        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? Hash::make($_POST['password']) : null;

        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        if ($password) {
            $user->password = $password;
        }
        $user->save();

        return redirect('/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
}