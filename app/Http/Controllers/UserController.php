<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function profile($id) {
        $data = User::find($id);

        return view('Profile/profile', compact('data'));
    }

    public function update() {
        $id = auth()->user()->id;

        $data = DB::table('users')
            ->where('id','=', $id)
            ->join('images','images.user_id','=','id')
            ->first();

        return view('Profile/update', compact('data'));
    }

    public function updateValidate(Request $request) {

        // error_log('Some message here.');

        $name = $request->name;
        $gender = $request->gender;
        $email = $request->email;

        $error = null;
        $picture = null;


        if ($email == auth()->user()->email) {
            $request_data = [
                'email' => 'required|email',
            ];
        } else {
            $request_data = [
                'email' => 'required|email|unique:users,email',
            ];
        }
        

        $validateEmail = Validator::make($request->all(),  $request_data);
    
        if ($validateEmail->fails()) {
            $error = new MessageBag(['input' => ['Email must be unique!']]);
        }

        if (strlen($name) > 50) {
            $error = new MessageBag(['input' => ['Full name must be less than 50 characters']]);
        }

    
        if ($request->hasFile('file')) {
            
            $validateFile = Validator::make($request->all(), [
                'file' => 'required|mimes:jpg,jpeg,png'
            ]);
    
            if ($validateFile->fails())  {
                $error = new MessageBag(['input' => ['File extension must be jpg/jpeg/png']]);
            } else {
                $picture = auth()->user()->id.'.'.$request->file('file')->extension();
            }
        } 
       
        if ($error instanceof MessageBag) {
            return redirect()->back()->withInput()->withErrors($error);
        }

        $id = auth()->user()->id;
        
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
            ]);

        if ($picture != null) {
            // here upload pic
            Storage::putFileAs('public/image', $request->file('file'), $picture);
            DB::table('images')
                ->where('user_id', $id)
                ->update([
                    'path' => 'storage/image/'.$picture,
                ]);
        }
        return redirect()->back() ->with('alert', 'Updated!');
    }
}
