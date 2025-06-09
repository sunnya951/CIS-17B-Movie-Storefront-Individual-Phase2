<?php
$movies = [
    [
        "id" => 1,
        "title" => "The Matrix",
        "genre" => "Sci-Fi",
        "price" => 14.99,
        "stock" => 10
    ],
    [
        "id" => 2,
        "title" => "Inception",
        "genre" => "Action",
        "price" => 12.99,
        "stock" => 7
    ],
    [
        "id" => 3,
        "title" => "Interstellar",
        "genre" => "Adventure",
        "price" => 13.49,
        "stock" => 5
    ],
];

header('Content-Type: application/json');
echo json_encode($movies);
?>