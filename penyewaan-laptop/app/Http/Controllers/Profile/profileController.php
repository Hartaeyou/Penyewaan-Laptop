<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\AuthController;

class profileController extends Controller
{
    public function updateUser (Request $request, $id)
    {
    $rules = [
            'Name' => 'required|string|max:255',
            'Phone' => 'required|numeric',
            'Address' => 'required|string|max:255',
        ];

        // Pesan kustom
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'after_or_equal' => 'Kolom :attribute harus sama atau setelah :date.',
            'min' => 'Kolom :attribute harus minimal :min karakter.',
        ];

        $attributes = [
            
            "Name"=>"Nama",
            "Phone"=>"Nomor Handphone",
            "Address"=>"Alamat",
        ];

        // Validasi input dengan aturan dan pesan kustom
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::findOrFail($id);
        $user->name = $request->Name;
        $user->phone_number = $request->Phone;
        $user->address = $request->Address;
    
    
        $user->save();

        return redirect()->back()->with('Success', 'Profile updated successfully.');

    }

    public function deleteUser ($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->action([AuthController::class, 'logout'])->with("Success","Anda Telah Berhasil Delete Profil");
    }
}
