@extends('layoutDashboard.main')
@section('container')
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Bioskop</h4>
                </div>
                <div class="row ml-3 mr-3">
                    <div class="col-md-2.5">
                        <a href="/dbbioskop/create"><button class="btn btn-primary btn-block">Tambah</button></a>
                    </div>
                    <div class="col-md-3 justify-content-end ml-auto">
                        <form action="/dbbioskop">
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
                                    Bioskop
                                </th>
                                <th class="text-left">
                                    Alamat
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($bioskops as $bioskop)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bioskop->name }}</td>
                                    <td>{{ $bioskop->alamat }}</td>
                                    <td class="text-right">
                                        <a href="/"
                                            class="btn btn-round btn-outline-default btn-simple btn-icon no-caret "><i
                                                class="now-ui-icons education_paper"></i></a>
                                        <form action="/dbbioskop/{{ $bioskop->id }}" method="post" class="d-inline">
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