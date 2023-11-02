<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function tes()
    {

        try {
            // Coba mendapatkan koneksi ke database
            DB::connection()->getPdo();
        
            // Jika tidak ada pengecualian yang dilempar, itu berarti koneksi berhasil
            echo "Koneksi database berhasil!";
        } catch (\Exception $e) {
            // Tangani jika ada kesalahan
            echo "Koneksi database gagal: " . $e->getMessage();
        }
    }

}
