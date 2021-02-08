@extends('layouts.vendor')

@section('content')
<div class="card">
  <div class="row">
    <div class="header">
      <h4 class="text-info col-md-4"> Mandatory Document Status </h4>
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
        <h5 class="text-info col-sm-9"> Mandatory Document Status </h5>
      </div>
      <dl class="row">
        @for($i=0;$i<count($data['label']);$i++) <dt class="col-sm-3">{{$data['label'][$i]}} </dt>
          <dd class="col-sm-9"> <span class="badge text-white"> {{$data['data'][$i]}} </span></dd>
          @endfor
          <dt class="col-sm-3"> Compliance </dt> <dd class="col-sm-9"> {{$data['compliance']}} </dd>
      </dl>
      <div class="row">
        <h5 class="text-info col-sm-9">Additional Details </h5>
      </div>

      <dl class="row">
        <dt class="col-sm-3"> Additional Details </dt>
        <dd class="col-sm-9"> Under <span class="text-warning"> Development </span> </dd>

      </dl>

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
        label: "Mandatory Document Status",
        data: cData.data,
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',            
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',            
          'rgba(255, 99, 132, 1)',
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
        text: "Mandatory Document Status",
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



@endsection