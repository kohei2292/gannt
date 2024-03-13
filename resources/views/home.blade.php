@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <style>
        .wrap-chart {
            width: 100%;
            height: 300px;
        }
        @media (max-width: 480px) { //スマホサイズ用
            .wrap-chart {
                height: 200px;
            }
        }
    </style>
@endsection

@section('content')
<div id="gantt_here" style='width:100%; height:60%;'>
<!-- ここに表示します。-->
</div>
<div class="wrap-chart container-fluid">
    <div class="chart-container" style="position: relative; width: 200px; height: 200px; display:inline-block;">
        <canvas id="myPieChart">
        </canvas>
        
    </div>
    <div class="chart-container" style="position: relative; width: 200px; height: 200px; display:inline-block;">
        <canvas id="myBarChart">
        </canvas>
        
    </div>
</div>

@endsection

@section('scripts')
<script>
    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    gantt.i18n.setLocale("jp");
    gantt.config.scales = [
        {unit: "day", step: 1, format: "%F, %j"},
    ];
    gantt.config.columns = [
        {name:"text",       label:"Task name",  width:200, tree:true },
        {name:"start_date", label:"Start time", align:"center" },
        {name:"add",        label:"",width:44 }
    ];
    gantt.templates.progress_text = function (start, end, task) {
		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
	};
    gantt.init("gantt_here");
    gantt.load("api/data/" + {{ $auth->id }});
    var dp = new gantt.dataProcessor("api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
</script>
<script>
    var ctx = document.getElementById("myPieChart");
    ctx.width=window.innerWidth*0.1;
    ctx.height=window.innerHeight*0.1;
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Complete", "Stock"], //データ項目のラベル
        datasets: [{
            backgroundColor: [
                "#3a76d8",
                "#448aff",
            ],
            data: [60, 40] //グラフのデータ
        }]
      },
      options: {
        title: {
          display: true,
          //グラフタイトル
          text: '達成率'
        }
        ,maintainAspectRatio: false //これを追加
      }
    });
  </script>
<script>
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
       //凡例のラベル
        labels: ['1月', '2月', '3月', '4月', '5月'],
        datasets: [
          {
            label: '訪問者数', //データ項目のラベル
            data: [120,140,180,150,210], //グラフのデータ
            backgroundColor: "rgba(200,112,126,0.5)"
          },{
            label: 'PV数', //データ項目のラベル
            data: [190,230,380,320,480], //グラフのデータ
            backgroundColor: "rgba(80,126,164,0.5)"
          }
        ]
      },
      options: {
        title: {
          display: true,
          //グラフタイトル
          text: '実績'
        },
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 250, //最大値
              suggestedMin: 0, //最小値
              stepSize: 50, //縦ラベルの数値単位
              }
          }]
        },maintainAspectRatio: false //これを追加
      }
    });
  </script>
@endsection