<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Certificate;
use PDF;
use DB;

class PdfController extends Controller
{
    public function dateConvert($bulan){
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',                                       
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $result = Carbon::createFromFormat('m/d/Y', $bulan);
        foreach($namaBulan as $bulan => $key){
            if($bulan == $result->month){
                return $key . ' ' . $result->day . ',' . ' ' . $result->year;
            }
        }
    }
    
    public function generatePDF(){
        $url = explode('/', url()->current());
        $id = end($url);

        $nama_peserta = DB::table('certificates')->where('id', $id)->pluck('nama_peserta');
        $materi = DB::table('certificates')->where('id', $id)->pluck('materi');
        $periode = DB::table('certificates')->where('id', $id)->pluck('periode');

        $periode = explode(',', $periode[0]);
        $dari_kapan = $this->dateConvert($periode[0]);
        $sampai_kapan = $this->dateConvert($periode[1]);

        $pdf = PDF::loadView('pdf', compact([
            'nama_peserta',
            'materi',
            'dari_kapan',
            'sampai_kapan',
            'id'
        ]));
        $pdf -> setPaper('A4', 'landscape');
        $pdf -> render();
        $pdf -> setWarnings(false)->output();
        
        $judul = json_decode($nama_peserta);
        return $pdf->stream('Peserta_' . $id . '_' . $judul[0] . '.pdf');
    }
}
