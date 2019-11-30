<?php
$color = $_POST['color'];
setcookie("colorElegido", $color, time() + 60 * 60 * 24);
if (isset($_COOKIE['colorElegido'])) {
    header('Location: cookies1_.php');
}
