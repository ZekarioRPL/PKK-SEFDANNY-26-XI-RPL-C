<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Bioskop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBioskopRequest;
use App\Http\Requests\UpdateBioskopRequest;
use App\Http\Controllers\Payment\TripayController;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Bioskop::latest();
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search')  . '%');
        }
        return view('dashboard.dbbioskop', [
            'title' => "Bioskop",
            'bioskops' => $search->get()
        ]);
    }
    public function pilih(Request $request,$id)
    {
        $tripay = new TripayController();
        $channels = $tripay->getPaymentChannels();
        $bioskop = Bioskop::find($request->bioskop_id);
        return view('bioskop.pilih', [
            'title' => "Pilih Bioskop",
            'bioskop' => $bioskop->id,
            'film' => Film::where('id', $id)->first(),
            'channels' => $channels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bioskop.create', [
            'title' => "Insert",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBioskopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        // $explode = explode('.', $file->getClientOriginalName());
        // $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        // $mime = $file->getClientMimeType();
        // $filesize = $file->getSize();
        $path = $request->file('file')->storeAs('bioskop', $rename);

        $bioskop = new Bioskop;
        $bioskop->name = $request->name;
        $bioskop->alamat = $request->alamat;
        $bioskop->telp = $request->telp;
        $bioskop->email = $request->email;
        $bioskop->file = $path;
        $bioskop->save();
        

        $request->session()->flash('bisa', 'bioskop Telah Ditambahkan');
        
        return redirect('/dbbioskop');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function show(Bioskop $bioskop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function edit(Bioskop $bioskop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBioskopRequest  $request
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBioskopRequest $request, Bioskop $bioskop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bioskop $bioskop)
    {
        if($bioskop->file) {
            Storage::delete($bioskop->file);
        }

        bioskop::destroy($bioskop->id);
        // kembalikan ke halaman bioskop
        return redirect('/dbbioskop')->with('bisa', 'Selamat Data Telah DIhapus!!');
    }
}
