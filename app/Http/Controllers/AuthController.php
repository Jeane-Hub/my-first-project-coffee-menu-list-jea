<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;

class AuthController extends Controller
{
    // Register
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        // Validation
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirmpassword' => 'required|same:password', 
        ], [
            'confirmpassword.same' => 'The password confirmation does not match.',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->fullname, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role' => 'User',
            'status' => 'Active',
        ]);

        session(['user' => $user]);

        return redirect('/login')->with('success', 'Registration successful! Welcome.'); 
    }

    // Login
    public function login(Request $request) {
        // Validation 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Check Password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        session(['user' => $user]);

        if ($user->role === 'Admin') {
            return redirect('/admin/dashboard')->with('success', 'Welcome Admin!');
        }

        return redirect('/user/dashboard')->with('success', 'Welcome User!');
    }

    // Logout
    public function logout() {
        session()->forget('user');
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    // Charts
    public function getDashboard() {
        
        $chartData = [10, 20, 30, 40, 50]; 
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];

        $usercount = User::count();
        $menucount = Menu::count(); 

        return view('admin_dashboard', compact('chartData', 'chartLabels', 'usercount', 'menucount'));
    }

    // Manage User
    public function showManage() {
        // Check Role
        if (!session('user') || session('user')->role !== 'Admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $users = User::all(); 

        return view('manage_user', compact('users')); 
    }

    // Delete User
    public function destroy($id) {
        $user = User::find($id);

        // Security Check
        if ($id == session('user')->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account!');
        }

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Record deleted successfully!');
        }

        return redirect()->back()->with('error', 'User not found!');
    }

    // Store User
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmpassword' => 'required|same:password', 
            'gender' => 'required'
            ], [
                'confirmpassword.same' => 'The password confirmation does not match.',
                'email.unique' => 'This email is already registered.',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'role' => $request->role,
                'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    //  Update User
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'status' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    // Admin Profile Page
    public function profile() {
        return view('admin_profile');
    }

    // Admin Update Information (Name, Email, Password)
    public function updateProfile(Request $request) {
        $user = User::find(session('user')->id);

        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'new_password' => 'nullable|confirmed',
        ]);

        // Update fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();
        session(['user' => $user]);
        return back()->with('success', 'Profile information updated!');
    }

    // Admin Profile Upload
    public function uploadPhoto(Request $request) {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(session('user')->id);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Move File
            $file->move(public_path('images/profile_pics'), $filename);
            $user->profile_pic = $filename;
            $user->save();

            session(['user' => $user]);
            return back()->with('success', 'Profile picture updated successfully!');
        }

        return back()->with('error', 'No file selected.');
    }

    // User Dashboard
    public function user_dashboard() {
        if (!session('user')) {
            return redirect()->route('login');
        }
        return view('user_dashboard');
    }

    // User Profile Page
    public function userprofile() {
        if (!session('user')) {
            return redirect()->route('login');
        }
        return view('user_profile');
    }

    // User Update Information (Name, Email, Password)
    public function userupdateProfile(Request $request) {
        $user = User::find(session('user')->id);

        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'new_password' => 'nullable|confirmed',
            'gender' => 'required|in:Male,Female',
        ]);

        // Update Fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();
        session(['user' => $user]);
        return back()->with('success', 'Profile information updated!');
    }

    // User Profile Upload
    public function useruploadPhoto(Request $request) {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(session('user')->id);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Move File
            $file->move(public_path('images/profile_pics'), $filename);
            $user->profile_pic = $filename;
            $user->save();

            session(['user' => $user]);
            return back()->with('success', 'Profile picture updated successfully!');
        }

        return back()->with('error', 'No file selected.');
    }
}