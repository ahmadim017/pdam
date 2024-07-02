<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/image/logo.png')}}">
        <title>E-Procurement Perumda Danum Taka</title>

        <!-- Fonts -->
        
        <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
        <!-- AOS -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
	      <link rel="stylesheet" href="{{asset('public/tail/css/skilline.css')}}" />
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
       
        <!-- Styles -->
    </head>
    <body>
        <a id="button" class="hover:underline bg-sky-200 text-white focus:outline-none transform transition hover:scale-105 duration-300 ease-in-out hover:bg-sky-600"></a>
        <nav class="text-gray-700 fixed w-full z-40 top-0 left-0 bg-white/50 backdrop-blur-lg">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <div class="relative md:my-3">
                <a href="#" class="flex items-center focus:outline-none transform transition hover:scale-105 duration-300 ease-in-out">
                  <img src="{{asset('public/image/logo.png')}}" class="h-9 mr-1" alt="ppu Logo" />
                  <span class="self-center text-sky-500 text-md lg:text-2xl md:text-xl sm:text-lg font-semibold whitespace-nowrap" >E-Procurement Perumda Danum Taka</span>
              </a>
              </div>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
              <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
                <li>
                  <a href="#beranda" class="block py-2 pl-3 pr-4 text-white bg-sky-500 rounded md:bg-transparent md:hover:text-blue-700 md:text-gray-900 md:p-0 " aria-current="page">Beranda</a>
                </li>
                <li>
                  <a href="#pengumuman" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Pengumuman Pengadaan</a>
                </li>
                <li>
                  <a href="#pemenang" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  ">Pemenang Pengadaan</a>
                </li>
                <li>
                    <a href="#panduan" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  ">Panduan</a>
                  </li>
                <li>
                  <a href="#contact" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Kontak Kami</a>
                </li>
              </ul>
            </div>

          </div>
        </nav>
        
        <section id="beranda" class="mt-24">
          <div class="bg-sky-500">
          <div class="max-w-screen-xl px-8 mx-auto flex flex-col lg:flex-row items-start">
            <!--Left Col-->
            <div class="flex flex-col w-full lg:w-6/12 justify-center lg:pt-16 items-start text-center lg:text-left mb-5 md:mb-0">
              <h1 data-aos="fade-right" data-aos-once="true" class="my-4 text-5xl font-bold leading-tight text-gray-600">
                <span class="text-yellow-50">E-Procurement</span> Perumda Danum Taka
              </h1>
              <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="text-white text-2xl mb-8">Untuk Mengikuti Pengadaan di Perumda Danum Taka Kabupaten Penajam Paser Utara Silahkan Login/Registrasi disni.</p>
              <div class="flex justify-center lg:justify-start ml-7 lg:ml-0 gap-4 mb-32">
                <a class="bg-sky-300 text-white hover:bg-sky-400 focus:outline-none transform transition hover:scale-105 duration-300 ease-in-out py-3 px-3 rounded-lg shadow-lg xl:text-lg md:text-sm sm:text-sm flex items-center p-3 group" href="{{route('login')}}"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                  <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
                  <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
                  <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                  <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
                  <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
                </svg><span class="ml-2 text-lg font-semibold">Login</span></a>
                  <a class="bg-white hover:bg-gray-100 focus:outline-none transform transition hover:scale-105 duration-300 ease-in-out py-3 px-3 shadow-lg rounded-lg text-gray-500 xl:text-lg md:text-sm sm:text-sm  flex items-center p-3 group" href="{{route('register')}}" ><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                  </svg> <span class="ml-2 text-lg font-semibold">Registrasi</span></span></a>
              </div>
              
            </div>
            <!--Right Col-->
            <div class="w-full lg:w-6/12 lg:my-20 lg:ml-6 ml-4 relative">
                      
              
              <section class="swiper z-0 mb-16">
                <div class="swiper-wrapper">
                 @foreach ($slide as $item)
                 <div class="swiper-slide"><img class="rounded-xl border-8 border-white"  src="{{asset('storage/app/public/slide/image/'.$item->image)}}" /></div>
                 @endforeach
                </div>
                <div class="swiper-pagination "></div>
              </section>
              
             
              <!-- ux class
              <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true" class="absolute bottom-14 -left-4 lg:-bottom-7 lg:-left-7 floating">
                <img class="bg-white bg-opacity-90 p-3 rounded-lg h-12 lg:h-28" src="{{asset('image/7.png')}}" alt="">
              </div>
               -->
              <!-- congrats -->
              <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true" class="absolute bottom-14 -right-2 lg:-bottom-6  lg:-right-8 floating-4">
                <img class="bg-white bg-opacity-90 p-3 rounded-lg h-12 lg:h-28" src="{{asset('public/image/7.png')}}" alt="">
              </div>
               <!--
              <div data-aos="fade-down" data-aos-delay="500" data-aos-once="true" class="absolute bottom-14 -right-2 lg:-bottom-6  lg:-light-8 floating-4">
                <img class="bg-white bg-opacity-90 p-3 rounded-lg h-12 lg:h-28" src="{{asset('image/berakhlak.png')}}" alt="">
              </div>
              -->
            </div>
            
          </div>

          <div class="text-white -mt-14 sm:-mt-24 lg:-mt-36 z-30 relative">
            <svg class="xl:h-40 xl:w-full" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" fill="currentColor"></path>
            </svg>
            <div class="bg-white w-full h-20 -mt-px"></div>
          </div>
      
        </div>
        </section>

        <section id="pengumuman">
            <div class="max-w-screen-xl mx-auto m-8 ">
                <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
                    <h1 class="text-3xl font-bold mb-4 text-gray-600">Pengumuman Pengadaan<span class="text-sky-600"> Perumda Danum Taka</span></h1>
                
                </div>
            </div>
            <div class="max-w-screen-xl px-8 mx-auto mb-6">
                <div class="text-center p-6 bg-white w-full rounded-xl space-x-2 mt-10 shadow-lg">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 bg-gray-50  mb-2">
                        <li class="me-2">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Tender</button>
                        </li>
                    </ul>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               Nama Paket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                HPS
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Tahapan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($detailtender as $item)
                          
                     
                        <tr class="bg-white border-b  hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-wrap text-gray-900 ">
                               
                                <a href="#" target="_blank" class="text-blue-500 hover:underline">{{$item->tender->namapaket}}</a>
                               
                            </th>
                            <td class="px-6 py-4">
                               Rp. {{number_format($item->tender->hps)}}
                            </td>
                            <td class="px-6 py-4">
                              @php
                              $hasTodaySchedule = false;
                              foreach ($jadwal as $a) {
                                  // Mengambil tanggal jadwal
                                  $jadwalDate = \Carbon\Carbon::parse($a->tglpelaksanaan)->toDateString();
                      
                                  // Bandingkan tanggal jadwal dengan tanggal hari ini
                                  if ($item->id_paket == $a->id_paket && $jadwalDate == now()->toDateString()) {
                                      $hasTodaySchedule = true;
                                      break;
                                  }
                              }
                          @endphp
                              @if ($hasTodaySchedule)
                              <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-blue-500 hover:underline">
                                  {{$a->kegiatan}}
                              </a>
                              @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                </div>
            </div>

           
        </section>
        

  

   
    
  @include('components.footer')
        
        
  <script src="https://kit.fontawesome.com/83fe09b92c.js" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
      AOS.init();
  
    
  </script>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Swiper untuk slider
    new Swiper('.swiper', {
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 3000, // Ganti dengan delay yang Anda inginkan (dalam milidetik)
      },
      pagination: {
    el: '.swiper-pagination',
  },
    });
  });
</script>
  <script>
    
    var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>
<script>
  const accordionHeader = document.querySelectorAll(".accordion-header");
  accordionHeader.forEach((header) => {
    header.addEventListener("click", function () {
      const accordionContent = header.parentElement.querySelector(".accordion-content");
      let accordionMaxHeight = accordionContent.style.maxHeight;

      if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
        accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
        header.querySelector(".fas").classList.remove("fa-plus");
        header.querySelector(".fas").classList.add("fa-minus");
      } else {
        accordionContent.style.maxHeight = `0px`;
        header.querySelector(".fas").classList.add("fa-plus");
        header.querySelector(".fas").classList.remove("fa-minus");
      }
    });
  });
</script>

  
    </body>
</html>
