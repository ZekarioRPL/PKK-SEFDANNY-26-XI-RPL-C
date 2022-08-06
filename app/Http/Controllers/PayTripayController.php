<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class PayTripayController extends Controller
{
    public function history()
    {
        return view('payment.history', [
            'title' => "History",
            'historys' => Tiket::latest()->get()
        ]);
    }
    public function detail($reference)
    {
        // dd($reference);
        return view('payment.detail', [
            'title' => 'Detail Transaction',
            'detail' => Tiket::where('reference', $reference)->first()
        ]);
    }
}
