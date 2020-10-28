<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        //get variable
        $user= \Auth::user(); 
        $id= \Auth::user()->id;
        //validations rules
        $validate = $this->validate ($request, [
            'name' => 'required', 'string', 'max:255',
            'surname' => 'required', 'string', 'max:255',
            'nick' => 'required', 'string', 'max:255','unique:users,nick,'.$id,
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email,'.$id
            ]);
        //getting values
        $name=$request->input('name');
        $surname=$request->input('surname');
        $nick=$request->input('nick');
        $email=$request->input('email');

        //news values in the object user
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //run query in the data base

        $user->update();

        return redirect()->route('config');
                        // ->with(['message'=>'Usuario Actualizado correctamente']);


    }
}

