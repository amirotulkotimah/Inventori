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
                    y: <?php echo json_encode(); ?>,
                    drilldown: "Barang Masuk"
                },
                {
                    name: "Barang Keluar",
                    y: <?php echo json_encode(); ?>,
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
                    y: <?php echo json_encode(); ?>,
                    drilldown: ">=1 Minggu"
                },
                {
                    name: ">=2 Minggu",
                    y: <?php echo json_encode(); ?>,
                    drilldown: ">=2 Minggu"
                },
                {
                    name: ">= 1 Bulan",
                    y: 0,
                    drilldown: ">= 1 Bulan"
                },
                {
                    name: ">= 2 Bulan",
                    y: 0,
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