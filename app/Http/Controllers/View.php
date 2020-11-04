<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class View {
    public function index(){
        $token = session("token");
        $register = session("register");
        $surname = session("surname");
        $name = session("name");

        $mascarillas = DB::table("productos")->select("*")->where("tipo", "=", "mascarillas")->where("status", "=", "ON")->get();
        $bolsas = DB::table("productos")->select("*")->where("tipo", "=", "bolsas")->where("status", "=", "ON")->get();
        $pantalones = DB::table("productos")->select("*")->where("tipo", "=", "pantalones")->where("status", "=", "ON")->get();
        $mandalas = DB::table("productos")->select("*")->where("tipo", "=", "mandalas")->where("status", "=", "ON")->get();
        $categorias = DB::table("productos")->select("tipo")->where("status", "=", "ON")->groupBy("tipo")->orderBy("tipo", "desc")->limit(3)->get();

        if($token != null){
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("token", $token)
                ->with("surname", $surname)
                ->with("mascarillas", $mascarillas)
                ->with("bolsas", $bolsas)
                ->with("pantalones", $pantalones)
                ->with("mandalas", $mandalas)
                ->with("categorias", $categorias)
                ->with("name", $name);

        } elseif($register != null) {
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("token", $token)
                ->with("register", "successful")
                ->with("surname", $surname)
                ->with("mascarillas", $mascarillas)
                ->with("bolsas", $bolsas)
                ->with("pantalones", $pantalones)
                ->with("categorias", $categorias)
                ->with("mandalas", $mandalas)
                ->with("name", $name);
        } else {
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("categorias", $categorias)
                ->with("mascarillas", $mascarillas)
                ->with("bolsas", $bolsas)
                ->with("pantalones", $pantalones)
                ->with("mandalas", $mandalas)
                ->with("token", "");
        }

    }

    public function userPage(){
        $name = session("name");
        $token = session("token");
        $surname = session("surname");
        return \View::make("userPage")
                        ->with("pagename", "Mi Perfil")
                        ->with("token", $token)
                        ->with("surname", $surname)
                        ->with("name", $name);
    }

    public function products() {
        $name = session("name");
        $token = session("token");
        $surname = session("surname");

        $productos = DB::table("productos")->select("*")->get();
        $categorias = DB::table("productos")->select("tipo")->groupBy("tipo")->orderBy("tipo", "desc")->limit(3)->get();

        return \View::make("productos")
                        ->with("pagename", "Productos")
                        ->with("token", $token)
                        ->with("surname", $surname)
                        ->with("productos", $productos)
                        ->with("categorias", $categorias)
                        ->with("name", $name);
    }

    public function aboutUs() {
        $name = session("name");
        $token = session("token");
        $surname = session("surname");
        return \View::make("about")
                    ->with("pagename", "Sobre Nosotros")
                    ->with("token", $token)
                    ->with("surname", $surname)
                    ->with("name", $name);
    }

    public function login(){
        $token = session("token");
        $name = session("name");
        $surname = session("surname");
        if($token != null){
            return \View::make("login")
                ->with("pagename", "Login")
                ->with("token", $token)
                ->with("surname", $surname)
                ->with("name", $name);
        }

        return \View::make("login")
            ->with("pagename", "Login")
            ->with("token", "");


    }

    public function registro(){
        $name = session("name");
        $token = session("token");
        $surname = session("surname");
        if($token != null){
            return \View::make("registro")
                    ->with("pagename", "Registro")
                    ->with("token", $token)
                    ->with("surname", $surname)
                    ->with("name", $name);
        }

        return \View::make("registro")
                ->with("pagename", "Registro")
                ->with("token", "");
    }

    public function listarTipos($tipo) {

        $name = session("name");
        $token = session("token");
        $surname = session("surname");

        $productos = DB::table("productos")->select("*")
                        ->where("tipo", "=", $tipo)
                        ->get();

        $categorias = DB::table("productos")->select("tipo")->distinct()->get();

        return \View::make("pr_ordenados")
                    ->with("productos", $productos)
                    ->with("pagename", "Productos")
                    ->with("token", $token)
                    ->with("categorias", $categorias)
                    ->with("surname", $surname)
                    ->with("name", $name);

    }

}
