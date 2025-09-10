<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function settings()
    {
        return view('admin.settings');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function show(Admin $admin)
    {
        $users = Admin::findorFail($admin);
        return view('admin.profile', compact('users'));
    }
    public function changePass(Request $request, User $user)
    {
        $validate = $request->validate([
            'password' => 'required|confirmed',

        ]);
        $user->update([
            'password' => Hash::make($validate['password']),
        ]);
        return redirect('/home');
    }
    public function index()
    {
        return view('admin.admins.index', ['users' => User::all()]);
    }


    public function create()
    {
        return view('admin.admins.create');
    }
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',

            ]);
            $validate['role'] = 'admin';
            $validate['password'] = Hash::make($validate['password']);
            User::create($validate);
            return redirect('/admin/admins')->with('success', 'Admin created successfully!');
        } catch (ValidationException $e) {
            return redirect()
                ->route('admins.create')
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            return redirect()
                ->route('admins.index')
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect('/admin/admins')->with('success', 'Admin deleted successfully!');
    }

    public function edit(User $admin)
    {
        $admin = User::findOrFail($admin->id);
        return view('admin.admins.edit', compact('admin'));
    }
    public function update(Request $request, User $admin)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $admin->id,
                'password' => 'nullable|confirmed',

            ]);
            if ($validate['password']) {
                $admin->update([
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                    'password' => Hash::make($validate['password']),

                ]);
            } else {
                $admin->update([
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                ]);
            }
        } catch (ValidationException $e) {
            return redirect()
                ->route('admins.edit', $admin->id)
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            return redirect()
                ->route('admins.edit', $admin->id)
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully!');
    }

    public function adminDashboard()
    {
        $activeUsers = User::where('role', 'user')->where('status', 'active')->count();
        $activeAdmins = User::where('role', 'admin')->where('status', 'active')->count();
        return view('admin.dashboard', ['activeUsers' => $activeUsers, 'activeAdmins' => $activeAdmins]);
    }
    public function adminLogin()
    {
        return view('admin.login.adminLogin');
    }
    public function adminAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }
        abort(403, 'Incorrect Password');
    }
}
