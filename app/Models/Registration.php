<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'no_pendaftaran';

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama_id',
        'asal_sekolah',
        'nilai_ind',
        'nilai_ipa',
        'nilai_mtk'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date:Y-m-d',
    ];

    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required|date_format:Y-m-d',
        'jenis_kelamin' => 'required',
        'asal_sekolah' => 'required',
        'agama_id' => 'required|in:1,2,3,4,5,6',
        'nilai_ind' => 'required|numeric|max:10',
        'nilai_ipa' => 'required|numeric|max:10',
        'nilai_mtk' => 'required|numeric|max:10',
    ];

    public function getAgama()
    {
        $agamaList = $this->listAgama();
        return isset($agamaList[$this->agama_id]) ? $agamaList[$this->agama_id] : 'Tidak diketahui';
    }

    public static function listAgama()
    {
        return [
            1 => 'Islam',
            2 => 'Katholik',
            3 => 'Protestan',
            4 => 'Hindu',
            5 => 'Budha',
            6 => 'Konghucu',
        ];
    }
}
