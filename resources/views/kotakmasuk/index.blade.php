<x-app-layout>
   
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
  <div class="px-8 py-4 bg-amber-50 shadow-md overflow-hidden sm:rounded-lg mb-4 text-sm text-justify">
      <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>  <span class="ml-2">INFORMASI</span></h1>
        <ul class="mt-4 list-disc list-inside">
          <li>
             Klik Judul untuk melihat Isi kotak Masuk
          </li>
        </ul>
     
          </div>
  </div>

<div class="py-3">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <h1 class="font-semibold text-2xl">Kotak Masuk</h1>
              <hr class="my-4 border-2 border-cyan-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              #
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Judul
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Status
                          </th>
                          <th scope="col" class="px-6 py-3">
                           Tanggal
                        </th>
                         
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($kotakmasuk as $item)
                        
                   
                      <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        
                        <td class="px-6 py-4">{{$loop->iteration}}</td> 
                        <td class="px-6 py-4"><a href="{{route('kotakmasuk.show',[$item->id])}}" class="text-blue-500 hover:underline">{{$item->judul}}</a></td> 
                        <td class="px-6 py-4">@if($item->status == 'tidak')
                        <span class="bg-yellow-300 m-2 px-2 rounded-md text-white">Belum dibaca</span>
                        @else
                        <span class="bg-green-500 m-2 px-2 rounded-md text-white">Sudah dibaca</span>
                        @endif
                        </td> 
                        <td class="px-6 py-4">{{Date::createFromDate($item->tanggal)->format('j F Y')}}</td> 
                      </tr>
                      @endforeach
                      
                    
                  </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>

  
     
</div>
    </div>

    
</x-app-layout>



