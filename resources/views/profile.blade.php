@extends('welcome')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Projects</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('profile') }}" method="POST">
                @csrf
                @method('POST')
                <div id="form_result"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="User Name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ optional($user->tanggal_lahir)->format('Y-m-d') }}">
                    </div>



                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ $user->alamat }}">
                    </div>

                    <div class="form-group">
                        <label for="no_tlp">Nomor Telepon</label>
                        <input type="text" id="no_tlp" name="no_tlp" class="form-control" placeholder="Nomor Telepon" value="{{ $user->no_tlp }}">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
