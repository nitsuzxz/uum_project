<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Auth::user();
        return view('Staff.dashboard', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function edit(string $encryptedId)
    {
        try {
            $decryptedId = Crypt::decrypt($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->route('staff.index')->with('error', 'Invalid access.');
        }

        $staff = User::findOrFail($decryptedId);
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'no_staf' => 'required|unique:users,no_staf,' . $id,
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jawatan' => 'required',
            'jantina' => 'required|in:L,P',
            'no_telefon_mobil' => 'required',
            'no_telefon_pejabat' => 'nullable',
            'alamat_pejabat' => 'nullable',
        ]);

        $staff = User::findOrFail($id);
        $staff->no_staf = $validatedData['no_staf'];
        $staff->nama = $validatedData['nama'];
        $staff->email = $validatedData['email'];
        $staff->jawatan = $validatedData['jawatan'];
        $staff->jantina = $validatedData['jantina'];
        $staff->no_telefon_mobil = $validatedData['no_telefon_mobil'];
        $staff->no_telefon_pejabat = $validatedData['no_telefon_pejabat'];
        $staff->alamat_pejabat = $validatedData['alamat_pejabat'];

        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
