<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function home()
    {
        // if (!session()->has('id')) {
        //     return redirect('/login')->with('error', 'Please login first.');
        // }
        $users = User::where('status', 1)->get();
        return view('customerpage.home', compact('users'));
    }
    public function index()
    {
        // if (!session()->has('id')) {
        //     return redirect('/login')->with('error', 'Please login first.');
        // }
        $users = User::where('status', 1)->paginate(8);
        $newusers = User::where('status', 1)->whereDate('created_at', \Carbon\Carbon::today())->paginate(8);
        // $users = User::whereDate('created_at', \Carbon\Carbon::today())->get();

        return view('customerpage.index', compact('users', 'newusers'));
    }
    public function admin_register(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:admins,email',
        //     'password' => 'required|string|min:8',
        // ]);

        // Create new admin
        $register = new Login();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt(($request->password)); // better than
        $register->created_at = now();
        $register->updated_at = now();
        $register->save();

        // ✅ 3. Flash success message and redirect
        $request->session()->flash('success', 'Admin registered successfully');
        return redirect('/login');
    }
    public function admin_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // 🔍 Find admin by email
        $admin = Login::where('email', $request->email)->first();

        // 🔐 Check password
        if ($admin && Hash::check($request->password, $admin->password)) {
            // ✅ Store login data in session
            $request->session()->put([
                'admin_id' => $admin->id, // optional but useful
                'name' => $admin->name,
                'email' => $admin->email,
            ]);

            return redirect('/dashboard')->with('success', 'Welcome back, ' . $admin->name . '!');
        }

        // ❌ Invalid credentials
        return redirect('/login')->with('error', 'Invalid email or password');
    }

    // Logout user

    public function update_admin($id)
    {
        $result = Login::where('id', $id)->first();
        return view('pages.update_admin', compact('result'));
        // return view('pages/update_admin');
    }
    public function update_admin_submit($id, Request $request)
    {
        $admin = Login::where('id', $id)->first();
        $admin->name = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->telegram = $request->telegram;
        $admin->address = $request->address;
        $admin->updated_at = now();

        session([
            'name' => $admin->name,
            'email' => $admin->email,
            'phone' => $admin->phone,
            'telegram' => $admin->telegram,
            'address' => $admin->address,
        ]);

        if ($admin->update()) {
            return redirect('/dashboard')->with('success', 'Admin updated successfully!');
        } else {
            return back()->with('error', 'Admin update failed.');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush(); // clears all session data
        return redirect('/login');
    }
    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'newpass' => 'required',
            'cfpass' => 'required|same:newpass'
        ]);

        $user = Login::where('email', $request->email)->first();

        // Set the new password
        $user->password = bcrypt($request->newpass);
        $user->save();

        return back()->with('status', 'Password successfully reset!');
    }
    public function update_img_admin($id)
    {
        $result = Login::where('id', $id)->first();
        if ($result) {
            return redirect('/update_admin');
        } else {
            return redirect('/dashboard');
        }
    }
}
