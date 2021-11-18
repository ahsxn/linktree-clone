<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $user->load('links');
        
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        return view('users.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'background_colour' => 'required|size:7|starts_with:#',
            'text_colour'       => 'required|size:7|starts_with:#'
        ]);

        $request->user()->update($validated);

        return redirect()->route('user.edit')->with('success', 'Changes saved!');
    }
}
