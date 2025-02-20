<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Mendefinisikan perintah Artisan kustom dengan nama 'inspire'
Artisan::command('inspire', function () {
    // Menampilkan kutipan inspiratif dari kelas Inspiring
    $this->comment(Inspiring::quote());
})

// Menetapkan tujuan dari perintah ini, yaitu untuk menampilkan kutipan inspiratif
->purpose('Display an inspiring quote')

// Menjadwalkan agar perintah ini dijalankan setiap jam
->hourly();
