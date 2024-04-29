
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        


    @php
         $userId = Auth::user()->id; // ID pengguna yang sedang masuk
         $pengajuan = \App\Models\pengajuanpenyedia::where('id_user', $userId)->first();
         
    @endphp

    

<div class="border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            
                <a href="{{ route('suratpernyataan.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('suratpernyataan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                    <svg class=" w-4 h-4 me-2  dark:group-hover:text-gray-300 @if(request()->routeIs('suratpernyataan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                    </svg>
                    Surat Pernyataan<span class="hidden sm:inline-flex sm:ml-2"></span>
                </a>
           
        </li>
        <li class="me-2">
           
            <a href="{{ route('administrasi.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('administrasi.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class=" @if(request()->routeIs('administrasi.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
            </svg>
                Administrasi<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
            
       
        </li>
        <li class="me-2">
            
            <a href="{{ route('izinusaha.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('izinusaha.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('izinusaha.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                </svg>
                  Izin Usaha<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
       
        </li>

        <li class="me-2">
           
            <a href="{{ route('aktapendirian.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('aktapendirian.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('aktapendirian.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                </svg>
                  Akta Pendirian<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
       
        </li>
        <li class="me-2">
          
            <a href="{{ route('pengurusperusahaan.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('pengurusperusahaan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="w-4 h-4 me-2 @if(request()->routeIs('pengurusperusahaan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </svg>
                  Pengurus Perusahaan<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
           
       
        </li>

        <li class="me-2">
           
            <a href="{{ route('pajak.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('pajak.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('pajak.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                </svg>
                  Pajak<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
       
        </li>

        <li class="me-2">
           
            <a href="{{ route('dokumenlainnya.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('dokumenlainnya.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('dokumenlainnya.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                </svg>
                Dokumen Lainnya<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
           
      
        </li>

        <li class="me-2">
            
            <a href="{{ route('pengalaman.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('pengalaman.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('pengalaman.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                </svg>
                Pengalaman Pekerjaan<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
           
       
        </li>
        <li class="me-2">
            
            <a href="{{ route('tenagaahli.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('tenagaahli.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('tenagaahli.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                  </svg>
                  Tenaga Ahli<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
       
        </li>

        <li class="me-2">
           
            <a href="{{ route('perlengkapan.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('perlengkapan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('perlengkapan.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                  </svg>
                  Peralatan/Perlengkapan<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
       
        </li>
        <li class="me-2">
            @if($pengajuan->konfirmasi == 'ya')
            <a href="{{ route('verifikasi.perbaikan') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('verifikasi.perbaikan')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="w-6 h-6 @if(request()->routeIs('verifikasi.perbaikan')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                  </svg>
                Ajukan Perubahan Data<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
            @else
            <a href="{{ route('verifikasi.index') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group @if(request()->routeIs('verifikasi.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif">
                <svg class="@if(request()->routeIs('verifikasi.index')) text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500 @endif w-4 h-4 me-2" aria-hidden="true" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 2a3 3 0 0 0-2.1.9l-.9.9a1 1 0 0 1-.7.3H7a3 3 0 0 0-3 3v1.2c0 .3 0 .5-.2.7l-1 .9a3 3 0 0 0 0 4.2l1 .9c.2.2.3.4.3.7V17a3 3 0 0 0 3 3h1.2c.3 0 .5 0 .7.2l.9 1a3 3 0 0 0 4.2 0l.9-1c.2-.2.4-.3.7-.3H17a3 3 0 0 0 3-3v-1.2c0-.3 0-.5.2-.7l1-.9a3 3 0 0 0 0-4.2l-1-.9a1 1 0 0 1-.3-.7V7a3 3 0 0 0-3-3h-1.2a1 1 0 0 1-.7-.2l-.9-1A3 3 0 0 0 12 2Zm3.7 7.7a1 1 0 1 0-1.4-1.4L10 12.6l-1.3-1.3a1 1 0 0 0-1.4 1.4l2 2c.4.4 1 .4 1.4 0l5-5Z" clip-rule="evenodd"/>
                  </svg>
                  
                 Verifikasi<span class="hidden sm:inline-flex sm:ml-2"></span>
            </a>
            @endif
        </li>
    </ul>
</div>




    </div>
</div>
