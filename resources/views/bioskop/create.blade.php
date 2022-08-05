@extends('layoutDashboard.main')
@section('container')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Insert Film</h5>
                </div>
                <div class="card-body">
                    <form action="/dbbioskop" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name Bioskop</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name Bioskop" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat...." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Telp</label>
                                    <input type="number" class="form-control" name="telp" placeholder="Telp" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required
                                        value="Mike">
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