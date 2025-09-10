<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }
    public function store()
    {
        try {
            $validate = request()->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
            ]);
            $validate['role'] = 'user';
            User::create([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password']),
                'role' => $validate['role'],
            ]);
            return redirect()->route('users.index')->with('success', 'User created successfully!');
        } catch (ValidationException $e) {
            return redirect()
                ->route('users.create')
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            return redirect()
                ->route('users.index')
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        try{
            $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',
            'status' => 'required',
        ]);
        if ($validate['password']) {
            $user->update([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'status' => $validate['status'],
                'password' => Hash::make($validate['password']),

            ]);
        } else {
            $user->update([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'status' => $validate['status'],
            ]);
        }
        } catch (ValidationException $e) {
            return redirect()
                ->route('users.edit', $user->id)
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            return redirect()
                ->route('users.edit', $user->id)
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
