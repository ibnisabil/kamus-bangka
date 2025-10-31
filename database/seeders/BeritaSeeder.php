<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita; // <-- Import Model Berita
use Illuminate\Support\Facades\DB; // <-- Import DB
use Illuminate\Support\Str; // <-- Import Str untuk membuat slug

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kosongkan tabel beritas terlebih dahulu
        DB::table('beritas')->truncate();

        // 2. Siapkan data berita dalam array
        $beritas_data = [
            [
                'judul' => 'Pesona Tersembunyi Pantai Parai Tenggiri',
                'kategori' => 'DESTINASI',
                'gambar' => 'https://via.placeholder.com/800x500/3B82F6/ffffff?text=Pantai+Parai',
                'excerpt' => 'Temukan keindahan formasi batu granit raksasa dan air laut yang jernih di salah satu pantai ikonik Bangka.',
                'isi_lengkap' => '<p>Pantai Parai Tenggiri bukan hanya sekadar pantai, tapi sebuah karya seni alam. Terletak di Sungailiat, pantai ini menawarkan pemandangan unik yang tidak akan Anda temukan di tempat lain.</p><p>Formasi batu granit raksasa tersebar di sepanjang bibir pantai, menciptakan kolam-kolam alami kecil saat air surut. Airnya yang jernih berwarna biru kehijauan sangat cocok untuk berenang dan snorkeling.</p><p>Fasilitas di pantai ini juga sangat lengkap, mulai dari resort, restoran, hingga berbagai wahana air. Ini adalah destinasi wajib bagi siapa saja yang berkunjung ke Pulau Bangka.</p>',
            ],
            [
                'judul' => 'Wajib Coba: 5 Kuliner Khas Bangka yang Menggugah Selera',
                'kategori' => 'KULINER',
                'gambar' => 'https://via.placeholder.com/800x500/10B981/ffffff?text=Kuliner+Bangka',
                'excerpt' => 'Dari lempah kuning yang kaya rasa hingga es campur bangka yang menyegarkan, jelajahi cita rasa otentik pulau ini.',
                'isi_lengkap' => '<p>Pulau Bangka adalah surga bagi pecinta kuliner. Cita rasa otentik yang kaya akan rempah dan hasil laut segar menjadi ciri khasnya. Berikut adalah 5 makanan yang tidak boleh Anda lewatkan:</p><ol><li><strong>Lempah Kuning:</strong> Sup ikan dengan bumbu kunyit, nanas, dan cabai yang segar.</li><li><strong>Mie Koba:</strong> Mie dengan kuah kaldu ikan tenggiri yang kental dan gurih.</li><li><strong>Otak-otak:</strong> Ikan tenggiri giling yang dibungkus daun pisang dan dibakar.</li><li><strong>Martabak Bangka:</strong> Martabak manis dengan tekstur tebal dan topping melimpah.</li><li><strong>Es Campur Bangka:</strong> Es serut dengan isian kacang merah, tapai, dan alpukat yang menyegarkan.</li></ol>',
            ],
            [
                'judul' => 'Mengenal Tradisi Perang Ketupat di Bangka Barat',
                'kategori' => 'BUDAYA',
                'gambar' => 'https://via.placeholder.com/800x500/F59E0B/ffffff?text=Tradisi+Bangka',
                'excerpt' => 'Lebih dari sekadar perayaan, tradisi Perang Ketupat adalah simbol rasa syukur dan kebersamaan masyarakat.',
                'isi_lengkap' => '<p>Setiap tahun, masyarakat Desa Tempilang di Bangka Barat berkumpul untuk melaksanakan tradisi unik, yaitu Perang Ketupat. Tradisi ini merupakan bagian dari upacara adat "Nganggung" yang digelar sebagai ungkapan rasa syukur atas hasil panen laut dan darat.</p><p>Acara puncaknya adalah prosesi saling melempar ketupat antara warga di darat dan warga di perahu. Ritual ini dipercaya dapat menolak bala dan membawa berkah untuk musim tanam dan melaut berikutnya. Ini adalah tontonan budaya yang menarik bagi wisatawan.</p>',
            ],
            [
                'judul' => 'Bangka Belitung Triathlon 2025 Siap Digelar',
                'kategori' => 'EVENT',
                'gambar' => 'https://via.placeholder.com/800x500/EF4444/ffffff?text=Event+Triathlon',
                'excerpt' => 'Ajang olahraga internasional ini siap menyambut ratusan atlet dari berbagai negara untuk berkompetisi di Sungailiat.',
                'isi_lengkap' => '<p>Catat tanggalnya! Ajang olahraga bergengsi Bangka Belitung Triathlon akan kembali digelar tahun ini di kawasan Sungailiat. Ratusan atlet dari dalam dan luar negeri diperkirakan akan berpartisipasi dalam tiga cabang: renang, sepeda, dan lari.</p><p>Acara ini tidak hanya menjadi ajang kompetisi, tetapi juga menjadi sarana promosi pariwisata yang efektif. Para atlet akan disuguhkan pemandangan pantai yang indah di sepanjang rute lomba. Pemerintah daerah berharap event ini dapat meningkatkan kunjungan wisatawan ke Pulau Bangka.</p>',
            ],
        ];

        // 3. Looping data dan buat record baru
        foreach ($beritas_data as $data) {
            Berita::create([
                'judul' => $data['judul'],
                'slug' => Str::slug($data['judul']), // Membuat slug otomatis
                'kategori' => $data['kategori'],
                'gambar' => $data['gambar'],
                'excerpt' => $data['excerpt'],
                'isi_lengkap' => $data['isi_lengkap'],
            ]);
        }
    }
}