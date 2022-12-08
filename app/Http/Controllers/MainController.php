<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Redirect;

use App\Models\Certificate;

class MainController extends Controller
{
    public function playgrounds(){
        
    }
    public function index(){
        $certificate_data = Certificate::all();
        return view('ajax/viewdata', compact('certificate_data'));
    }

    public function store(Request $request){
        $certificate = new Certificate;

        $certificate -> nama_peserta = $request -> nama_peserta;
        $certificate -> materi = $request -> materi;

        $periode = [
            $request -> dari_kapan,
            $request -> sampai_kapan,
        ];
        $certificate -> periode = $periode = implode(',', $periode);

        $certificate->save();
    }

    public function edit($id){
        $show_update_data = Certificate::find($id);
        $periodes = explode(',', $show_update_data -> periode);
        $sampai_kapan = explode('/', $periodes[1]);
        $sampai_kapanx = $sampai_kapan[2] . '-' . $sampai_kapan[0] . '-' . $sampai_kapan[1];

        $dari_kapan = explode('/', $periodes[0]);
        $dari_kapanx = $dari_kapan[2] . '-' . $dari_kapan[0] . '-' . $dari_kapan[1];

        return view('ajax/editcertificate')-> with([
            'show_update_data' => $show_update_data,
            'sampai_kapanx' => $sampai_kapanx,
            'dari_kapanx' => $dari_kapanx
        ]);
    }
    public function update($id){
        $update_data = Certificate::find($id);

        $update_data -> nama_peserta = $_GET['nama_peserta'];
        $update_data -> materi = $_GET['materi'];

        $periode = [
            $_GET['dari_kapan'],
            $_GET['sampai_kapan'],
        ];
        $update_data -> periode = $periode = implode(',', $periode);

        $update_data->update();
    }

    public function destroy($id){
        $data = Certificate::find($id);
        $data -> delete();
    }
}
