<?php
require_once('classes/database.php');

if (isset($_POST['user_name'])) {
    $username = $_POST['user_name'];
    $con = new database();

    $query = $con->opencon()->prepare("SELECT user_name FROM users WHERE user_name = ?");
    $query->execute([$username]);
    $existingUser = $query->fetch();

    if ($existingUser) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
