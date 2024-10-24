<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class profileController extends Controller
{
    public function updateUser (Request $request, $id)
    {
        $validateData = $request->validate([
            'Name' => 'required',
            'Phone' => 'required',
            'Address' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validateData['Name'],
            'phone_number' => $validateData['Phone'],
            'address' => $validateData['Address'],
        ]);
        return redirect('/dashboardUser')->with("Success","Anda Telah Berhasil Update Profil");

    }

    public function deleteUser ($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->action([AuthController::class, 'logout'])->with("Success","Anda Telah Berhasil Delete Profil");
    }
}
