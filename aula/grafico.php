<!DOCTYPE html>
<html lang="pt-br">

<head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current",{packages:["corechart"]});
            google.charts.setOnLoadCallback(drawchart);
            function drawchart() {
                var data = google.visualization.arrayToDataTable([
                    ['Produtos','Total'],
                    <?php
                        include 'conecta.php';
                        $sql = "SELECT descricao, count(id_produto) as total from pedidos group by descricao";
                        $consulta = mysqli_query($mysqli, $sql);
                        while ($dados = mysqli_fetch_array($consulta)) {
                            $descricao = $dados['descricao'];
                            $total = $dados['total'];
                    ?>
                    ['<?php echo $descricao ?>', <?php echo $total?>],
                    <?php } ?>
                ]);
                var options = {
                    legend: 'right',
                    title: 'Produtos Pedidos',
                    is3D: true,
                    pieHole: 0.3
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </head>

<body>
    <div id="piechart_3d" ></div>
</body>

</html>