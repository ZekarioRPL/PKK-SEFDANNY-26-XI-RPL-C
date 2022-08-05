<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Film::latest();
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search')  . '%');
                    // ->orWhere('nim', 'like', '%' . request('search')  . '%')
                    // ->orWhere('jurusan', 'like', '%' . request('search')  . '%');
        }
        return view('dashboard.dashboard', [
            'title' => "Film",
            'films' => $search->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.create', [
            'title' => "Insert",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilmRequest  $request
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
        $path = $request->file('file')->storeAs('film', $rename);

        $film = new Film;
        $film->name = $request->name;
        $film->rating = $request->rating;
        $film->jadwalPenayangan = $request->tanggalPenayangan;
        $film->jadwalPenutupan = $request->tanggalPenutupan;
        $film->duration = $request->duration;
        $film->harga = $request->harga;
        $film->genre = $request->genre;
        $film->jamPenayangan = $request->jamPenayangan;
        $film->deskripsi = $request->deskripsi;
        $film->file = $path;
        $film->save();
        

        $request->session()->flash('bisa', 'Film Telah Ditambahkan');
        
        return redirect('/dbfilm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('film.update', [
            'title' => "Update",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if($film->file) {
            Storage::delete($film->file);
        }

        film::destroy($film->id);
        // kembalikan ke halaman film
        return redirect('/film')->with('bisa', 'Selamat Data Telah DIhapus!!');
    }
}
