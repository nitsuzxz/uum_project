<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = User::where('is_admin', false);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('no_staf', 'like', '%' . $searchTerm . '%');
            });
        }

        $listOfStaff = $query->paginate(10);

        return view('Admin.dashboard', compact('listOfStaff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_staf' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'jawatan' => 'required',
            'jantina' => 'required|in:L,P',
            'no_telefon_mobil' => 'required',
            'no_telefon_pejabat' => 'nullable',
            'alamat_pejabat' => 'nullable',
        ]);

        $staff = new User();
        $staff->no_staf = $validatedData['no_staf'];
        $staff->nama = $validatedData['nama'];
        $staff->email = $validatedData['email'];
        $staff->jawatan = $validatedData['jawatan'];
        $staff->jantina = $validatedData['jantina'];
        $staff->no_telefon_mobil = $validatedData['no_telefon_mobil'];
        $staff->no_telefon_pejabat = $validatedData['no_telefon_pejabat'];
        $staff->alamat_pejabat = $validatedData['alamat_pejabat'];
        $staff->password = Hash::make($validatedData['email']);
        $staff->save();

        return redirect()->route('admin.index')->with('success', 'Staff berjaya ditambah.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {

        try {
            $decryptedId = Crypt::decrypt($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->route('admin.index')->with('error', 'Invalid access.');
        }

        $staff = User::findOrFail($decryptedId);
        return view('Admin.detail', compact('staff'));
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
        return view('Admin.edit', compact('staff'));
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

        return redirect()->route('admin.index')->with('success', 'Staff berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect()->route('admin.index')->with('success', 'Staff berjaya dihapuskan.');
    }
}
