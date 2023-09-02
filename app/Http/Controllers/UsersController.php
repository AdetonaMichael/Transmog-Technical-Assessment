<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, User $user){
        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'profpix' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('profpix')) {
            $image = $request->profpix->store('profpix');
            $user->profpix = $image;
        }

        $user->firstname = $validatedData['firstname'];
        $user->lastname = $validatedData['lastname'];
        $user->middle_name = $validatedData['middle_name'];
        $user->save();

        session()->flash('success', 'Profile Updated Successfully...');
        return redirect()->back();
    }

}
