<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Statistik Kategori Baju</h5>
        </div>
<div class="row">

                <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="far fa-folder"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Stok</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_stok_baju; ?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Barang Masuk</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_bm; ?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Barang Keluar</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_bk; ?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                            </div>
                        </div>
                    </div>                                            
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">   
                                <!--<h4 class="mt-0 mb-3 header-title">Website Overview</h4>-->        
                                <div id="grafik" style="height: 340px;"></div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <!--<h4 class="mt-0 mb-3 header-title">Monthly Revenue</h4>--> 
                                <div id="grafik2" style="height: 340px;"></div>
                            </div>
                        </div>
                    </div>
                 
                </div>

<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/accessibility.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/highcharts/js.js"></script>-->
<script src="<?php echo base_url(); ?>assets/highcharts/data.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/drilldown.js"></script>

<script type="text/javascript">
Highcharts.chart('grafik', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'center',
        text: 'Barang Masuk dan Barang Keluar '
    },
    subtitle: {
        align: 'center',
        text: 'Hari Ini'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total barang masuk & barang keluar'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{y}'
            }
        }
    },


    series: [
        {
            name: "Total",
            colorByPoint: true,
            data: [
                {
                    name: "Barang Masuk",
                    y: <?php echo json_encode($total_data_bm_perhari); ?>,
                    drilldown: "Barang Masuk"
                },
                {
                    name: "Barang Keluar",
                    y: <?php echo json_encode($total_data_bk_perhari); ?>,
                    drilldown: "Barang Keluar"
                },
                
            ]
        }
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: 'right'
            }
        },
        series: [
            {
                name: "Barang Masuk",
                id: "Barang Masuk",
                data: [
                ]
                    
            },
            {
                name: "Barang Keluar",
                id: "Barang Keluar",
                data: [
                    
                ]
            },
            
            
        ]
    }
});

Highcharts.chart('grafik2', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Barang Masuk'
    },
    subtitle: {
        text: ''
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "",
            colorByPoint: true,
            data: [
                {
                    name: ">=1 Minggu",
                    y: <?php echo json_encode($total_bm_baju_1minggu); ?>, 
                    drilldown: ">=1 Minggu"
                },
                {
                    name: ">=2 Minggu",
                    y: <?php echo json_encode($total_bm_baju_2minggu); ?>,
                    drilldown: ">=2 Minggu"
                },
                {
                    name: ">= 1 Bulan",
                    y: <?php echo json_encode($total_bm_baju_1bulan); ?>,
                    drilldown: ">= 1 Bulan"
                },
                {
                    name: ">= 2 Bulan",
                    y: <?php echo json_encode($total_bm_baju_2bulan); ?>,
                    drilldown: ">= 2 Bulan"
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: ">=1 Minggu",
                id: ">=1 Minggu",
                data: [
                    [
                        "v97.0",
                        36.89
                    ]
                ]
            },
            {
                name: ">=2 Minggu",
                id: ">=2 Minggu",
                data: [
                    [
                        "v15.3",
                        0.1
                    ]
                ]
            },
            {
                name: ">=1 Bulan",
                id: ">=1 Bulan",
                data: [
                    [
                        "v97",
                        6.62
                    ]
                    ]
            },
            {
                name: ">=2 Bulan",
                id: ">=2 Bulan",
                data: [
                    [
                        "v96.0",
                        4.17
                    ]
                ]
            }
        ]
    }
});
</script>
<?php endif ?>