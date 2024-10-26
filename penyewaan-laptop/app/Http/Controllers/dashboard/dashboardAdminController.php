<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Loan;
use Illuminate\Http\Request;

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
        ]);

        Unit::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'status' => 'Available',
            'price' => $request->price,
            'category_id' => $request->category_id

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
        ]);
    
        $units = Unit::findOrFail($id);
        $units->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status ?? 'Available',
        ]);
    
        return redirect()->route('dashboardUnit')->with('success', 'Unit updated successfully.');
    }    
    
    function deleteUnit($id){
        $units = Unit::find($id);
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
