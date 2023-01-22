<!DOCTYPE html>
<html lang="pt-br">

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],

        <?php
        include("../model/conexao.php");
        //$sql = "SELECT * FROM boletim";
        $sql = "SELECT SUM(branco) as branco, SUM(nulo) as nulo, SUM(valido)  as valido FROM boletim";
        $busca = mysqli_query($conectado, $sql);
        $registro = mysqli_fetch_array($busca);
        $total = $registro['branco'];
        $nulos = $registro['nulo'];
        ?>['nome teste', <?php echo $total ?>],
        ['Nulos', <?php echo $nulos ?>]
      ]);

      //   ['Sleep', 7]
      // ]);

      var options = {
        title: 'My Daily Activities',
        pieStartAngle: 100,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>