<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelapor',
        'nomor_hp',
        'kabupaten',
        'kecamatan',
        'tanggal_kegiatan',
        'jenis_kegiatan',
        'jenis_pelanggaran',
        'jenis_sanksi',
        'jumlah_pelanggar',
        'sanksi_administratif',
        'denda_administratif',
        'sanksi_pidana',
        'denda_pidana',
        'lama_kurungan',
        'foto_dokumentasi',
    ];

    protected $casts = [
        'jenis_pelanggaran' => 'array',
        'sanksi_administratif' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentation()
    {
        return $this->hasMany(Documentation::class);
    }

    public function offender()
    {
        return $this->hasMany(Offender::class);
    }

    public function kecamatan()
    {
        if ($this->kecamatan == 1) {
            return 'Kabila';
        } elseif ($this->kecamatan == 2) {
            return 'Bone';
        } elseif ($this->kecamatan == 3) {
            return 'Bone Raya';
        } elseif ($this->kecamatan == 4) {
            return 'Bone Pantai';
        } elseif ($this->kecamatan == 5) {
            return 'Botupingge';
        } elseif ($this->kecamatan == 6) {
            return 'Bulango Selatan';
        } elseif ($this->kecamatan == 7) {
            return 'Bulango Timur';
        } elseif ($this->kecamatan == 8) {
            return 'Bulango Ulu';
        } elseif ($this->kecamatan == 9) {
            return 'Bulango Utara';
        } elseif ($this->kecamatan == 10) {
            return 'Bulawa';
        } elseif ($this->kecamatan == 11) {
            return 'Kabila Bone';
        } elseif ($this->kecamatan == 12) {
            return 'Pinogu';
        } elseif ($this->kecamatan == 13) {
            return 'Suwawa';
        } elseif ($this->kecamatan == 14) {
            return 'Suwawa Selatan';
        } elseif ($this->kecamatan == 15) {
            return 'Suwawa Tengah';
        } elseif ($this->kecamatan == 16) {
            return 'Suwawa Timur';
        } elseif ($this->kecamatan == 17) {
            return 'Tapa';
        } elseif ($this->kecamatan == 18) {
            return 'Tilongkabila';
        } else {
            return 'Tidak Diketahui';
        }
    }

    public function jenis_sanksi()
    {
        if ($this->jenis_sanksi() == 1) {
            return 'Pidana';
        } else {
            return 'Adminstratif';
        }
    }

    public function sanksi_pidana()
    {
        if ($this->sanksi_pidana == 1) {
            return 'Denda';
        } else {
            return 'Kurungan';
        }
    }
}
