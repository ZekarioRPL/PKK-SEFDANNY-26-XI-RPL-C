<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Film;
use App\Models\User;
use App\Models\Bioskop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBioskopRequest;
use App\Http\Requests\UpdateBioskopRequest;

class DataController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function home()
    {
        $search = User::latest();
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search')  . '%')
                    ->orWhere('email', 'like', '%' . request('search')  . '%');
        }
        return view('beranda.index', [
            'title' => "Home",
            'films' => Film::latest()->paginate(6)->all(),
            'tayang' => $search->get(),
        ]);
    }
    public function tayangSekarang()
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');

        return view('tayangSekarang.index', [
            'title' => "Tayang Sekarang",
            'films' => Film::latest()->get(),
            'tanggal' => $tanggal
        ]);
    }
    public function segeraHadir()
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        return view('segeraHadir.index', [
            'title' => "Segera Hadir",
            'films' => Film::where('jadwalPenayangan', '>', $tanggal, 'AND', 'jadwalPenutupan', '<=', $tanggal)->latest()->get(),
            'tanggal' => $tanggal
        ]);
    }
    public function bioskop()
    {
        return view('bioskop.index', [
            'title' => "BIOSKOP",
            'bioskops' => Bioskop::latest()->get(),
        ]);
    }

    public function index()
    {
        $search = User::latest();
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search')  . '%')
                    ->orWhere('email', 'like', '%' . request('search')  . '%');
        }
        return view('dashboard.dbdata', [
            'title' => "Pengguna",
            'users' => $search->get()
        ]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreBioskopRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreBioskopRequest $request)
    {
        //
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
    public function showHome(Bioskop $bioskop, $id)
    {
        return view('beranda.show', [
            'title' => "Show",
            'film' => Film::where('id', $id)->first(),
            'bioskops' => Bioskop::latest()->get()
        ]);

    }
    public function showBioskop(Bioskop $bioskop, $id)
    {
        return view('bioskop.show', [
            'title' => "Show",
            'bioskop' => Bioskop::where('id', $id)->first()
        ]);

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
        //
    }
}
