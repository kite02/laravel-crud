<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;


class UsersController extends Controller
{

    public function index()
    {

        return view('users.index', [
            'users' => User::latest()->paginate(10)
        ]);
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return back()->with('success', 'User created');

    }

    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {



        $user->save();

        return back()->with('success', 'profile-updated');
    }

    public function destroy($id)
    {

        User::find($id)->delete();

        return ack()->with('success', 'User deleted');
    }
}
