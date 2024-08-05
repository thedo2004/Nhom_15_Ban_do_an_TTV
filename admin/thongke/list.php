<div class="table">    
           <div class="title" ><h2 style="text-align: center;"> Thống kê sản phẩm theo loại</h2></div>
           <a href="index.php?act=bieudo"><button type="button" class="btn btn-primary" style="margin-left: 80px; margin-top:30px;">Biểu đồ</button> </a>  
       <table class="table">        
            <thead>
              <tr>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá cao nhất</th>
                <th scope="col">Giá thấp nhất</th>
                <th scope="col">Giá trung bình</th>
              </tr>
            </thead>
            <tbody>
            <?php
                foreach ($listthongke1 as $thongke1) {
                    extract($thongke1);
                    echo '<tr>
                    <td>'.$iddanhmuc.'</td>
                    <td>'.$namedanhmuc.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$maxprice.'</td>
                    <td>'.$minprice.'</td>
                    <td>'.$avgprice.'</td>
                    <tr>
                    ';
                }
              ?>
            </tbody>
            
          </table>
          
          </div> 
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