<?php

namespace App\Http\Controllers\Peminjamanan;

use App\Models\Loan;
use App\Models\Unit;
use App\Models\Category;
use App\Models\ReturnLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class loanController extends Controller
{
    public function viewPeminjaman (Request $request)
    {
        $search = $request->has('search');
        if($search){
            $Units = Unit::join('categories', 'units.category_id', '=', 'categories.id')
                    ->where('units.name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('categories.name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('units.code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('units.price', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('units.status', 'LIKE', '%' . $request->search . '%')
                    ->select('units.*') // Memilih semua kolom dari tabel units
                    ->get();
                }
        else{
            $Units = Unit::all();
        }

        return view ('AjukanPinjam.index', ["Categories" => Category::all(), "Units" => $Units]);
    }

    public function peminjaman (Request $request, $id)
    {
        $activateLoansCount = Loan::where('user_id', $id)
                                ->where('status', '!=', 'Rejected')
                                ->whereDoesntHave('return', function ($query) {
                                    $query->whereNotNull('return_date');
                                })
                                ->count();       

        if ($activateLoansCount >=2) {
            return redirect()->back()->with("Fail","Anda Telah Meminjam");
        } 
        else{
            $rules=[
                'tanggalPinjam' => 'required|date',
                'tanggalKembali' => 'required|date',
            ];
            $messages = [
                'required' => 'Kolom :attribute harus diisi.',
                'numeric' => 'Kolom :attribute harus berupa angka.',
                'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
                'after_or_equal' => 'Kolom :attribute harus sama atau setelah :date.',
                'min' => 'Kolom :attribute harus minimal :min karakter.',
            ];
            $attributes = [
                "tanggalPinjam"=>"Tanggal Pinjam",
                "tanggalKembali"=>" Tanggal Kembali",
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $borrowDate = Carbon::parse($request->input('tanggalPinjam'));
            $dueDate = Carbon::parse($request->input('tanggalKembali'));
            $daysLate = ($borrowDate->diffInDays($dueDate)) +1 ;

            $LaptopPrice = Unit::where('id', $request->unit_id)->value('price');

            
            if ($daysLate >  5) {
                return redirect()->back()->with("Fail","Anda Tidak boleh Meminjam lebih dari 5 Hari");
            }
            else{
                $inputData = Loan::create([
                    'user_id' => $id,
                    'unit_id' => $request->unit_id,
                    'borrow_date' => $request->input('tanggalPinjam'),
                    'due_date' => $request->input('tanggalKembali'),
                    'deliver_price' => $LaptopPrice * $daysLate,
                    'status' => 'Pending',
                ]);
                if($inputData){
                    $Unit = Unit::find($request->unit_id);
                    $Unit->update(['status' => 'Not Available']);
                    return redirect()->back()->with("Success","Anda Telah Berhasil Meminjam");
                }
                else{
                    return back()->with("Fail","Anda Gagal Meminjam");   
                }
            }            
            }

    }

    public function approveLoan($user_id)
    {
    $loan = Loan::find($user_id);

    if ($loan && $loan->status == 'Pending') {
        $loan->status = 'Approved'; // Mark the loan as approved
        $loan->save();

        return redirect('viewLoan')->with('success', 'Loan approved successfully!');
    }

    return back()->withErrors(['message' => 'Invalid loan request or already processed.']);
    }

    public function rejectedLoan($user_id)
    {
    $loan = Loan::find($user_id);

    if ($loan && $loan->status == 'Pending') {
        $loan->status = 'Rejected'; // Mark the loan as approved
        $loan->save();
    
        $Unit = Unit::find($loan->unit_id);
        $Unit->update(['status' => 'Available']); // Make the unit available again

        return redirect('viewLoan')->with('success', 'Loan rejected successfully!');
    }

    return back()->withErrors(['message' => 'Invalid loan request or already processed.']);
    }

    public function approveReturnLaptop($user_id)
    {
    $loan = Loan::find($user_id);

    if ($loan && $loan->status == 'Request Return') {
        $loan->status = 'Done'; // Mark the loan as approved
        $loan->save();

        $Unit = Unit::find($loan->unit_id);
        $Unit->update(['status' => 'Available']);

        return redirect('viewLoan')->with('success', 'Retrun loan successfully!');
    }

    return back()->withErrors(['message' => 'Invalid loan request or already processed.']);
    }
    public function returnLaptop ($id)
    {
        $loan = Loan::find($id);
        $loan->update(['status' => 'Request Return']);
        return redirect()->back()->with("Success","Anda Telah Request Mengembalikan");
    }

    public function viewReturnUnit($id){

        $loan = Loan::where('id', $id)->first();
        return view('Dashboard.Admin.returnUnit', compact('loan'));
    }

    public function calculatePenaltyFee(Request $request, $loan_id)
{
    // Retrieve the loan instance
    $loan = Loan::find($loan_id);
    
    if (!$loan) {
        return redirect()->back()->with('error', 'Loan not found.');
    }

    // Retrieve or create the related return record for this loan
    $returnLoan = ReturnLoan::firstOrNew(['loan_id' => $loan->id]);

    // Get the return date from the form
    $LaptopPrice=$request->input('LaptopPrice');
    $borrowDate = Carbon::parse($loan->borrow_date);
    $returnDate = Carbon::parse($request->input('returnDate'));
    $dueDate = Carbon::parse($loan->due_date);
    // Initialize penalty
    $penaltyFee = 0;
    
    // Calculate penalty if return date is after due date
    $daysLate = ($borrowDate->diffInDays($returnDate)) +1;
    if ($daysLate > 5)  {
        $penaltyFee = ($daysLate * 10000) - (5 * 10000);
    }

    // Update return loan record
    $returnLoan->return_date = $returnDate;
    $returnLoan->penalty_fee = $penaltyFee;
    $returnLoan->admin_id = session('loginAdmin');
    $returnLoan->save();

    // Update loan status
    $loan->status = 'returned';
    $loan->save();
    $units= $request->input('unit');
    $unit = Unit::find($units);
    $unit->update(['status' => 'Available']);

    $loan->update(['deliver_price' => $daysLate * $LaptopPrice]);

    return redirect('/viewLoan')->with(
        'success', 
        'Loan returned successfully with a penalty of Rp ' . number_format($penaltyFee)
    );
}

    

}
