<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class View {
    public function index(){
        $token = session("token");
        $register = session("register");
        $surname = session("surname");
        $name = session("name");

        $productos = DB::table("productos")->select("*")->limit(6)->get();
        $categorias = DB::table("productos")->select("tipo")->where("status", "=", "ON")->groupBy("tipo")->orderBy("tipo", "desc")->limit(3)->get();

        if($token != null){
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("token", $token)
                ->with("surname", $surname)
                ->with("productos", $productos)
                ->with("categorias", $categorias)
                ->with("name", $name);

        } elseif($register != null) {
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("token", $token)
                ->with("register", "successful")
                ->with("surname", $surname)
                ->with("productos", $productos)
                ->with("name", $name);
        } else {
            return \View::make("index")
                ->with("pagename", 'Inicio')
                ->with("categorias", $categorias)
                ->with("productos", $productos)
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

    public function verProductos($productoID) {

        $name = session("name");
        $token = session("token");
        $surname = session("surname");

        $producto = DB::table("productos")->select("*")
            ->where("productoId", "=", $productoID)
            ->get();

        $categorias = DB::table("productos")->select("tipo")->distinct()->get();

        return \View::make("producto")
            ->with("producto", $producto)
            ->with("pagename", $producto[0]->nombre)
            ->with("token", $token)
            ->with("categorias", $categorias)
            ->with("surname", $surname)
            ->with("name", $name);

    }

}
