<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Profile::where('user_id', Auth::user()->id)
            ->update([
                'phone'     => $request->phone,
                'address'   => $request->address,
                'facebook'  => $request->facebook,
                'youtube'   => $request->youtube,
                'instagram' => $request->instagram,
                'twitter'   => $request->twitter
            ]);

        return redirect()->back()->with('success', 'Berhasil input data Profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
            $image     = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName  = Str::slug('gib-aceh' . ' ' . Auth::user()->name . ' ' . date('d-m-Y') . ' ' . time()) . '.' . $extension;

            $image_url = $image->storeAs('public/profile', $fileName);

            $profile = Profile::find($id);
            $profile->photo = url(Storage::url($image_url));
            $profile->save();
        }

        return redirect()->back()->with('success', 'Berhasil mengubah photo profile');
        dd($image_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
