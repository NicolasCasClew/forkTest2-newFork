<?php

session_start();

require("../session_check.php");

echo "<h3> Usuario = '$_SESSION[correo]'</h3>";

function checkCreateProduct($name, $price, $imagen, $select)
{
    if (nameCheck($name) && isNumberCheck($price) && imageCheck($imagen) && selectCheck($select)) {
        return true;
    } else {
        return false;
    }
}
function selectCheck($select)
{

    if (empty($select)) {
        echo "ERROR - Elige una categoria";
        return false;
    } else {
        return true;
    }
}

function imageCheck($imagen)
{
    if ($imagen == "") {
        echo "La imagen no puede estar vacia";
        return false;
    } else {
        return true;
    }
}

function nameCheck($name)
{

    if ($name == "") {
        echo "El nombre esta vacio";
        return false;
    }
    $pattern = "/^\S*$/";

    if (preg_match($pattern, $name) == 1) {
        return true;
    } else {
        echo "Error en el nombre, no puede contener espacios";
        return false;
    }
}
function isNumberCheck($num)
{
    if (is_numeric($num)) {
        return true;
    } else {
        echo "Error en el precio";
        return false;
    }
}


//select

//delete

//modify