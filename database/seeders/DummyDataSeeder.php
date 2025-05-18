<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data
        DB::table('sliders')->truncate();
        DB::table('portfolios')->truncate();
        DB::table('about_mes')->truncate();
        DB::table('sources')->truncate();
        DB::table('guestbooks')->truncate();
        DB::table('complaints')->truncate();
        DB::table('videos')->truncate();

        // Add sliders
        $this->seedSliders();
        
        // Add portfolios
        $this->seedPortfolios();
        
        // Add about me
        $this->seedAboutMe();
        
        // Add sources
        $this->seedSources();
        
        // Add guestbooks
        $this->seedGuestbooks();
        
        // Add complaints
        $this->seedComplaints();
        
        // Add videos
        $this->seedVideos();
    }

    private function seedSliders()
    {
        $sliders = [
            [
                'image' => 'import/assets/img/placeholder.php?width=1200&height=600&text=Selamat Datang di PPID Dispora Jabar&type=slider',
                'title' => 'Selamat Datang di PPID Dispora Jabar',
                'subtitle' => 'Pejabat Pengelola Informasi dan Dokumentasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'import/assets/img/placeholder.php?width=1200&height=600&text=Informasi Publik Transparan&type=slider',
                'title' => 'Informasi Publik Transparan',
                'subtitle' => 'Akses Informasi Mudah dan Cepat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'import/assets/img/placeholder.php?width=1200&height=600&text=Layanan Informasi Publik&type=slider',
                'title' => 'Layanan Informasi Publik',
                'subtitle' => 'Melayani Dengan Sepenuh Hati',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('sliders')->insert($sliders);
    }

    private function seedPortfolios()
    {
        $portfolios = [
            [
                'title' => 'Kegiatan Pemuda Jabar',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Kegiatan Pemuda Jabar&type=portfolio',
                'category' => 'Pemuda',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kompetisi Olahraga Daerah',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Kompetisi Olahraga Daerah&type=portfolio',
                'category' => 'Olahraga',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pelatihan Kepemimpinan',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Pelatihan Kepemimpinan&type=portfolio',
                'category' => 'Pemuda',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Turnamen Bola Voli',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Turnamen Bola Voli&type=portfolio',
                'category' => 'Olahraga',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Workshop Wirausaha Muda',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Workshop Wirausaha Muda&type=portfolio',
                'category' => 'Pemuda',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kejuaraan Renang Tingkat Provinsi',
                'image' => 'import/assets/img/placeholder.php?width=800&height=600&text=Kejuaraan Renang&type=portfolio',
                'category' => 'Olahraga',
                'link' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('portfolios')->insert($portfolios);
    }

    private function seedAboutMe()
    {
        $aboutMe = [
            'content' => '<p>PPID Dispora Jabar adalah Pejabat Pengelola Informasi dan Dokumentasi di lingkungan Dinas Pemuda dan Olahraga Provinsi Jawa Barat. Kami berkomitmen untuk memberikan layanan informasi publik yang transparan, akuntabel, dan mudah diakses oleh masyarakat.</p><p>Sebagai lembaga yang menaungi bidang kepemudaan dan keolahragaan, kami memiliki berbagai program dan kegiatan yang bertujuan untuk mengembangkan potensi pemuda dan meningkatkan prestasi olahraga di Jawa Barat.</p>',
            'image' => 'import/assets/img/placeholder.php?width=600&height=400&text=About PPID Dispora Jabar&type=about',
            'link' => 'https://dispora.jabarprov.go.id',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('about_mes')->insert($aboutMe);
    }

    private function seedSources()
    {
        $sources = [
            [
                'title' => 'Informasi Kegiatan Pemuda',
                'link' => '#',
                'image' => 'import/assets/img/placeholder.php?width=400&height=300&text=Informasi Kegiatan Pemuda&type=source',
                'content' => 'Berbagai informasi terkait kegiatan kepemudaan di Jawa Barat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Jadwal Pertandingan Olahraga',
                'link' => '#',
                'image' => 'import/assets/img/placeholder.php?width=400&height=300&text=Jadwal Pertandingan&type=source',
                'content' => 'Jadwal lengkap pertandingan olahraga tingkat provinsi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Beasiswa Atlet Berprestasi',
                'link' => '#',
                'image' => 'import/assets/img/placeholder.php?width=400&height=300&text=Beasiswa Atlet&type=source',
                'content' => 'Informasi beasiswa untuk atlet berprestasi di Jawa Barat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Program Wirausaha Muda',
                'link' => '#',
                'image' => 'import/assets/img/placeholder.php?width=400&height=300&text=Program Wirausaha&type=source',
                'content' => 'Berbagai program wirausaha untuk pemuda Jawa Barat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('sources')->insert($sources);
    }

    private function seedGuestbooks()
    {
        $guestbooks = [
            [
                'name' => 'Ahmad Fauzi',
                'nomor_telepon' => '08123456789',
                'email' => 'ahmad@example.com',
                'nama_perusahaan' => 'PT Maju Bersama',
                'alamat_perusahaan' => 'Jl. Soekarno Hatta No. 123, Bandung',
                'personal_bidang' => 'Humas',
                'tujuan' => 'Kunjungan kerja dan studi banding',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'nomor_telepon' => '08789456123',
                'email' => 'siti@example.com',
                'nama_perusahaan' => 'Universitas Padjadjaran',
                'alamat_perusahaan' => 'Jl. Raya Bandung-Sumedang KM.21, Jatinangor',
                'personal_bidang' => 'Mahasiswa',
                'tujuan' => 'Penelitian untuk skripsi',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'name' => 'Budi Santoso',
                'nomor_telepon' => '08567891234',
                'email' => 'budi@example.com',
                'nama_perusahaan' => 'Media Jabar',
                'alamat_perusahaan' => 'Jl. Asia Afrika No. 45, Bandung',
                'personal_bidang' => 'Jurnalis',
                'tujuan' => 'Wawancara dan liputan kegiatan',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        DB::table('guestbooks')->insert($guestbooks);
    }

    private function seedComplaints()
    {
        $complaints = [
            [
                'title' => 'Keterlambatan Informasi Jadwal',
                'content' => 'Informasi jadwal pertandingan sering terlambat diumumkan sehingga sulit untuk merencanakan kehadiran.',
                'name' => 'Deni Kurniawan',
                'email' => 'deni@example.com',
                'status' => 'Pending',
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Kesulitan Akses Website',
                'content' => 'Website sering tidak bisa diakses pada jam-jam tertentu, mohon untuk ditingkatkan kapasitas servernya.',
                'name' => 'Rina Marlina',
                'email' => 'rina@example.com',
                'status' => 'Processed',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Kurangnya Informasi Beasiswa',
                'content' => 'Informasi mengenai beasiswa untuk atlet kurang lengkap, mohon ditambahkan detail persyaratan dan jadwal pendaftaran.',
                'name' => 'Agus Hermawan',
                'email' => 'agus@example.com',
                'status' => 'Resolved',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(8),
            ],
        ];

        DB::table('complaints')->insert($complaints);
    }

    private function seedVideos()
    {
        $videos = [
            [
                'title' => 'Profil PPID Dispora Jabar',
                'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'import/assets/img/placeholder.php?width=400&height=300&text=Profil PPID&type=video',
                'created_at' => Carbon::now()->subDays(30),
                'updated_at' => Carbon::now()->subDays(30),
            ],
            [
                'title' => 'Highlight Porprov Jabar 2023',
                'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'import/assets/img/placeholder.php?width=400&height=300&text=Highlight Porprov&type=video',
                'created_at' => Carbon::now()->subDays(25),
                'updated_at' => Carbon::now()->subDays(25),
            ],
            [
                'title' => 'Workshop Pemuda Pelopor',
                'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'import/assets/img/placeholder.php?width=400&height=300&text=Workshop Pemuda&type=video',
                'created_at' => Carbon::now()->subDays(20),
                'updated_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Pembukaan Kejurda Atletik 2023',
                'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'import/assets/img/placeholder.php?width=400&height=300&text=Kejurda Atletik&type=video',
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(15),
            ],
        ];

        DB::table('videos')->insert($videos);
    }
}
