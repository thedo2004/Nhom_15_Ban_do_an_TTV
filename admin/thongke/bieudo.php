<!DOCTYPE html>
<html>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>



<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm=count($listthongke1); 
  $i=1;
  foreach($listthongke1 as $thongke1){
    extract($thongke1);
    if ($i==$tongdm) $dauphay="";else $dauphay=",";

    echo"['".$thongke1['namedanhmuc']."',".$thongke1['countsp']."]".$dauphay;} ?>

]);

// Set Options
const options = {
  title:'Biểu đồ thống kê sản phẩm theo loại'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>

//
</body>
</html>



