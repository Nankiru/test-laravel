<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show login page


    public function index()
    {
        $users = User::where('status',1)->get();
        return view('index',compact('users'));
    }

    public function profileAdmin()
    {
        return view('/pages/profile');
    }
    public function formUser()
    {
        return view('/pages/form');
    }
    public function formSubmit(Request $request)
    {
        $users = new User();
        // dd($request->input());
        $users->name = $request->name;
        $users->email = $request->email;
        $users->position = $request->position;
        $users->salary = $request->salary;
        $users->dob = $request->date;
        $users->province = $request->province;
        $users->country = $request->country;
        $users->status = 1;
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/'), $fileName);
        $users->img = $fileName;
        $users->created_at = now();
        $users->save();
        $users->orderBy('id', 'DESC')->get();
        session()->flash('success', 'User added successfully!');
        // return redirect()->back();
        return redirect('/');
    }
    public function userList()
    {
        $users = User::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('/pages/users', compact('users'));
    }

    // Handle login form submit

    public function update($id){
            $result = User::where('id',$id)->first();
            return view('pages/update_user',compact('result'));
    }
    public function update_submit($id , Request $request )
    {

        $users = User::where('id',$id)->first();
        $users->name = $request->name;
        
        if ($users->update()) {
            return redirect('/')->with('success', 'User updated successfully!');
        } else {
            return back()->with('error', 'User update failed.');
        }
    }
    

    public function destroy($id)
    {
        $users = User::find($id);
        if ($users) {
            $users->status = 0;
            $users->save();
            return redirect('/')->with('success', 'Users Deleted successfully');
        }
        return redirect('/users_list')->with('error', 'Product not found');
    }



}
