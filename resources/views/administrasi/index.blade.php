<x-app-layout>
    @include('layouts.stepe')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="px-8 py-4 bg-amber-50 shadow-md overflow-hidden sm:rounded-lg mb-4 text-sm text-justify">
        <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
          </svg>  <span class="ml-2">INFORMASI</span></h1>
          <ul class="mt-4 list-disc list-inside">
            <li>
                Data yang wajib diisi oleh vendor diberi tanda bintang (*). Jika semua yang ada tanda 
                bintang (*) sudah dilengkapi dan sudah melakukan penyimpanan data, maka otomatis akan muncul 
                tanda centang hijau pada data ‘Administrasi’ di menu Data Perusahaan. 
            </li>
           
          </ul>
       
            </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-2xl">Administrasi</h1>
                    <hr class="my-4 border-2 border-cyan-700">
                    
                    @if(session('status'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                            {{ session('status') }}
                            </div>
                        @endif

                        @if(session('Status'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 ">
                            {{ session('Status') }}
                            </div>
                        @endif
                            
                            
                    <form method="POST" action="{{route('administrasi.store')}}" class="mt-10" enctype="multipart/form-data">
                        @csrf
                        
                        
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nama" id="floating_name" value="{{Auth::user()->name}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required readonly/>
                                <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Perusahaan</label>
                                @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="npwp" value="{{Auth::user()->npwp}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required readonly />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NPWP</label>
                                @error('npwp')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="telpon" id="floating_telpon" value="{{ old('telpon', $administrasi->telpon ?? '') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_telpon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (08xx-xxxxxxxx)</label>
                                @error('telpon')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="email" name="email" value="{{Auth::user()->email}}" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required readonly/>
                                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                               
                            </div>
                          </div>
                          <div class="grid md:grid-cols-2 md:gap-6">
                          <div class="relative z-0 w-full mb-6 group">
                            <select  name="id_badanusaha" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value=""></option>
                                @foreach ($badanusaha as $item)
                                    @if($administrasi)
                                    <option @if ($administrasi->id_badanusaha == $item->id) selected @endif value="{{$item->id}}">{{$item->nama}}</option>
                                    @else 
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pilih Badan Usaha</label>
                            @error('id_badanusaha')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="namadirektur" id="floating_namadirektur" value="{{ old('namadirektur', $administrasi->namadirektur ?? '') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_telpon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Direktur</label>
                            @error('namadirektur')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                          </div>
                          <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="alamat" id="floating_alamat" value="{{ old('alamat', $administrasi->alamat ?? '') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_alamat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                            @error('alamat')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="id_provinsi" name="id_provinsi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option value=""></option>
                                    @foreach ($provinsi as $item)
                                        @if($administrasi)
                                        <option @if ($administrasi->id_provinsi == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @else 
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="id_provinsi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pilih Provinsi</label>
                                @error('id_provinsi')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="kabupaten" name="id_kabupaten" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled>
                                @if ($administrasi)
                                    @foreach ($kabupaten as $item)
                                    <option @if ($administrasi->id_kabupaten == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @else
                                    <option value=""></option> 
                                @endif
                                </select>
                               
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pilih Kabupaten</label>
                                @error('id_kabupaten')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="kodepos" id="floating_kodepos" value="{{ old('kodepos', $administrasi->kodepos ?? '') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_kodepos" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode Pos</label>
                                @error('kodepos')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="website"  id="floating_website" value="{{ old('website', $administrasi->website ?? '') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                                <label for="floating_website" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Website</label>
                                @error('website')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <h3 class="mb-4 text-gray-500 dark:text-white">Kantor Cabang ?</h3>
                                <div class="flex items-center mb-4">
                                    <input id="default-radio-1" type="radio" value="ya" name="kantorcabang" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                    <label for="default-radio-1" class="ms-2 ml-2 text-xs font-medium text-gray-500 ">Ya</label>
                                </div>
                                <div class="flex items-center">
                                    <input checked id="default-radio-2" type="radio" value="tidak" name="kantorcabang" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 dark:bg-gray-700 ">
                                    <label for="default-radio-2" class="ms-2 ml-2 text-xs font-medium text-gray-500 dark:text-gray-300">Tidak</label>
                                </div>

                            </div>
                            
                          </div>
                        <h1 class="font-semibold text-2xl mt-8">Dokumen</h1>
                        <hr class="my-4 border-2 border-cyan-700">
                       
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" value="{{Auth::user()->npwp}}"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NPWP</label>
                                @error('npwp')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Dokumen NPWP</label>
                                <input name="filenpwp" class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
                                <p class="mt-1 text-xs text-gray-500 ">*pdf, png, JPG (MAX. 1mb).</p>
                
                                @error('filenpwp')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nopkp"  value="{{ old('nopkp', $administrasi->nopkp ?? '') }}" id="floating_nopkp" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                                <label for="floating_nopkp" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor PKP</label>
                                @error('nopkp')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                          <div class="relative z-0 w-full mb-6 group">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Upload Dokumen PKP</label>
                            <input name="filepkp" class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-xs text-gray-500 ">*pdf, png, JPG (MAX. 1mb).</p>
                            @error('filepkp')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                          </div>
                          <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                @if($administrasi)

                                <a href="{{asset('storage/app/public/dist/filenpwp/'.$administrasi->filenpwp)}}" target="_blank" class="p-2 rounded-md bg-emerald-500 text-xs text-white"> Download Dokumen NPWP</a>
                               
                                @else
                                <button class="p-2 rounded-md bg-gray-500 text-xs text-white"> Dokumen NPWP Belum diupload</button>
                                @endif
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                @if($administrasi)

                                <a href="{{asset('storage/app/public/dist/filepkp/'.$administrasi->filepkp)}}" target="_blank" class="p-2 rounded-md bg-emerald-500 text-xs text-white"> Download Dokumen PKP</a>
                               
                                @else
                                <button class="p-2 rounded-md bg-gray-500 text-xs text-white"> Dokumen NPWP Belum diupload</button>
                                @endif
                               
                            </div>
                          </div>
                      
                        
                        <div class="flex items-center justify-end mt-4">
                            @if($pengajuanpenyedia->konfirmasi == 'ya')

                            @else
                            <x-button class="ml-3">
                                {{ __('Simpan') }}
                            </x-button>
                            @endif
                        </div>
                      


                    </form>
               
                </div>
            </div>
        </div>
    </div>
    @section('footer')
    
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var provinsiDropdown = document.getElementById('id_provinsi');
    var kabupatenDropdown = document.getElementById('kabupaten');
    var administrasiIdKabupaten = '{{ $administrasi ? $administrasi->id_kabupaten : '' }}';

    if (provinsiDropdown && kabupatenDropdown) {
        provinsiDropdown.addEventListener('change', function () {
            var provinsiId = this.value;

            // Menghapus opsi lama pada dropdown kabupaten
            kabupatenDropdown.innerHTML = '<option value=""></option>';

            // Menghapus atribut disabled dari dropdown kabupaten
            kabupatenDropdown.removeAttribute('disabled');

            // Mengaktifkan atau menonaktifkan dropdown kabupaten sesuai dengan pilihan provinsi
            kabupatenDropdown.disabled = !provinsiId;

            if (provinsiId) {
                // Fetch untuk mendapatkan data kabupaten berdasarkan id provinsi
                fetch(`/pdam/get-kabupaten/${provinsiId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Mengisi dropdown kabupaten berdasarkan data yang diterima
                        data.forEach(function (kabupaten) {
                            var option = document.createElement('option');
                            option.value = kabupaten.id;
                            option.text = kabupaten.name;
                            // Tetapkan nilai selected jika id kabupaten sama dengan id administrasi
                            if (kabupaten.id === administrasiIdKabupaten) {
                                option.selected = true;
                            }
                            kabupatenDropdown.add(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    }
});




    </script>
   
@endsection

    

</x-app-layout>
