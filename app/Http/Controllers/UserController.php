<?php


namespace App\Http\Controllers;
use App\Http\Controllers\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\Eloquent\Collection;
use function Sodium\crypto_pwhash_scryptsalsa208sha256_str;

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

        $pass1 = $request->input('pass1');

            $validated = Validator::make($request->all(), [
                $request->input('email') => 'max:50|required|email',
                $request->input('pass1') => 'max:16|required'
            ]);

            if($validated == true) {

                $salt = sha1(md5($pass1)).'k32duem01vZsQ2lB8g0s';
                $passToDB = md5($pass1.$salt);

                $user = DB::table("users")
                        ->select(
                        'name',
                                'surname',
                                'email',
                                'userToken'
                        )
                        ->where('password', '=', $passToDB)->get();

                echo $user[0]->userToken;

                $session = session([
                    "token" => $user[0]->userToken,
                    "name" => $user[0]->name,
                    "surname" => $user[0]->surname,
                ]);

                return redirect()->action("View@userPage");
        }

    }

    // Register Function
    public function register(Request $request){
       $pass1 = $request->input("pass1");
       $pass2 = $request->input("pass1");

        if($pass1 == $pass2){
            $validated = Validator::make($request->all(), [
                $request->input('name') => 'max:50|required' ,
                $request->input('surname') => 'max:50|required',
                $request->input('email') => 'max:50|required|email',
                $request->input('pass1') => 'max:16|required|password',
                $request->input('pass2') => 'max:16|required|password'
            ]);

            if($validated == true) {

                //Generate a random string.
                $token = openssl_random_pseudo_bytes(16);
                $token = bin2hex($token);

                $salt = sha1(md5($pass1)).'k32duem01vZsQ2lB8g0s';
                $passToDB = md5($pass1.$salt);

                $name = $request->input("name");
                $surname = $request->input("surname");
                $email = $request->input("email");

                DB::table("users")
                    ->insert([
                        'name' => $name,
                        'surname' => $surname,
                        'email' => $email,
                        'password' => $passToDB,
                        'userToken' => $token
                    ]);

                $sessionToken = session(["token" => $token]);

                $message = "<html>";
                $message .= "<head>";
                $message .= "<title>Registro exitoso</title>";
                $message .= "<body>";
                $message .= "<h1>Te has registrado correctamente, estos son tus datos de acceso:</h1>";
                $message .= "<p>Usuario: ".$request->input("email")."</p>";
                $message .= "<p>Contraseña: ".$pass1."</p>";
                $message .= "<p>Esta contraseña se ha generado automáticamente, para cambiarla dirigete a tu perfil personal de la página web para cambiarla</p>";
                $message .= "</body>";
                $message .= "</html>";

                try{
                    $session = session([
                        "token" => $token,
                        "register" => "successful",
                        "name" => $name
                    ]);
                    //mail($request->input("email"), "Registro completado", $message, "from: no-reply@sosmamas.com");
                    return redirect()
                        ->action("View@index")
                        ->with("pagename", "Inicio")
                        ->with("token", $token)
                        ->with("register", "successful");

                }catch (\Exception $e) {
                    return redirect()
                        ->action("View@registro")
                        ->with("pagename", "Registro")
                        ->with("name", "")
                        ->with("register", $e)
                        ->withInput(
                            [
                                'name' => $name,
                                'surname' => $surname
                            ]
                        );
                }
            }

            return redirect()
                ->action("View@index")
                ->with("pagename", "Inicio")
                ->with("name", "")
                ->with("register", "successful");
        }

        return null;

    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
