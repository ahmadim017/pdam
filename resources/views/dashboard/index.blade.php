@extends('layouts.sbadmin')
@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection




@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
</div>

<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card bg-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-white  mb-1">Jumlah Paket</div>
              <div class="h6 mb-0 font-weight-bold text-white">{{$baru}}</div>
            </div>
            
            <div class="col-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class=" text-gray-200 bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                  </svg>
             
            </div>
          </div>
        
        </div>
      </div>
    </div>


      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card bg-secondary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-s font-weight-bold text-white  mb-1">Paket Diproses</div>
                <div class="h6 mb-0 font-weight-bold text-white">{{$verifikasi}}</div>
              </div>
              <div class="col-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-gray-200 bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                  <path d="M14 4.5V9h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v7H2V2a2 2 0 0 1 2-2h5.5zM13 12h1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2h1v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z"/>
                </svg>
              </div>
            </div>
           
          </div>
        </div>
      </div>
  

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card bg-light shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-s font-weight-bold text-gray-800  mb-1">Paket Selesai</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">{{$diterima}}</div>
          </div>
          <div class="col-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-gray-800 bi bi-file-earmark-check" viewBox="0 0 16 16">
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
              </svg>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</div>
  
<div class="row">
    <div class="col-xl-8 col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Jumlah Pagu Berdasarkan Kategori Pengadaan</h6>
        </div>
        <div class="card-body">
          <div id="container3"></div>
          </div>
      </div>
    </div>

    <div class="col-xl-4 col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Jumlah Paket Berdasarkan Kategori Pengadaan</h6>
        </div>
        <div class="card-body">
          <div id="container"></div>
          </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Paket Berdasarkan Nilai Kontrak Tertinggi</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">    
          <table class="table table-striped" id="dataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Paket</th>
                  <th scope="col">Nama Penyedia</th>
                  <th scope="col">Nilai Kontrak</th>
                  <th scope="col">Tahun Anggaran</th>
                  <th scope="col">Klasifikasi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($nontender as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{route('pengadaan.show',[$p->id_paket])}}">{{$p->paketpekerjaan->namapaket}}</a></td>
                    <td>{{$p->user->name}}</td>
                    <td>Rp.{{number_format($p->hargapenawaran)}}</td>
                    <td>{{$p->paketpekerjaan->tahunanggaran}}</td>
                    <td>{{$p->paketpekerjaan->klasifikasi}}</td>
                </tr>
            @endforeach
            
              </tbody>
             
            </table>
        </div>
        
        </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>

Highcharts.chart('container3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: {!!json_encode($datakategori)!!},
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pagu (Rp.)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ' '
    },
    plotOptions: {
        bar: {
            borderRadius: '10%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.3
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Pagu',
        data: {!!json_encode($pagu)!!},
        color: '#8085e9'
    }]
});


    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} '
            }
        }
    },
    credits: {
    enabled: false
  },
    series: [{
        name: 'total',
        colorByPoint: true,
        data: {!!json_encode($data)!!}
    }]
});


Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}'
            }
        }
    },
    credits: {
    enabled: false
  },
    series: [{
        name: 'total',
        colorByPoint: true,
        data: '',
    }]
});
</script>
@endsection
    
