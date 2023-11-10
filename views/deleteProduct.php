<!DOCTYPE html>
<html>
<?php



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


if (empty($_GET["eliminar"])) {
    //eliminar por id

    $query = "SELECT id, nombre, imagen FROM productos";
    $result = $mysqli->query($query);
    echo '<form action="../controllers/deleteProduct.php" method="post" enctype="multipart/form-data">';
    echo "<label for='eliminar'>Eliminar producto : </label>";
    echo '<select name="ID">';

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nombre = $row['nombre'];

        echo '<option  value="' . $id . '">' . $nombre . '</option>';
    }
    echo '</select>';
    echo '<br>';
    echo '<br>';
    echo " <input type='submit' value='ELIMINAR PRODUCTO'>";
    echo "</form>";
} else {
    $id = $_GET["eliminar"];
    //mostrar productos y eliminar ahi
    //echo 'ELIMINAMOS EL PRODUCTO CON ID ' . $_GET["eliminar"];
    $query = "SELECT id, nombre, imagen FROM productos WHERE id = $id";
    $result = $mysqli->query($query);
    $row = mysqli_fetch_array($result);
    //print_r($row);
    echo "Estas seguro de eliminar el producto $row[1]?";
    echo "<br>";
    echo '<form action="../controllers/deleteProduct.php" method="post" enctype="multipart/form-data">';



    echo "<input type='hidden' name='ID' value='$id' >";
    //echo "<input type='hidden' name='NOMBRE' value='$row[1]' >";
    //echo "<input type='hidden' name='FILE' value='$row[2]' >";
    echo " <input type='submit' value='SI'>";
    echo "</form>";
    echo "<br>";
    echo "<a href= '../index.php'>VOLVER</a>"; //
}
?>

</html>