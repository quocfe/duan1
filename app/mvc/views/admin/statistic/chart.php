<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {
  packages: ["corechart"]
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Loại', 'Số Lượng'],
    <?php
            foreach ($items as $item) {
                echo "['$item[cate_name]',     $item[quantity]],";
            }
            ?>
  ]);

  var options = {
    title: 'TỶ LỆ HÀNG HÓA',
    is3D: false,
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
}
</script>
</head>

<body>
  <div class="mx-auto w-50 mt-4">
    <h3 class="text-center" style="color: #fff;">BIỂU ĐỒ THỐNG KÊ</h3>
    <div id="piechart_3d" style="width: 700px; height: 500px;"></div>
    <a href="<?=base_url('admin/list')?>" class="btn-info text-white mb-2"
      style="bottom: 0; padding: 10px; position: absolute;">Xem thống
      kê hàng hóa từng loại<i class="fas fa-eye ml-2"></i></a>
  </div>
</body>

</html>