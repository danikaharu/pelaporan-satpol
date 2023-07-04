<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $survey = Survey::create(['name' => 'Survey', 'settings' => ['accept-guest-entries' => true]]);

        $one = $survey->sections()->create(['name' => 'Form Biodata']);

        $one->questions()->create([
            'content' => 'Nama Lengkap',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $one->questions()->create([
            'content' => 'Tinggi Badan',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $one->questions()->create([
            'content' => 'Berat Badan',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $one->questions()->create([
            'content' => 'Hobi Anda',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $one->questions()->create([
            'content' => 'Pekerjaan',
            'type' => 'select',
            'options' => ['Siswa', 'Guru', 'Pegawai Sekolah'],
            'rules' => ['required', 'in:Siswa,Guru,Pegawai Sekolah']
        ]);

        $one->questions()->create([
            'content' => 'Pas Foto',
            'type' => 'file',
            'rules' => ['required', 'image', 'max:1500']
        ]);

        $two = $survey->sections()->create(['name' => 'Form Kuisioner']);

        $two->questions()->create([
            'content' => 'Apakah Anda sering berpartisipasi dalam kegiatan olahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $two->questions()->create([
            'content' => 'Apa jenis olahraga yang Anda minati?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $two->questions()->create([
            'content' => 'Berapa kali dalam seminggu Anda berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda lebih suka olahraga individu atau tim?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa manfaat yang Anda rasakan setelah berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Bagaimana Anda memilih jenis olahraga yang ingin Anda ikuti?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda memiliki olahragawan favorit? Jika ya, siapa?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda pernah berpartisipasi dalam kompetisi olahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa pendapat Anda tentang olahraga ekstrem?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa faktor yang mempengaruhi Anda dalam memilih olahraga tertentu?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda lebih suka berolahraga di dalam ruangan atau di luar ruangan?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda merasa olahraga memberikan manfaat bagi kesehatan mental Anda?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa jenis olahraga yang ingin Anda coba di masa depan?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa jenis olahraga yang menurut Anda paling menyenangkan?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda lebih suka olahraga ringan atau olahraga yang intens?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa tujuan olahraga Anda? (Misalnya: meningkatkan kebugaran, menurunkan berat badan, membangun otot, dll.)',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda menggunakan alat atau peralatan khusus saat berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda lebih suka olahraga dalam kelompok atau sendiri?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa jenis olahraga yang ingin Anda pelajari lebih lanjut?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda pernah mengalami cedera saat berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa hal yang paling menarik bagi Anda dalam berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda mengikuti program pelatihan khusus saat berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda lebih suka bermain olahraga kompetitif atau olahraga rekreasi?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa jenis olahraga yang paling sulit menurut Anda?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda merasa olahraga membantu dalam membangun hubungan sosial?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda pernah mencoba olahraga baru yang belum pernah Anda lakukan sebelumnya?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apa yang membuat Anda termotivasi untuk tetap aktif dalam berolahraga?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda merasa olahraga memengaruhi kualitas tidur Anda?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda merasa adanya perbedaan antara olahraga profesional dan olahraga amatir?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
        $two->questions()->create([
            'content' => 'Apakah Anda ingin berpartisipasi dalam Olimpiade atau kompetisi olahraga internasional lainnya?',
            'type' => 'text',
            'rules' => ['required', 'string', 'min:3', 'max:255']
        ]);
    }
}
