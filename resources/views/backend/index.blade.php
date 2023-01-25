@extends('backend.layouts.app')

@section('styles')
<style>
    .stats-icon{
        font-size: 27px;
        color: #3b3b88;
    }

    .stats-val{
        color: #e31c79;
    }
</style>
@endsection

@section('content')
    <div class="main-content">
        <div class="row">
            {{-- <div class="col-lg-5">
                <div class="row"> --}}
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-between align-items-center">
                                    <p class="m-b-0 text-muted">Revenue</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <i class="fas fa-money-bill stats-icon"></i>
                                        <h2 class="m-b-0 stats-val">USD{{$data['revenue'] ?? ''}}</h2>
                                    </div>
                                    {{-- <span class="badge badge-pill badge-cyan font-size-12">
                                        <i class="anticon anticon-arrow-up"></i>
                                        <span class="font-weight-semibold m-{{$alignShortRev}}-5">6.71%</span>
                                    </span> --}}
                                </div>
                                {{-- <div class="m-t-40">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-primary badge-dot m-{{$alignShort}}-10"></span>
                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                        </div>
                                        <span class="text-dark font-weight-semibold font-size-13">70% </span>
                                    </div>
                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-between align-items-center">
                                    <p class="m-b-0 text-muted">Vendors</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <i class="fas fa-building stats-icon"></i>
                                        <h2 class="m-b-0 stats-val">{{$data['vendors'] ?? ''}}</h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-between align-items-center">
                                    <p class="m-b-0 text-muted">Contracts</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <i class="fas fa-tasks stats-icon"></i>
                                        <h2 class="m-b-0 stats-val">{{$data['orders'] ?? ''}}</h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-between align-items-center">
                                    <p class="m-b-0 text-muted">Customers</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <i class="fas fa-regular fa-users stats-icon"></i>
                                        <h2 class="m-b-0 stats-val">{{$data['customers'] ?? ''}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div> --}}
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Requests Statistics</h5>
                            {{-- <div class="dropdown dropdown-animated scale-left">
                                <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                    <i class="anticon anticon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-printer"></i>
                                        <span class="m-{{$alignShortRev}}-10">Print</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-download"></i>
                                        <span class="m-{{$alignShortRev}}-10">Download</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-file-excel"></i>
                                        <span class="m-{{$alignShortRev}}-10">Export</span>
                                    </button>
                                    <button class="dropdown-item" type="button">
                                        <i class="anticon anticon-reload"></i>
                                        <span class="m-{{$alignShortRev}}-10">Refresh</span>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="m-t-30">
                            <div class="d-inline-block m-{{$alignShort}}-30">
                                <p class="m-b-0 d-flex align-items-center">
                                    <span class="badge badge-primary badge-dot m-{{$alignShort}}-10"></span>
                                    <span>Completed Contracts</span>
                                </p>
                            </div>
                            <div class="d-inline-block">
                                <p class="m-b-0 d-flex align-items-center">
                                    <span class="badge badge-blue badge-dot m-{{$alignShort}}-10"></span>
                                    <span>Uncompleted Contracts</span>
                                </p>
                            </div>
                        </div>
                        <div class="m-t-50">
                            <canvas class="chart" style="height: 205px" id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Top Vendors</h5>
                            {{-- <div>
                                <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                            </div> --}}
                        </div>
                        <div class="m-t-30">
                            <ul class="list-group list-group-flush">
                                @foreach ($top_services as $ser)
                                    <li class="list-group-item p-h-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <div class="avatar avatar-image m-{{$alignShort}}-15">
                                                    <img src="assets/images/others/thumb-9.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h6 class="m-b-0">
                                                        <a href="javascript:void(0);" class="text-dark">{{$ser->service_data->category_name ?? ''}}</a>
                                                    </h6>
                                                    <span class="text-muted font-size-13">{{$ser->company->name ?? ''}}</span>
                                                </div>
                                            </div>
                                            {{-- <span class="badge badge-pill badge-cyan font-size-12">
                                                <span class="font-weight-semibold m-{{$alignShortRev}}-5">+18.3%</span>
                                            </span> --}}
                                        </div>
                                    </li>
                                @endforeach
                                

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Revenue</h5>
                        </div>
                        <div class="m-t-30">
                            <div class="d-md-flex">
                                <div class="p{{$alignShort}}-4 m-v-10 border-hide-md">
                                    <p class="m-b-0">Net Revenue</p>
                                    <h3 class="m-b-0">
                                        <span>USD{{$data['revenue'] ?? ''}}</span>
                                    </h3>
                                </div>
                                {{-- <div class="px-md-4 m-v-10">
                                    <p class="m-b-0">Profit</p>
                                    <h3 class="m-b-0">
                                        <span>$17,523</span>
                                        <span class="text-danger m-{{$alignShortRev}}-10 font-size-14">+1.82%</span>
                                    </h3>
                                </div> --}}
                            </div>
                        </div>
                        <div class="m-t-50" style="height: 240px">
                            <canvas class="chart" id="revenue_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-none">
                <div class="card">
                    <div class="card-body">
                        <h5>Customers</h5>
                        <div class="m-v-45 text-center" style="height: 220px">
                            <canvas class="chart" id="customer-chart"></canvas>
                        </div>
                        <div class="row p-t-25">
                            <div class="col-md-8 m-h-auto">
                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                    <p class="m-b-0 d-flex align-items-center">
                                        <span class="badge badge-warning badge-dot m-{{$alignShort}}-10"></span>
                                        <span>New</span>
                                    </p>
                                    <h5 class="m-b-0">350</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                    <p class="m-b-0 d-flex align-items-center">
                                        <span class="badge badge-primary badge-dot m-{{$alignShort}}-10"></span>
                                        <span>Pendding</span>
                                    </p>
                                    <h5 class="m-b-0">450</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                    <p class="m-b-0 d-flex align-items-center">
                                        <span class="badge badge-danger badge-dot m-{{$alignShort}}-10"></span>
                                        <span>old</span>
                                    </p>
                                    <h5 class="m-b-0">100</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Recent Contracts</h5>
                            {{-- <div>
                                <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                            </div> --}}
                        </div>
                        <div class="m-t-30">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recent_orders as $order)
                                            <tr>
                                                <td>{{$order->order_id ?? ''}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                <img src="assets/images/avatars/user.jpg" alt="">
                                                            </div>
                                                            <h6 class="m-{{$alignShortRev}}-10 m-b-0">{{$order->user->name ?? ''}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$order->order_items->service->service_data->category_name ?? ''}}</td>
                                                <td>{{\Carbon\Carbon::parse($order->created_at ?? '')->format('d M Y')}}</td>
                                                <td>SR {{$order->total_amount ?? 0}}</td>
                                                <td>
                                                    @php
                                                        $badge=$order->latest_status && $order->latest_status->status=='pending' ? 'warning' : 'success';
                                                    @endphp
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge badge-{{$badge}} badge-dot m-{{$alignShort}}-10"></span>
                                                        <span>{{$order->latest_status->status ?? ''}}</span>
                                                    </div>
                                                </td>
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
    </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/0.6.6/chartjs-plugin-zoom.js"></script>
<script>
    const colors = {

        magenta: '#eb2f96',
        magentaLight: 'rgba(235, 47, 150, 0.05)',
        red: '#de4436',
        redLight: 'rgba(222, 68, 54, 0.05)',
        volcano: '#fa541c',
        volcanoLight: 'rgba(250, 84, 28, 0.05)',
        orange: '#fa8c16',
        orangeLight: 'rgba(250, 140, 22, 0.1)',
        gold: '#ffc107',
        goldLight: 'rgba(255, 193, 7, 0.1)',
        lime: '#a0d911',
        limeLight: 'rgba(160, 217, 17, 0.1)',
        green: '#52c41a',
        greenLight: 'rgba(82, 196, 26, 0.1)',
        cyan: "#05c9a7",
        cyanLight: 'rgba(0, 201, 167, 0.1)',
        blue: '#e31c79',
        blueLight: '#e31c7938',
        geekBlue: '#2f54eb',
        geekBlueLight: 'rgba(47, 84, 235, 0.1)',
        purple: '#886cff',
        purpleLight: 'rgba(136, 108, 255, 0.1)',
        gray: '#53535f',
        grayLight: '#77838f',
        grayLighter: '#ededed',
        grayLightest: '#f1f2f3',
        border: '#edf2f9',
        white: '#ffffff',
        dark: '#2a2a2a',
        transparent: 'rgba(255, 255, 255, 0)'
    };
    $(document).ready(function(){
        const revenueChartConfig = new Chart(document.getElementById("revenue_chart"), {
            type: 'line',
            data: {
                labels: {!!$graph->pluck('months')!!},
                datasets: [{
                    label: 'Orders',
                    backgroundColor: colors.transparent,
                    borderColor: colors.blue,
                    pointBackgroundColor: colors.blue,
                    pointBorderColor: colors.white,
                    pointHoverBackgroundColor: colors.blueLight,
                    pointHoverBorderColor: colors.blueLight,
                    data: {!!$graph->pluck('revenue')!!}
                }]
            },
            options: {
                legend: {
                    display: false
                },
                maintainAspectRatio: false,
                responsive: true,
                /* hover: {
                    mode: 'nearest',
                    intersect: true
                }, */
                tooltips: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{ 
                        gridLines: [{
                            display: false,
                        }],
                        ticks: {
                            display: true,
                            fontColor: colors.grayLight,
                            fontSize: 13,
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            drawTicks: false,
                            borderDash: [3, 4],
                            zeroLineWidth: 1,
                            zeroLineBorderDash: [3, 4]  
                        },
                        ticks: {
                            display: true,
                            min:0,
                            max: 2000,                            
                            stepSize: 200,
                            fontColor: colors.grayLight,
                            fontSize: 13,
                            padding: 10
                        }  
                    }],
                },
                zoom: {
                    enabled: true,
                    mode: 'xy', // or 'x' for "drag" version
                },
            }
        });
    })
</script>
    
@endsection