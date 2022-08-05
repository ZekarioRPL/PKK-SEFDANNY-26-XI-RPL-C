@extends('layoutDashboard.main')
@section('container')
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Film</h4>
                </div>
                <div class="row ml-3 mr-3">
                    <div class="col-md-2.5">
                        <a href="/dbfilm/create"><button class="btn btn-primary btn-block">Tambah Film</button></a>
                    </div>
                    <div class="col-md-3 justify-content-end ml-auto">
                        <form action="/dbfilm">
                            <div class="input-group no-border">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                    placeholder="Search..." value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    Judul Film
                                </th>
                                <th>
                                    Jadwal Penayangan
                                </th>
                                <th>
                                    Harga Tiket
                                </th>
                                <th class="text-left">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($films as $film)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $film->name }}</td>
                                    <td>
                                        <span class="badge badge-primary p-2">{{ $film->jadwalPenayangan }}</span> <span
                                            class=""> - </span>
                                        <span class="badge badge-primary p-2">{{ $film->jadwalPenutupan }}</span>
                                    </td>
                                    <td>Rp. {{ number_format($film->harga) }}</td>
                                    <td>
                                        <form action="/film/{{ $film->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-round btn-outline-default btn-simple btn-icon no-caret ">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End - content -->
@endsection