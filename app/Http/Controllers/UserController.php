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
        $counts = User::where('status',1)->count();
        return view('index',compact('users','counts'));
    }

    public function profileAdmin()
    {
        return view('/pages/profile');
    }
    public function formUser()
    {
        return view('/pages/form');
    }
    public function form_product()
    {
        return view('/pages/form_product');
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
    public function update_submit($id, Request $request)
{
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email',
    //     'position' => 'nullable|string|max:255',
    //     'salary' => 'nullable|numeric',
    //     'province' => 'nullable|string|max:255',
    //     'country' => 'nullable|string|max:255',
    //     'date' => 'nullable|date',
    //     'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    // ]);

    $user = User::find($id);

    if (!$user) {
        return back()->with('error', 'User not found.');
    }

    // Update basic fields
    $user->name = $request->name;
    $user->email = $request->email;
    $user->position = $request->position;
    $user->salary = $request->salary;
    $user->province = $request->province;
    $user->country = $request->country;
    $user->dob = $request->date;

        if ($user->img && file_exists(public_path('uploads/' . $user->img)))
            unlink(public_path('uploads/' . $user->img));
    
        // Store new image
        $imageName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/'), $imageName);
    
        $user->img = $imageName;
        // dd($user->img = $imageName);
    
        // Update session if necessary
        if (session('id') == $id) {
            session(['img' => $imageName]);
        }

    $user->updated_at = now();
    $user->save();

    return redirect('/')->with('success', 'User updated successfully!');
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
    public function update_img_admin(Request $request, $id)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
    
        $user = Login::find($id);
    
        if ($user) {
            // Delete old image if exists
            if ($user->img && file_exists(public_path('uploads/admin/' . $user->img))) {
                unlink(public_path('uploads/admin/' . $user->img));
            }
    
            // Store new image
            // $imageName = time() . '.' . $request->img->extension();
            // $request->img->move(public_path('uploads'), $imageName);

            $imageName = $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('uploads/admin/'), $imageName);
    
            // Update user image and status

            // dd( $user->img = $imageName);
            $user->img = $imageName;
            $user->save();

            session(['img' => $imageName]);
    
            return redirect()->back()->with('success', 'Profile image updated successfully');
        }
    
        return redirect('/profile')->with('error', 'User not found');
    }
    



}
