<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Konseling;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data_jadwal = Jadwal::get();
        $data_konseling = Konseling::where('status_sesi', 'nonaktif')->get();

        return view('admin.content.jadwal', compact('data_jadwal', 'data_konseling'));
    }

    public function create(Request $request){
        $sesi = Konseling::where('konseling_id', $request->konseling_id)->first();

        $jadwal = new Jadwal;
        $jadwal->konseling_id      = $request['konseling_id'];
        $jadwal->tanggal_konseling = $request['tanggal_konseling'];

        $this->notifikasiWhatsapp($request['konseling_id'], $request['tanggal_konseling'], $sesi->jenis_sesi);

        $jadwal->save();

        return redirect()->back()->with('berhasil', 'Tambah jadwal konseling berhasil dilakukan!');
    }

    public function update(Request $request, $id){
        $sesi = Jadwal::where('jadwal_id', $id)->first();
        $jadwal = Jadwal::find($id);
        $jadwal->tanggal_konseling = $request['tanggal_konseling'];

        $this->notifikasiJadwalUlang($request['konseling_id'], $request['tanggal_konseling'], $sesi->konseling->jenis_sesi);

        $jadwal->save();

        $konseling = Konseling::find($request->konseling_id);
        $konseling->status = "konfirmasi";
        $konseling->save();

        return redirect()->back()->with('berhasil', 'Update data testimoni berhasil dilakukan!');
    }

    public function notifikasiWhatsapp($id, $tanggal_konseling, $jenis_sesi)
    {
        $konseling = Konseling::where('konseling_id', $id)->first();
        $no_wa = '+62'.(int) $konseling->pasien->no_wa;

        $userkey = '319b5ac9da61';
        $passkey = 'a87ba7edec82cd20cb0a3bef';
        $telepon = $no_wa;
        if ($jenis_sesi=="online") {
            $message = 'Pasien atas nama '.$konseling->pasien->nama.' yang terhormat, layanan konseling yang anda pilih akan dilakukan pada tanggal '.$tanggal_konseling.' pukul 20:00 melalui aplikasi. Anda bisa mengajukan jadwal ulang satu kali. Terimakasih. Klinik Laa Tachzan.';
        }
        else {
            $message = 'Pasien atas nama '.$konseling->pasien->nama.' yang terhormat, layanan konseling yang anda pilih akan dilakukan pada tanggal '.$tanggal_konseling.' pukul 09:00 di Klinik Laa Tachzan. Anda bisa mengajukan jadwal ulang satu kali. Terimakasih. Klinik Laa Tachzan.';
        }
        
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }

    public function notifikasiJadwalUlang($id, $tanggal_konseling, $jenis_sesi)
    {
        $konseling = Konseling::where('konseling_id', $id)->first();
        $no_wa = '+62'.(int) $konseling->pasien->no_wa;

        $userkey = '319b5ac9da61';
        $passkey = 'a87ba7edec82cd20cb0a3bef';
        $telepon = $no_wa;
        if ($jenis_sesi=="online") {
            $message = 'Pasien atas nama '.$konseling->pasien->nama.' yang terhormat, jadwal konseling baru akan dilakukan pada tanggal '.$tanggal_konseling.' pukul 20:00 melalui aplikasi. Silahkan masuk ke aplikasi untuk menyetujui jadwal yang dibuat. Terimakasih. Klinik Laa Tachzan.';
        }
        else {
            $message = 'Pasien atas nama '.$konseling->pasien->nama.' yang terhormat, jadwal konseling baru akan dilakukan pada tanggal '.$tanggal_konseling.' pukul 09:00 di Klinik Laa Tachzan. Silahkan masuk ke aplikasi untuk menyetujui jadwal yang dibuat. Terimakasih. Klinik Laa Tachzan.';
        }
        
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }

}
