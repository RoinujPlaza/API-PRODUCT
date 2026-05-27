<?php
require_once "config.php";

class Product {

    public static function getAll($conn) {
        $result = $conn->query("SELECT * FROM products");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public static function getById($conn, $id) {
        $result = $conn->query("SELECT * FROM products WHERE id=$id");
        echo json_encode($result->fetch_assoc());
    }

    public static function create($conn, $data) {
        $product = $data['product'];
        $price = $data['price'];

        $conn->query("INSERT INTO products (product, price) VALUES ('$product', '$price')");

        echo json_encode(["message" => "Product added"]);
    }

    public static function update($conn, $id, $data) {
        $product = $data['product'];
        $price = $data['price'];

        $conn->query("UPDATE products SET product='$product', price='$price' WHERE id=$id");

        echo json_encode(["message" => "Updated"]);
    }

    public static function delete($conn, $id) {
        $conn->query("DELETE FROM products WHERE id=$id");

        echo json_encode(["message" => "Deleted"]);
    }
}
