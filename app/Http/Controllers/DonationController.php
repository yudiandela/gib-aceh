<?php

namespace App\Http\Controllers;

use App\User;
use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::orderBy('id', 'DESC')->get();
        return view('donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('donation.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ota'    => ['required'],
            'jumlah' => ['required', 'integer'],
            'type'   => ['required'],
        ]);

        Donation::create([
            'ota_id'    => $request->ota,
            'paskas_id' => Auth::user()->id,
            'jumlah'    => $request->jumlah,
            'type'      => $request->type,
        ]);

        return redirect()->route('donation')->with('success', 'Berhasil menambahkan data donation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('donation.edit', compact('donation', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'ota'    => ['required'],
            'jumlah' => ['required', 'integer'],
            'type'   => ['required']
        ]);

        $donation->ota_id = $request->ota;
        $donation->jumlah = $request->jumlah;
        $donation->type   = $request->type;
        $donation->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data Donasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
