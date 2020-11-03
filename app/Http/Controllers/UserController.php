<?php


namespace App\Http\Controllers;

class UserController {
    public function getUserData(){
        $session = session(["name" => ""]);

        if($session != null ) {
            $name = session('name');
            return $name;
        } else {
            $name = "";

            return $name;
        }
    }

    public function login(Request $request){
        $this->validate($request, [

        ]);

        return session([]);
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|max:100|email',
        ]);

        var_dump($request);

    }

}
