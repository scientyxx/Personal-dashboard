<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    // Fungsi untuk menampilkan halaman pengeditan profil
    public function edit()
    {
        $user = User::find(1); // Contoh pengambilan data user (ganti dengan logika sesuai kebutuhan)

        return view('profile')->with('user', $user);
    }


    public function update(Request $request)
    {
        // Lakukan validasi dan logika yang diperlukan untuk memperbarui data profil

        // Contoh penggunaan $request untuk mengambil data dari form
        $name = $request->input('user_name');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $tanggal_lahir = Carbon::parse($request->input('tanggal_lahir'));
        $no_tlp = $request->input('no_tlp');

        // Lakukan pembaruan data pada tabel user sesuai dengan kebutuhan Anda
        // Misalnya, jika Anda ingin memperbarui nama, email, alamat, tanggal lahir, dan nomor telepon pengguna:
        $user = User::find(1); // Ganti 1 dengan id pengguna yang sesuai
        $user->name = $name;
        $user->email = $email;
        $user->alamat = $alamat;
        $user->tanggal_lahir = $tanggal_lahir;
        $user->no_tlp = $no_tlp;
        $user->save();

        // Setelah pembaruan berhasil dilakukan, arahkan pengguna ke halaman task.blade.php
        return redirect()->route('task.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
