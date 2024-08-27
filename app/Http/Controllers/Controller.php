<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    //

    public function showUsers()
    {
        $users = User::all();
        return view('usersList', compact('users'));
    }
}
