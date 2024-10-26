<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFcontroller extends Controller
{
    public function pdfView($id)
    {
        $history = Loan::with(['user', 'unit', 'return'])
            ->where('id', $id)
            ->first();

        if (!$history) {
            return redirect()->back()->with('error', 'Loan not found.');
        }

        // Wrap the single loan in a collection to make it iterable
        $historyCollection = collect([$history]);

        $pdf = Pdf::loadView('PDF.pdf', ['history' => $historyCollection]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('History ' . $history->id . '.pdf');
    }
}