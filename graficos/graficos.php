<?php

$con = new mysqli("localhost","root","","name DB"); // Conectar a la BD
$sql = "SELECT fechaIndicador, valorIndicador FROM products ORDER BY fechaIndicador DESC"; // Consulta SQL
$query = $con->query($sql); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafica de Barra y Lineas con PHP y MySQL</title>
    <script src="chart.min.js"></script>
</head>
<body>
<h1>Grafica de Barra y Lineas con PHP y MySQL</h1>
<canvas id="chart1" style="width:100%;" height="100"></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->fechaIndicador?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Fechas',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->valorIndicador;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };


var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };


var chart1 = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});
</script>
</body>
</html>