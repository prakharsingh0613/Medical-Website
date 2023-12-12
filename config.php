<?php

$conn = mysqli_connect("localhost", "root", "", "wellnesswise");

if (!$conn) {
    echo "Connection Failed";
}