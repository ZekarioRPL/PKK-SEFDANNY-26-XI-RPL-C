<?php

namespace App\Http\Controllers\Payment;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use App\Models\Bioskop;

class TransactionController extends Controller
{
    public function show($reference)
    {
        $tripay = new TripayController;
        $detail = $tripay->detailTransaction($reference);
        return view('payment.pay', [
            'title' => "Payment",
            'detail' => $detail
        ]);
    }
    public function store(Request $request)     
    {
        // dd( $request->all());
        $film = film::find($request->film_id);
        $method = $request->code_id;
        // $bioskop = Bioskop::find($request->bioskop_id);
        $tripay = new TripayController;
        $transaction = $tripay->requestTransaction($method, $film);
        return redirect()->route('transaction.show', [
            'reference' => $transaction->reference,
        ]);
    }
}
