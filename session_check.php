<?php


if (!isset($_SESSION["correo"])) {
    header("Location: login_form.php");
}
