<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
 　　 <!-- 今回はCDNを使用 -->
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dhtmlxgantt_material.css">
    <style>
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div id="gantt_here" style='width:100%; height:100%;'>
<!-- ここに表示します。-->
</div>

<script>
    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    gantt.i18n.setLocale("jp");
    gantt.config.scales = [
    {unit: "day", step: 1, format: "%F, %j"},
    ];
    gantt.init("gantt_here");
    gantt.load("api/data");
    var dp = new gantt.dataProcessor("api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
</script>
</body>