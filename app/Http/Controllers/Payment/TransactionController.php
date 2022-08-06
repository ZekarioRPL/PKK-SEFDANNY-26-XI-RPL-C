<?php

namespace App\Http\Controllers\Payment;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use App\Models\Bioskop;
use App\Models\Tiket;

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
        $bioskop = Bioskop::find($request->bioskop_id);
        $tripay = new TripayController;
        $transaction = $tripay->requestTransaction($method, $film);

        Tiket::create([
            'user_id' => auth()->user()->id,
            'film_id' => $film->id,
            'bioskop_id' => $bioskop->id,
            'kodeKursi' => 'kosong',
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'amount' => $transaction->amount,
            'status' => $transaction->status,
            'tanggalPembelian' => '2022-12-11',
        ]);
        return redirect()->route('transaction.show', [
            'reference' => $transaction->reference,
        ]);
    }
}
