<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Loan;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class dashboardAdminController extends Controller
{
    public function dashboardAdmin ()
    {
        return view('Dashboard.Admin.dashboard');
    }

    function dashboardUnit(){
        $units = Unit::all();
        return view('Dashboard.Admin.dashboardUnit', compact('units'));
    }
    
    function viewAddUnit(){
        return view('Dashboard.Admin.addUnit');
    }

    function addUnit(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:units',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|numeric',
            'foto_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto_product = $request->file('foto_product');
        $foto_ekstensi = $foto_product->extension();
        $foto_name = time() . '.' . $foto_ekstensi;
        $foto_product->move(public_path('img'), $foto_name);

        Unit::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'status' => 'Available',
            'price' => $request->price,
            'category_id' => $request->category_id,
            'foto_product' =>$foto_name

        ]);
        return redirect()->route('dashboardUnit')->with('success', 'Unit created successfully.');
    }

    public function viewEditUnit($id) {
    $units = Unit::findOrFail($id);
    return view('Dashboard.Admin.editUnit', compact('units'));
    }

    function updateUnit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:units,code,' . $id, // Unique except for the current unit
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'foto_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto_product = $request->file('foto_product');
        $foto_ekstensi = $foto_product->extension();
        $foto_name = time() . '.' . $foto_ekstensi;
        $foto_product->move(public_path('img'), $foto_name);
    
        $units = Unit::findOrFail($id);
        File::delete(public_path('img/' . $units->fotos_product));
        $units->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status ?? 'Available',
            'fotos_product' => $foto_name
        ]);
    
        return redirect()->route('dashboardUnit')->with('success', 'Unit updated successfully.');
    }    
    
    function deleteUnit($id){
        $units = Unit::find($id);
        File::delete(public_path('img/' . $units->fotos_product));
        $units->delete();
        return redirect(route('dashboardUnit'));
    }

    function viewLoan(){
        $loans = Loan::all();
        return view('Dashboard.Admin.loan', compact('loans'));
    }

    function approveLoan($loan_id)
    {
    $loan = Loan::find($loan_id);
    
    if ($loan && $loan->status == 'pending') {
        $loan->status = 'approved';
        $loan->save();
        
        return redirect()->route('Dashboard.Admin.loan')->with('success', 'Loan approved successfully!');
    }

    return back()->withErrors(['message' => 'Invalid loan or already processed.']);
    }

    function rejectedLoan($loan_id)
{
    $loan = Loan::find($loan_id);
    $Unit = Unit::find($loan->unit_id);
    
    if ($loan && $loan->status == 'pending') {
        $loan->status = 'rejected';
        $loan->save();

        $Unit->update(['status' => 'Available']);   

        
        return redirect()->route('Dashboard.Admin.loan')->with('success', 'Loan rejected successfully!');
    }

    return back()->withErrors(['message' => 'Invalid loan or already processed.']);
}
    
}
