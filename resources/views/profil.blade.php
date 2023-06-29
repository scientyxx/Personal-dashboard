@extends('welcome')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Profil</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('simpan_task') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Alamat" value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Nomor Telepon" value="{{ $user->phone }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
