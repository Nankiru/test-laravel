<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function register_submit(Request $request)
    {
        $register = new Login();
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $cfpassword = $request->cfpassword;
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email|max:255',
        //     'password' => 'required|string|min:6',
        //     'cfpass' => 'required|same:password'
        // ]);

        $register->name = $name;
        $register->email = $email;
        $register->passwprd = $name;
        $profileAdmin = $request->file('profileAdmin')->getClientOriginalName();
        $request->file('profileAdmin')->move(public_path('uploads/admin/'), $profileAdmin);
        $register->status = 1;
        $register->avatar = $profileAdmin;
        dd($profileAdmin);
        $register->created_at = now();
        $register->save();
        $register->orderBy('id', 'DESC')->get();
        session()->flash('success', 'Register are successfully');

        // return redirect()->back();

        return redirect('/login');
    }
    public function login_submit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        // $login = DB::table('users')->where('email',$email)->where('password',$password)->first();
        $login = Login::where('email', $email)->where('password', $password)->first();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($login) {
            $id = $login->id;
            $name = $login->name;
            $email = $login->email;
            $phone = $login->phone;
            $address = $login->address;
            $telegram = $login->telegram;
            $avatar = $login->avatar;
            $request->session()->put([
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'telegram' => $telegram,
                'address' => $address,
                'avatar' => $avatar,
            ]); // use actual user ID
            $request->session()->flash('success', 'Welcome back, ' . $login->name . '!');
            return redirect('/');
        } else {
            session()->flash('status', 'Invalid user or password');
            return redirect('/login');
        }
    }

    // Logout user

    public function update_admin($id)
    {
        $result = Login::where('id', $id)->first();
        return view('pages/update_admin', compact('result'));
        // return view('pages/update_admin');
    }
    public function update_admin_submit($id, Request $request)
    {
        $admin = Login::where('id',$id)->first();
        $admin->name = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->telegram = $request->telegram;
        $admin->address = $request->address;
        $admin->updated_at = now();
        
        if ($admin->update()) {
            return redirect('/')->with('success', 'Admin updated successfully!');
        } else {
            return back()->with('error', 'Admin update failed.');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush(); // clears all session data
        return redirect('/login');
    }
    public function update_img_admin($id)
    {
        $result = Login::where('id',$id)->first();
        if($result){
            return redirect('/update_admin');
        }else{
            return redirect('/');
        }
    }
}
