<x-app-layout>
    @include('layouts.stepe')
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl mt-10"> Surat Pernyataan Calon Penyedia</h3>
                    <hr class="my-4 border-2 border-cyan-700">

                    @if(session('status'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('status') }}
                        </div>
                    @endif

                    @if(session('Status'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ session('Status') }}
                        </div>
                    @endif

                    <h3 class="font-semibold text-xl mt-10 text-center"> Pakta Integritas</h3>
                    <div class="w-full mt-6 px-6 py-4 bg-cyan-50 shadow-md overflow-hidden sm:rounded-lg mb-4">
                        <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>  <span class="ml-2 font-bold">Pakta Integritas</span></h1>
                          <p class="my-2">Dalam Rangka Pekerjaan Mengikuti pengadaan barang dan jasa di Perumda Danum Taka Penajam Paser Utara, dengan ini menyatakan bahwa: </p>
                          
                       
                          <ul class="mt-4 list-disc list-inside">
                        <li class="mb-3">
                           1. Tidak akan melakukan Praktek Korupsi,Kolusi, dan Nepotisme (KKN).
                        </li>
                        <li class="mb-3">
                            2. Akan dilaporkan kepada pihak yang berwajib/berwenang apabila diketahui ada indikasi KKN dalam proses pengadaan ini.
                        </li>
                        <li class="mb-3">
                           3. Akan mengikuti proses pengadaan secara bersih, transparan, dan profesional untuk memberikan  hasil kerja terbaik sesuai ketentuan peraturan perundang-undangan.
                        </li>
                        <li class="mb-3">
                            4. Bersedia memberikan segala dokumen dan informasi yang benar, masih berlaku dan sah secara hukum dari perusahaan. Bilamana dikemudian hari ditemukan bahwa dokumen-dokumen yang kami berikan tidak benar dan tidak sah, maka kami bersedia dikenakan sanksi moral, sanksi administrasi
                                , dikeluarkan dari daftar penyedia mampu (DPM) dalam sistem e-Procurement ini serta dituntut ganti rugi dan/atau pidana sesuai dengan ketentuan dan peraturan perundang-undangan yang berlaku.
                            
                         </li>
                         <li class="mb-3">
                           5. Tidak memiliki keluarga 1 (satu) Derajat di Lingkungan Perusahaan Umum Daerah Danum Taka Kabupaten Penajam paser Utara.
                            
                         </li>
                         <li class="mb-3">
                            6. Bersedia mematuhi dan melaksanakan persyaratan-persyaratan, ketentuan-ketentuan, prosedur-prosedur maupun instruksi-instruksi yang berlaku bagi Penyedia Barang/Jasa.
                           
                         </li>
                         <li class="mb-3">
                            7. Mengakui integritas proses e-Procurement Perumda Danum Taka Kabupaten Penajam paser Utara.
                           
                         </li>
                         <li class="mb-3">
                            8. Menyetujui bahwa User ID dan Password yang diperoleh merupakan representasi Penyedia Barang/Jasa dan bertanggung jawab penuh atas segala aktivitas dalam sistem dan penggunaan atas User ID dan Password akan terasosiasikan dengan segala aktivitas dalam sistem.
                           
                         </li>
                         <li class="mb-3">
                            9. Menyetujui bahwa User ID dan Password yang diperoleh hanya diberikan kepada pimpinan perusahaan dan bertanggung jawab untuk menjaga kerahasiaan User ID dan Password untuk semua aktivitas yang dilakukan dengan menggunakan User ID dan Password dimaksud.
                            
                         </li>
                         <li class="mb-3">
                                10. Membebaskan Perumda Danum Taka Penajam Paser Utara dalam hal ini Urusan Pengadaan Barang dan Jasa dari:
                            
                                <ul class="list-disc pl-8">
                                    <li class="my-3">
                                        a. Setiap penyalahgunaan User ID dan Password dari Penyedia Barang/Jasa;
                                    </li>
                                    <li class="mb-3">
                                        b. Setiap kerusakan dan/atau kerugian baik langsung maupun tidak langsung, namun tidak terbatas pada kehilangan keuntungan, kegunaan data atau kerugian-kerugian non-material yang ditimbulkan oleh:
                                        <ul class="list-disc pl-8">
                                            <li class="mb-2">1. penggunaan atau ketidakmampuan menggunakan sistem;</li>
                                            <li class="mb-2">2. penggunaan akses yang tidak sah maupun pengiriman data;</li>
                                            <li class="mb-2">3. pernyataan atau tindakan dari pihak ketiga dalam sistem;</li>
                                            <li class="mb-2">4. hal-hal yang berhubungan dengan sistem.</li>
                                        </ul>
                                    </li>
                                    <li class="mb-3">
                                        c. Setiap tuntutan dari pihak ketiga sehubungan dengan proses pengadaan dan/atau keterangan/dokumen yang dimasukkan oleh Penyedia Barang/Jasa ke dalam sistem atau melalui sistem.
                                    </li>
                                    <li class="mb-3">
                                        d. Setiap penggunaan dan/atau penyambungan sistem di luar ketentuan oleh Penyedia Barang/Jasa.
                                    </li>
                                    <li class="mb-3">
                                        e. Setiap pelanggaran atas Syarat dan Ketentuan serta instruksi-instruksi dari Perumda Danum Taka Penajam Paser Utara atau pelanggaran terhadap hak-hak pihak lain.
                                    </li>
                                    <li class="mb-3">
                                        f. Kegagalan pelaksanaan sistem yang disebabkan oleh keadaan kahar (force majeure) yaitu sesuatu yang di luar kekuasaan Perumda Danum Taka Penajam Paser Utara dan termasuk juga namun tidak terbatas pada bencana alam, pemogokan, huru-hara, perang, penyakit menular, peraturan-peraturan pemerintah yang diterapkan setelah kejadian, kebakaran, kegagalan/kerusakan saluran telekomunikasi, ketiadaan tenaga listrik, gempa bumi atau kejadian-kejadian malapetaka lainnya.
                                    </li>
                                </ul>
                           
                         </li>
                         <li class="mb-3">
                            11. Bersedia terikat dan menghargai seluruh proses yang berjalan beserta dokumen yang sudah diserahkan selama proses pengadaan.
                         </li>
                         <li class="mb-3">
                            12. Bersedia untuk tidak membuka, mengeluarkan maupun memberikan setiap informasi dan data kepada pihak ketiga, dan/atau penggunaannya dengan cara bagaimanapun oleh Penyedia Barang/Jasa baik langsung maupun tidak langsung terhadap setiap informasi dan data yang berhubungan dengan proses pengadaan di Perumda Danum Taka Penajam Paser Utara.
                         </li>
                         <li class="mb-3">
                            13. Penyedia Barang/Jasa sebagai pemilik User ID dan Password mengakui bahwa pengiriman data/penawaran yang dilakukan melalui sistem ini merupakan proses yang sah secara hukum.
                         </li>
                         <li class="mb-3">
                            14. Mengakui bahwa data dan/atau catatan-catatan yang valid dan sah untuk dasar evaluasi proses pengadaan adalah data dan/atau catatan-catatan yang terekam (recorded) di dalam sistem server Perumda Danum Taka Penajam Paser Utara.
                         </li>
                         <li class="mb-3">
                            15. Apabila melanggar hal-hal yang dinyatakan dalam PAKTA INTEGRITAS ini, bersedia menerima sanksi administratif, menerima sanksi pencantuman dalam daftar Hitam, digugat secara perdata dan/atau dilaporan secara pidana.
                         </li>
                       </ul>
                       <form action="{{route('suratpernyataan.store')}}" method="POST">
                        @csrf
                       <div class="flex justify-center items-center mb-4">
                        @if($suratpernyataan)
                        <input  type="checkbox" value="ya" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $suratpernyataan->status == 'ya' ? 'checked' : '' }} onchange="toggleSimpanButton()">
                        @else
                        <input id="default-checkbox" type="checkbox" value="ya" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onchange="toggleSimpanButton()">
                        @endif
                        <label  class="ms-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Saya Setuju dengan pernyataan diatas</label>
                    </div>
                    
                    <div class="flex items-center justify-center mt-4">
                        <x-button id="simpanButton" class="ml-3" :disabled="$suratpernyataan === 'ya' ? 'disabled' : ''">
                            {{ __('Simpan') }}
                        </x-button>
                    </div>

                </form>
                        </div>
                   
                                    </div>
                                </div>
                            </div>
                        </div>
           @section('footer')
           <script>
           // Fungsi untuk mematikan tombol Simpan jika checkbox diubah menjadi 'ya'
            function toggleSimpanButton() {
                var checkbox = document.getElementById('default-checkbox');
                var simpanButton = document.getElementById('simpanButton');

                // Jika checkbox dicentang, nonaktifkan tombol Simpan
                if (checkbox.checked) {
                    simpanButton.disabled = false;
                } else {
                    simpanButton.disabled = true;
                }
            }

        </script>
       
           @endsection
</x-app-layout>



