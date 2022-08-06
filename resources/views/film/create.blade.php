@extends('layoutDashboard.main')
@section('container')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Insert</h5>
                </div>
                <div class="card-body">
                    <form action="/dbfilm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name Film</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name Film" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Tanggal Penayangan</label>
                                    <input type="date" class="form-control" name="tanggalPenayangan"
                                        placeholder="Tanggal Penayangan" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Tanggal Penutupan</label>
                                    <input type="date" name="tanggalPenutupan" class="form-control"
                                        placeholder="Tanggal Penutupan" value="Mike" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="text" class="form-control" name="rating" placeholder="Rating">
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <select class="form-control" name="rating" data-placeholder="Choose one.." required>
                                        <option></option>
                                        <option value="SU">SU (Semua Umur)</option>
                                        <option value="R">R (Remaja)</option>
                                        <option value="D">D (Dewasa)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input type="text" class="form-control" name="genre" placeholder="Genre" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="number" class="form-control" name="duration" placeholder="Minutes" required>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Duration" required>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Jam Penayangan</label>
                                    <input type="time" class="form-control" name="jamPenayangan" placeholder="Duration" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea rows="4" cols="80" class="form-control" name="deskripsi"
                                        placeholder="Here can be your description" value="Mike" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File</label>
                            <div class="col-md-10">
                                <input class="form-control" name="file" type="file" id="formFile" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-7 ml-auto">
                                <button type="submit" class="btn btn-primary">Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection