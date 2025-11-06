<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "profile";
        $user = Auth::user();
        $userDetail = Auth::user()->userDetail;
        return view('profile.index', compact('title', 'user', 'userDetail'));
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {

            alert()->error('yeah, wrong password!');
            return back();
        };
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        alert()->success('Success', 'The change password success!');
        return redirect()->to('profile');
    }
    public function changeProfile(Request $request)
    {
        $user = Auth::user();
        $photoPath = "";
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($user->userDetail && $user->userDetail->photo){
                File::delete(public_path('storage/' . $user->userDetail->photo));
            }
            $photoPath = $photo->store('profiles','public');
        }

        try {
            UserDetail::upsert(
                [
                    [
                        'user_id'  => $user->id,
                        'about'    => $request->about,
                        'company'  => $request->company,
                        'phone'    => $request->phone,
                        'address'  => $request->address,
                        'job'      => $request->job,
                        'photo'    => $photoPath ?? ($user->userDetail->photo ?? '')
                    ],
                ],
                ['user_id'],
                ['phone', 'about', 'company', 'address', 'job', 'photo']
            );
            alert()->success('success', 'Edit Profile Success');
            return redirect()->to('profile');
        } catch (\Throwable $th) {
            alert()->error('error', 'YAH ERROR', $th->getMessage());
            return redirect()->to('profile');
        }
        // Upsert : jika datanya belum ada maka insert, klo ada maka update

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
