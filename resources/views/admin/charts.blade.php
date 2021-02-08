@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="row">
    <div class="header">
      <h4 class="text-info col-md-4">{{ config('app.name') }} Contractor Status </h4>
    </div>
  </div>
  <div class="row">
    <div class="pie-chart-container col-md-6">
      <div class="chart-container">
        <canvas id="pie-chart" height="280" width="600"></canvas>
      </div>
    </div>

    <div class="card col-md-4">
      <div class="row">
        <h5 class="text-info col-sm-9">Contractor Status </h5>
      </div>
      <dl class="row">
        @for($i=0;$i<count($data['label']);$i++) <dt class="col-sm-3">{{$data['label'][$i]}} </dt>
          <dd class="col-sm-9"> <span class="badge text-white"> {{$data['data'][$i]}} </span></dd>
          @endfor
      </dl>
      <div class="row">
        <h5 class="text-info col-sm-9">Contractors Per State </h5>
      </div>

      <dl class="row">
        <dt class="col-sm-3"> ACT </dt>
        <dd class="col-sm-9"> @if (empty($data2['label_act'])) <span class="text-warning"> None </span> @elseif (!empty($data2['label_act'])) @for($i=0;$i<count($data2['label_act']);$i++) {{$data2['label_act'][$i]}}: <span class="badge text-white"> {{$data2['data_act'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> NSW </dt>
        <dd class="col-sm-9"> @if (empty($data3['label_nsw'])) <span class="text-warning"> None </span> @elseif (!empty($data3['label_nsw'])) @for($i=0;$i<count($data3['label_nsw']);$i++) {{$data3['label_nsw'][$i]}}: <span class="badge text-white"> {{$data3['data_nsw'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> QLD </dt>
        <dd class="col-sm-9"> @if (empty($data4['label_qld'])) <span class="text-warning"> None </span> @elseif (!empty($data4['label_qld'])) @for($i=0;$i<count($data4['label_qld']);$i++) {{$data4['label_qld'][$i]}}: <span class="badge text-white"> {{$data4['data_qld'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> NT </dt>
        <dd class="col-sm-9"> @if (empty($data5['label_nt'])) <span class="text-warning"> None </span> @elseif (!empty($data5['label_nt'])) @for($i=0;$i<count($data5['label_nt']);$i++) {{$data5['label_nt'][$i]}}: <span class="badge text-white"> {{$data5['data_nt'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> SA </dt>
        <dd class="col-sm-9"> @if (empty($data6['label_sa'])) <span class="text-warning"> None </span> @elseif (!empty($data6['label_sa'])) @for($i=0;$i<count($data6['label_sa']);$i++) {{$data6['label_sa'][$i]}}: <span class="badge text-white"> {{$data6['data_sa'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> TAS </dt>
        <dd class="col-sm-9"> @if (empty($data7['label_tas'])) <span class="text-warning"> None </span> @elseif (!empty($data7['label_tas'])) @for($i=0;$i<count($data7['label_tas']);$i++) {{$data7['label_tas'][$i]}}: <span class="badge text-white"> {{$data7['data_tas'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> VIC </dt>
        <dd class="col-sm-9"> @if (empty($data8['label_vic'])) <span class="text-warning"> None </span> @elseif (!empty($data8['label_vic'])) @for($i=0;$i<count($data8['label_vic']);$i++) {{$data8['label_vic'][$i]}}: <span class="badge text-white"> {{$data8['data_vic'][$i]}} </span> @endfor @endif </dd>
        <dt class="col-sm-3"> WA </dt>
        <dd class="col-sm-9"> @if (empty($data9['label_wa'])) <span class="text-warning"> None </span> @elseif (!empty($data9['label_wa'])) @for($i=0;$i<count($data9['label_wa']);$i++) {{$data9['label_wa'][$i]}}: <span class="badge text-white"> {{$data9['data_wa'][$i]}} </span> @endfor @endif </dd>

      </dl>

    </div>
  </div>

  <div class="card">
    <div class="row">
      <div class="header">
        <h4 class="text-info col-md-4">{{ config('app.name') }} Contractors Per State </h4>
      </div>
    </div>

    <div class="row">
      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart" height="280" width="600"></canvas>
        </div>
      </div>

      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-nsw" height="280" width="600"></canvas>
        </div>
      </div>

      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-qld" height="280" width="600"></canvas>
        </div>
      </div>

      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-nt" height="280" width="600"></canvas>
        </div>
      </div>



    </div>

    <div class="row">
      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-sa" height="280" width="600"></canvas>
        </div>
      </div>


      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-tas" height="280" width="600"></canvas>
        </div>
      </div>

      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-vic" height="280" width="600"></canvas>
        </div>
      </div>

      <div class="pie-chart-container col-md-3">
        <div class="chart-container">
          <canvas id="bar-chart-wa" height="280" width="600"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- javascript -->

<script>
  $(function() {
    //get the pie chart canvas
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var ctx = $("#pie-chart");

    //pie chart data
    var data = {
      labels: cData.label,
      datasets: [{
        label: "Contractor Status",
        data: cData.data,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1]
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Contractor Status",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: true,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      }
    };

    //create Pie Chart class object
    var chart1 = new Chart(ctx, {
      type: "doughnut",
      data: data,
      options: options
    });



  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for ACT
    var cData = JSON.parse(`<?php echo $data2['chart_data2']; ?>`);
    var ctx = $("#bar-chart");

    //bar chart data
    var data = {
      labels: cData.label_act,
      datasets: [{
        label: "Australian Capital Territory Contractors",
        data: cData.data_act,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Australian Capital Territory Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for NSW
    var cData = JSON.parse(`<?php echo $data3['chart_data3']; ?>`);
    var ctx = $("#bar-chart-nsw");

    //bar chart data
    var data = {
      labels: cData.label_nsw,
      datasets: [{
        label: "New South Wales Contractors",
        data: cData.data_nsw,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "New South Wales Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for QLD
    var cData = JSON.parse(`<?php echo $data4['chart_data4']; ?>`);
    var ctx = $("#bar-chart-qld");

    //bar chart data
    var data = {
      labels: cData.label_qld,
      datasets: [{
        label: "Queensland Contractors",
        data: cData.data_qld,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Queensland Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for NT
    var cData = JSON.parse(`<?php echo $data5['chart_data5']; ?>`);
    var ctx = $("#bar-chart-nt");

    //bar chart data
    var data = {
      labels: cData.label_nt,
      datasets: [{
        label: "Northern Territory Contractors",
        data: cData.data_nt,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Northern Territory Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for SA
    var cData = JSON.parse(`<?php echo $data6['chart_data6']; ?>`);
    var ctx = $("#bar-chart-sa");

    //bar chart data
    var data = {
      labels: cData.label_sa,
      datasets: [{
        label: "Southern Australia Contractors",
        data: cData.data_sa,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Southern Australia Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for TAS
    var cData = JSON.parse(`<?php echo $data7['chart_data7']; ?>`);
    var ctx = $("#bar-chart-tas");

    //bar chart data
    var data = {
      labels: cData.label_tas,
      datasets: [{
        label: "Tasmania Contractors",
        data: cData.data_tas,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Tasmania Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for VIC
    var cData = JSON.parse(`<?php echo $data8['chart_data8']; ?>`);
    var ctx = $("#bar-chart-vic");

    //bar chart data
    var data = {
      labels: cData.label_vic,
      datasets: [{
        label: "Victoria Contractors",
        data: cData.data_vic,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Victoria Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas for WA
    var cData = JSON.parse(`<?php echo $data9['chart_data9']; ?>`);
    var ctx = $("#bar-chart-wa");

    //bar chart data
    var data = {
      labels: cData.label_wa,
      datasets: [{
        label: "Western Australia Contractors",
        data: cData.data_wa,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: [1, 1, 1, 1, 1, 1, 1],
        barPercentage: 0.5,
        categoryPercentage: 1,
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Western Australia Contractors",
        fontSize: 12,
        fontColor: "#111"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 10,
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true
          }
        }]
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

@endsection