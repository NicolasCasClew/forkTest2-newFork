<!DOCTYPE html>
<?php
$id = $_POST['ID'];
//$nombre = $_POST['NOMBRE'];
//$fileDir = $_POST["FILE"];
$dbData = array(
    "servername" => "",
    "username" => "",
    "password" => "",
    "dbname" => ""
);
$defaultFile = fopen("../user_data.txt", "r");

foreach ($dbData as $index => $value) {
    $newLine = fgets($defaultFile);
    $dbData[$index] = trim($newLine);
}
$mysqli = new mysqli($dbData["servername"], $dbData["username"], $dbData["password"], $dbData["dbname"]);


if ($mysqli->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$query = "SELECT id, nombre, imagen FROM productos WHERE id = $id";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result);
$nombre = $row[1];
$fileDir = $row[2];


$sql = "DELETE FROM productos WHERE id=$id";
unlink($row[2]);
if ($mysqli->query($sql) === TRUE) {
    echo "Producto $nombre eliminado con exito";
} else {
    echo "Error : " . $conn->error;
}
echo "<br>";
echo "<a href= '../index.php'>Menu principal</a>"

?>