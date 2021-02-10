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
          <dd class="col-sm-9"> <span class="badge text-white">  <small> {{$data['data'][$i]}}  </small> </span>  </dd>
          @endfor
          <dt class="col-sm-3"> Compliance </dt>
          <dd class="col-sm-9"> <small> {{$data['compliance']}} </small> </dd>
          <dt class="col-sm-3"> Missing </dt> <br />  <dd class="col-sm-9"> @if (empty($data['missing'])) <small> <i class="fa fa-circle text-info"> </i> None </small> @elseif (!empty($data['missing'])) @for($i=0;$i<count($data['missing']);$i++) <small> <i class="fa fa-circle text-danger"> </i>  {{$data['missing'][$i]}}  </small>  @endfor </dd> @endif

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

<div class="row">
  <div class="pie-chart-container col-md-6">
      <div class="chart-container">
        <canvas id="doughnut-chart" height="280" width="600"></canvas>
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
    //get the doughnut chart canvas
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var ctx = $("#pie-chart");

    //pie chart data
    var data = {
      labels: cData.label,
      datasets: [{
        label: "Mandatory Document Status",
        data: cData.data,
        backgroundColor: [
          "#003F5C",
              "#58508D",
              "#BC5090",
              "#FF6361",
              "#FFA600",
        ],
        borderColor: [
          "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
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
        text: "Required Documents",
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
    //get the pie chart canvas
    var cData = JSON.parse(`<?php echo $PieChart['chart_data']; ?>`);
    var ctx = $("#doughnut-chart");

    //pie chart data
    var data = {
      labels: cData.label,
      datasets: [{
        label: "Document Status",
        data: cData.data,
        backgroundColor: [
          "#003F5C",
              "#58508D",
              "#BC5090",
              "#FF6361",
              "#FFA600",

        ],
        borderColor: [
          "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
              "#FFFFFF",
 
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
        text: "My Documents Status",
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
      type: "pie",
      data: data,
      options: options
    });



  });
</script>


@endsection