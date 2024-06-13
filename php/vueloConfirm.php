<?php 
 
// Configuración BBDD
$dbHost     = "localhost"; 
$dbUsername = "imvmbotc_admin"; 
$dbPassword = "BaconFrito33"; 
$dbName     = "imvmbotc_imvmbot"; 
 
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn = connectToDatabase();

// Obtener datos del formulario de vuelos
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fechaIda = $_POST['fecha-ida'];
$fechaVuelta = $_POST['fecha-vuelta'];
$claseCabina = $_POST['claseCabina'];
$franjaEdad = $_POST['franjaEdad'];

// Insertar datos en la base de datos
$stmt = $conn->prepare("INSERT INTO vuelos (origen, destino, fecha_ida, fecha_vuelta, clase_cabina, franja_edad) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $origen, $destino, $fechaIda, $fechaVuelta, $claseCabina, $franjaEdad);

if ($stmt->execute()) {
    echo "Vuelo añadido";
} else {
    echo "Error: " . $stmt->error;
}

// Obtener datos del formulario de cliente
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];

// Insertar datos en la base de datos
$stmt = $conn->prepare("INSERT INTO clientes (nombre, apellidos, dni, email, telefono, pais) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $apellidos, $dni, $email, $telefono, $pais);

if ($stmt->execute()) {
    echo "Reserva realizada con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$stmtCheck->close();
$stmt->close();
closeDatabaseConnection($conn);