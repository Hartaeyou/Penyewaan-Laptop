<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewLoginUser ()
    {
        return view('Auth.User.login');
    }

    public function viewRegisterUser ()
    {
        return view('Auth.User.register');
    }

    public function viewLoginAdmin ()
    {
        return view('Auth.Admin.login');
    }

    public function registerUser (Request $request)
    {   

        $rules = [
            'email'=>'required | unique:users',
            'password'=>'required|max:12|min:8',
            'Name' => 'required',
            'Phone' => 'required',
            'Address' => 'required',
        ];

        // Pesan kustom
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'after_or_equal' => 'Kolom :attribute harus sama atau setelah :date.',
            'min' => 'Kolom :attribute harus minimal :min karakter.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
        ];

        $attributes = [
            
            "email"=>"Email",
            "password"=>"Password",
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
        
        $inputData = User::create([
            'name' => $request->Name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->Phone,
            'address' => $request->Address,
        ]);
        if($inputData){
            return redirect('/')->with("Success","Anda Telah Berhasil Registrasi, Silahkan Login");
        }
        else{
            return back()->with("Fail","Anda Gagal Registrasi");   
        }
    }

    function loginUser (Request $request){
        $validateData = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            $request->session()->put('loginUser', Auth::user()->id); 
            return redirect()->intended('/dashboardUser')->with("Success","Anda Berhasil Login");
        }
        else{
            return back()->with("Fail","Email atau Password Salah");
        }
    }

    function loginAdmin(Request $request){
        $validateData = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::guard('admin')->attempt($validateData)){
            $request->session()->regenerate();
            $request->session()->put('loginAdmin', Auth::guard('admin')->user()->id);   
            return redirect()->intended('/dashboardAdmin')->with("Success","Anda Berhasil Login");
            
        }
        else{
            return back()->with("Fail","Email atau Password Salah");
        }
    }

    public function logout(){
        if (Session::has("loginUser")){           
            Session::pull("loginUser");
            return redirect("/");
        }
        else{
            Session::pull("loginAdmin");
            return redirect("/admin");
        }
    }
    

}
