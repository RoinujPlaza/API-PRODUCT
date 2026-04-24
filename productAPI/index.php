<?php

header("Content-Type: application/json");
require_once __DIR__ . "/api/product.php";
require_once __DIR__ . "/api/db.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = trim($_SERVER["REQUEST_URI"], "/");

if ($uri == "") {
    echo "API Home Running";
    exit;
}

if (str_starts_with($uri, "api")) {
    require __DIR__ . "index.php";
    exit;
}

http_response_code(404);
echo "Route not found";

switch ($method) {

    case "GET":
        if ($id) {
            Product::getById($conn, $id);
        } else {
            Product::getAll($conn);
        }
        break;

    case "POST":
        $data = json_decode(file_get_contents("php://input"), true);
        Product::create($conn, $data);
        break;

    case "PUT":
        $data = json_decode(file_get_contents("php://input"), true);
        Product::update($conn, $id, $data);
        break;

    case "DELETE":
        Product::delete($conn, $id);
        break;

    default:
        echo json_encode(["message" => "Method not allowed"]);
}