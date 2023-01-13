

<?php

// 1. Solicitamos un token

// Dirección de la API
$apiUrl = "https://postulaciones.solutoria.cl/api/acceso";

// Creamos un array con las credenciales
$credenciales = array(
    "userName" => "correodelpostulante",
    "flagJson" => true
);

// Convertimos el array a formato JSON
$credencialesJson = json_encode($credenciales);

// Inicializamos curl
$ch = curl_init();

// Establecemos la URL y otras opciones
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $credencialesJson);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Establecemos la cabecera HTTP para enviar el JSON
$headers = array(
    "Content-Type: application/json",
    "Content-Length: " . strlen($credencialesJson)
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ejecutamos la petición y obtenemos la respuesta
$response = curl_exec($ch);

// Cerramos la sesión curl
curl_close($ch);

// Decodificamos la respuesta JSON
$responseJson = json_decode($response, true);

// Obtenemos el token del array decodificado
$token = $responseJson["token"];

// 2. Importamos los datos a la base de datos

// Dirección de la API
$apiUrl = "https://postulaciones.solutoria.cl/api/indicadores";

// Inicializamos curl
$ch = curl_init();

// Establecemos la URL y otras opciones
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Establecemos la cabecera HTTP para enviar el token
$headers = array(
    "Authorization: Bearer $token"
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ejecutamos la petición y obtenemos la respuesta
$response = curl_exec($ch);

// Cerramos la sesión curl
curl_close($ch);

// Decodificamos la respuesta JSON
$indicadores = json_decode($response, true);

// Conectamos a la base de datos
$host = "localhost";

/*echo "<pre>";Si queremos ver los datos en pantalla
print_r($indicadores);
echo "</pre>";*/




$host = "localhost";
$user = "Usuario-BD";
$password = "Password-BD";
$dbname = "Name-BD";

// Creamos la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

/// Prepara la sentencia SQL para insertar un nuevo registro
$sql = "INSERT INTO indicadors (id, nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Recorremos el array de indicadores y agregamos cada uno a la base de datos
foreach ($indicadores as $indicador) {
    $stmt->bind_param('isssdsss', $indicador["id"], $indicador["nombreIndicador"], $indicador["codigoIndicador"], $indicador["unidadMedidaIndicador"], $indicador["valorIndicador"], $indicador["fechaIndicador"], $indicador["tiempoIndicador"], $indicador["origenIndicador"]);
    $stmt->execute();
}



// Cierra la sentencia y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conn);
