<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.8.0/echarts.min.js"></script>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


@extends('layouts.admin')

@section('content')
    <div class="page-breadcrumb" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
        <div class="row">
            <div class="col-7 align-self-center {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{__('main.Hello')}}, {{ auth::user()->name }}!</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('main.dashboard')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right " >
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{$userCount }}</h2>
                               
                            </div>
                            <h6 class="text-muted font-weight-normal mb-auto w-auto text-truncate">{{__('main.Number of users')}}</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$reclamationCount}}</h2>
                            <h6 class="text-muted font-weight-normal mb-auto w-auto text-truncate">{{__('main.Number of complaints')}}
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="icon-shield"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class=" d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{$ReseauPublicCount}}</h2>
                            
                            </div>
                            <h6 class="text-muted font-weight-normal mb-auto w-auto text-truncate">{{__('main.Number of requests for connection to public networks')}}
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="sun" class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class=" d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">{{$PermisConstructionCount}}</h2>
                            <h6 class="text-muted font-weight-normal mb-auto w-auto text-truncate">{{__('main.Number of building permit applications')}}</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="home" class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">{{$DocumentsCount}}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.Number of documents')}}</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('main.percentage on claims')}}</h4>
                        <div id="pie_chart" class="mt-2" style=" height:450px;"></div>
                        
                        
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('main.percentage on connection requests')}}</h4>
                        <div id="pie_chart2" class="mt-2" style=" height:450px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('main.percentage on construction requests')}}</h4>
                        <div id="pie_chart3" class="mt-2" style=" height:450px;"></div>
                      
                    </div>
                </div>
            </div>
        </div> 
        <div class="row {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
     
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('main.Users accounts')}}</h4>
                        <div>
                            <div id="bar-chart" height="150"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->     
    </div>
</div>  
     
    </div>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            var count_rec =  <?php echo json_encode($count_rec); ?>;
            var count_res =  <?php echo json_encode($count_res); ?>;
            var count_permis =  <?php echo json_encode($count_permis); ?>;
        
            var options = {
                chart: {
                    renderTo: 'pie_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: true
                },
                title: {
                    text: '{{__('main.percentage according to claim status')}}'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
                    percentageDecimals: 1
                },
                accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        // colors: pieColors,
                            dataLabels: {
                            enabled: true,
                              color: '#000000',
                            // connectorColor: '#000000',
                            format: '<b>{point.name}</b><br>{point.percentage:.2f} %',
                            distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
                        }
                    }
                },
     
                series: [{
                    type:'pie',
                    name:'{{__('main.percentage')}}'
                }]
            }
            var options_res = {
                chart: {
                    renderTo: 'pie_chart2',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: true
                },
                title: {
                    text: '{{__('main.Percentage according to connection request status')}}'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
                    percentageDecimals: 1
                },
                accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        // colors: pieColors,
                            dataLabels: {
                            enabled: true,
                              color: '#000000',
                            // connectorColor: '#000000',
                            format: '<b>{point.name}</b><br>{point.percentage:.2f} %',
                            distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
                        }
                    }
                },
                series: [{
                    type:'pie',
                    name:'{{__('main.percentage')}}'
                }]
            }
            
            var options_permis = {
                chart: {
                    renderTo: 'pie_chart3',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: true
                },
                title: {
                    text: '{{__('main.Percentage according to construction request status')}}'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
                    percentageDecimals: 1
                },
                accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        // colors: pieColors,
                            dataLabels: {
                            enabled: true,
                              color: '#000000',
                            // connectorColor: '#000000',
                            format: '<b>{point.name}</b><br>{point.percentage:.2f} %',
                            distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
                        }
                    }
                },
                series: [{
                    type:'pie',
                    name:'{{__('main.percentage')}}'
                }]
            }
            myarray = [];
            $.each(count_rec, function(index, val) {
                if(val.status=='0'){
                myarray[index] = ['{{__('main.new')}}', val.count];
                
                
            }
            if(val.status=='1'){
                myarray[index] = ['{{__('main.Inprogress')}}', val.count];
            }
            if(val.status=='2'){
                myarray[index] = ['{{__('main.Resolved')}}', val.count];
            }
            });
        
            myarray2 = [];
            $.each(count_res, function(index, val) {
                if(val.status=='0'){
                myarray2[index] = ['{{__('main.new')}}', val.count];
                
                
            }
            if(val.status=='1'){
                myarray2[index] = ['{{__('main.Inprogress')}}', val.count];
            }
            if(val.status=='2'){
                myarray2[index] = ['{{__('main.accepted')}}', val.count];
            }
            if(val.status=='3'){
                myarray2[index] = ['{{__('main.rejected')}}', val.count];
            }
            });
            myarray3 = [];
            $.each(count_permis, function(index, val) {
                if(val.status=='0'){
                myarray3[index] = ['{{__('main.new')}}', val.count];
                
                
            }
            if(val.status=='1'){
                myarray3[index] = ['{{__('main.Inprogress')}}', val.count];
            }
            if(val.status=='2'){
                myarray3[index] = ['{{__('main.accepted')}}', val.count];
            }
            if(val.status=='3'){
                myarray3[index] = ['{{__('main.rejected')}}', val.count];
            }
            });
            options.series[0].data = myarray;
            options.plotOptions.pie.colors=['red','orange','green']; 
            options_res.series[0].data = myarray2;
            options_res.plotOptions.pie.colors=['cyan','orange','green','red']; 
            options_permis.series[0].data = myarray3;
            options_permis.plotOptions.pie.colors=['cyan','orange','green','red'];         
            
            chart = new Highcharts.Chart(options);
            chart2 = new Highcharts.Chart(options_res);
            chart3 = new Highcharts.Chart(options_permis);
            
        });
        $(function(){
        Highcharts.chart('bar-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: '{{__('main.percentage')}} '
            },
            xAxis: {
                categories: <?= $terms ?>,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '{{__('main.Users')}}'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key} {{__('main.Users')}}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: <?= $data ?>
            
        });
    });
       
   
        </script>
@endsection
