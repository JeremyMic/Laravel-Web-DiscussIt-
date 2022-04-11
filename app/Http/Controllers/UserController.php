<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function loginValidate(Request $req) {
        $email = $req->email;
        $password = $req->password;
        $remember = $req->has('remember');

        if ($email == null || $password == null) {
            $errors = new MessageBag(['input' => ['All fields must be filled!!']]);
            return redirect()->back()->withErrors($errors);
        }

        if(auth()->attempt(['email'=>$email,'password'=>$password], $remember)) {
            return redirect('/');
        } else {
            $errors = new MessageBag(['password' => ['Login Failed! Email and/or password invalid.']]);
            return redirect()->back()->withInput($req->only('email'))->withErrors($errors);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function registerValidate(Request $request) {
        $name = $request->name;
        $password = $request->password;
        $confirm = $request->confirm_password;
        $gender = $request->gender;
        $email = $request->email;

        $error = null;
        if (count($request->all()) < 5) {
            $error = new MessageBag(['input' => ['All fields must be filled!']]);
            // return redirect()->back()->withInput()->withErrors(new MessageBag(['input' => ['All fields must be filled!']]));
        }

        $request_data = [
            'email' => 'required|email|unique:users,email',
        ];

        $validateEmail = Validator::make($request->all(),  $request_data);

        if ($validateEmail->fails()) {
            $error = new MessageBag(['input' => ['Email must be unique!']]);
        }

        if (strlen($name) > 50) {
            $error = new MessageBag(['input' => ['Full name must be less than 50 characters']]);
        }

        if (!ctype_alnum($password) || strlen($password) < 6) {
            $error = new MessageBag(['input' => ['Password must be at least 6 characters and must be alpha numeric']]);
        }

        if ($password != $confirm) {
            $error = new MessageBag(['input' => ['Password and Confirm Password must be the same!!']]);
        }
        
        if ($error instanceof MessageBag) {
            return redirect()->back()->withInput()->withErrors($error);
        }


        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>bcrypt($password),
            'gender' => $gender,
            'join_date' => Carbon::now(),
            'role_id' => 2,
        ]);

        if(auth()->attempt(['email'=>$email,'password'=>$password])) {
            return redirect('/');
        }
        return redirect('/');
    }
}
