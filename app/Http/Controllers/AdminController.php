<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('backend.index');
    }

    public function profile()
    {
        return view('backend.profile');
    }
    public function settings()
    {
        return view('backend.settings');
    }
    public function update_profile(Request $request){
        $request->validate([
            'photo' => 'required|image|max:2048', // Maksimal 2MB
        ]);

        $user = User::find(auth()->user()->id);
        if($request->has('name')){
            $user->name = $request->name;

        }
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/photos', $filename);

            // Simpan nama file ke database (contoh menggunakan model User)
            $user->photo_path = $path;

        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
