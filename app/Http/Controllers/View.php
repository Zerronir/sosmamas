<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;

class View {
    public function index(){
        $name = session("name");
        $name = "";
        if($name != null){
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("name", $name);
        } else {
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("name", "");
        }

    }

    public function userPage(){
        $name = session("name");
        $name = "";
        return \View::make("userPage")
                        ->with("pagename", "Mi Perfil")
                        ->with("name", $name);
    }

    public function products() {
        $name = session("name");
        $name = "";
        return \View::make("productos")
                        ->with("pagename", "Productos")
                        ->with("name", $name);
    }

    public function aboutUs() {
        $name = session("name");
        $name = "";
        return \View::make("about")
                    ->with("pagename", "Sobre Nosotros")
                    ->with("name", $name);
    }

    public function login(){

    }

    public function registro(){
        $name = session("name");
        $name = "";
        if($name != null){
            return \View::make("registro")
                    ->with("pagename", "Registro")
                    ->with("name", $name);
        }

        return \View::make("registro")
                ->with("pagename", "Sobre Nosotros")
                ->with("name", $name);
    }

}
