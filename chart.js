window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)',
    black: 'rgb(0, 0, 0)',
};

jQuery(function(){ 
    grafico1();
    grafico2();
    grafico3();
    grafico4();
    grafico5();
});


function grafico1() {
    var MONTHS = ["Jul", "Ago", "Set", "Out", "Nov", "Dez", "Jan", "Fev", "Mar", "Abr", "Mai", "Jun"];
    var config = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Abatedouro",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 15,
                            15,
                            15,
                            15,
                            15,
                            25,
                            20,
                          17.5,
                            20,
                            12,
                            12,
                            15
                    ],
                    fill: false,
                }, {
                    label: "Lavoura",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [ 15,
                            25,
                            25,
                            20,
                            25,
                            20,
                          17.5,
                            20,
                            25,
                          17.5,
                            20,
                            12
                    ],
                }, {
                    label: "Derivados da cana de açúcar",
                    fill: false,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [     5,
                                7,
                               15,
                               20,
                             22.5,
                               15,
                                0,
                                0,
                              3.5,
                              3.5,
                              3.5,
                              3.5
                    ],
                },]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                elements: {
                    line: {
                        tension: 0, // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Intensidade relativa de trabalho'
                        }
                    }]
                }
            }
        };
        
    var ctx = document.getElementById("grafico1").getContext("2d");
    window.myLine = new Chart(ctx, config);
}

function grafico2() {
    var MONTHS = ["Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez", "Jan", "Fev"];
    var config = {
            type: 'bar',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Ouro",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 30, 30, 30, 30, 30, 30, 30, 30, 0, 0, 0, 0],
                }, {
                    label: "Peixe",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [ 15, 15, 15, 15, 15, 15, 15, 15, 0, 0, 0, 0],
                },]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'homems/dia'
                        }
                    }]
                }
            }
        };
        
    var ctx = document.getElementById("grafico2").getContext("2d");
    window.myLine = new Chart(ctx, config);
}

function grafico3() {
    var MONTHS = ["Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez", "Jan", "Fev"];
    var config = {
            type: 'bar',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Ouro",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 30, 30, 30, 30, 30, 30, 30, 30, 20, 10, 10, 20],
                }, {
                    label: "Peixe",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [ 15, 15, 15, 15, 15, 15, 15, 15, 15, 20, 20, 15],
                }, {
                    label: "Milho",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [ 15, 30, 30, 10, 30, 15, 0, 15, 0, 0, 0, 0],
                }, {
                    label: "Feijão",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.purple,
                    borderColor: window.chartColors.purple,
                    data: [ 15, 20, 0, 10, 10, 0, 0, 15, 0, 0, 0, 0],
                },{
                    label: "Suíno",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.orange,
                    borderColor: window.chartColors.orange,
                    data: [ 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
                },]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'dia/homem'
                        }
                    }]
                }
            }
        };
        
    var ctx = document.getElementById("grafico3").getContext("2d");
    window.myLine = new Chart(ctx, config);
}


function grafico4() {
    var MONTHS = ["Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez", "Jan", "Fev"];
    var config = {
            type: 'bar',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Milho",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 15, 30, 30, 10, 30, 15, 0, 15, 20, 10, 10, 20],
                }, {
                    label: "Feijão",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [ 15, 20, 0, 10, 10, 0, 0, 15, 15, 20, 20, 15],
                }, {
                    label: "Cana",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [ 20, 20, 20, 20, 20, 35, 35, 25, 25, 5, 5, 0],
                }, {
                    label: "Vaca",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.purple,
                    borderColor: window.chartColors.purple,
                    data: [ 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                },{
                    label: "Suíno",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.orange,
                    borderColor: window.chartColors.orange,
                    data: [ 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
                },]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'dia/homem'
                        }
                    }]
                }
            }
        };
        
    var ctx = document.getElementById("grafico4").getContext("2d");
    window.myLine = new Chart(ctx, config);
}

function grafico5() {
    var MONTHS = ["Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez", "Jan", "Fev"];
    var config = {
            type: 'bar',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "Ouro",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 30, 30, 30, 30, 30, 30, 30, 30, 0, 0, 0, 0],
                }, {
                    label: "Peixe",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [ 15, 15, 15, 15, 15, 15, 15, 15, 0, 0, 0, 0],
                }, {
                    label: "Milho",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [ 15, 30, 30, 10, 30, 15, 0, 15, 20, 10, 10, 20],
                }, {
                    label: "Feijão",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.purple,
                    borderColor: window.chartColors.purple,
                    data: [15, 20, 0, 10, 10, 0, 0, 15, 15, 20, 20, 15],
                },{
                    label: "Cana",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.orange,
                    borderColor: window.chartColors.orange,
                    data: [ 20, 20, 20, 20, 20, 35, 35, 25, 25, 5, 5, 0],
                },{
                    label: "Vaca",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                },{
                    label: "Suíno",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.gray,
                    borderColor: window.chartColors.gray,
                    data: [ 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
                },{
                    label: "Total",
                    borderWidth: 1,
                    backgroundColor: window.chartColors.black,
                    borderColor: window.chartColors.black,
                    data: [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                },]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:''
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'dia/homem'
                        }
                    }]
                }
            }
        };
    
    for (var i = 0; i < 12; i++)
        for (var j = 0; j < 7; j++)
            config.data.datasets[7].data[i] += config.data.datasets[j].data[i];
        
    var ctx = document.getElementById("grafico5").getContext("2d");
    window.myLine = new Chart(ctx, config);
}