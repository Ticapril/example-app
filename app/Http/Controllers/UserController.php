<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AllUsersShow(){
        $query = Usuario::all();
        return $query;
    }
    public function UserCreate(Request $request){
        // $user= Usuario::create(["name" => $name, "email" => $email, "cpf" => $cpf, "password" => "1234"]);
        // needs fillable protected $fillable = ["name", "email", "cpf", "password"];
        $user = new Usuario();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = 123;
        $user->save();
        return $user;
    }
    public function UserShow(int $id){
        $query = Usuario::find($id);
        if(isset($query))return $query;
        return "User not found!";
    }
    public function UserShowByCpf(String $cpf){
        $query = Usuario::where("cpf","like", $cpf."%")->first();
        return $query;
    }
    public function UserDelete(int $id){
        $user = Usuario::find($id);
        if(isset($user)){
            $user->delete();
            return "User deleted";
        }
        return "User not found!";
    }
    public function UserUpdate(int $id, Request $request){
        $user = Usuario::find($id);
        if(isset($user)){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->save();
            return $user;
        }
        return "User not found!";
    }
}
