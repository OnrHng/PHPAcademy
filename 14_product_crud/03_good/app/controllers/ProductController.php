<?php

namespace app\controllers;

use app\Router;
use app\models\Product;

class ProductController
{
    public static function index(Router $router) {
        $search = $_GET['search'] ?? '';
        $products = $router->db->getProducts($search);
        $router->renderView('products/productIndex', [
            'products' =>  $products,
            'search' => $search
        ]);
    }

    public static function create(Router $router) {
        $errors = [];

        $productData = [
            'title' => '',
            'description' => '',
            'image' => '',
            'price' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData['title'] = $_POST['title'];
            $productData['description'] = $_POST['description'];
            $productData['price'] = (float)$_POST['price'];
            $productData['imageFile'] = $_FILES['image'] ?? null;

            $product = new Product();
            $product->loadData($productData);

            $errors = $product->save();
            if (empty($errors)) {
                header('Location: /products');
                exit;
            }
        }

        $router->renderView('products/create', [
            'product' =>  $productData,
            'errors' => $errors
        ]);

    }

    public static function update(Router $router) {
        $errors = [];
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /products');
            exit;
        }
        $productData = $router->db->getProductById($id);
        echo '<pre>';
        var_dump($productData);
        echo '</pre>';
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData['title'] = $_POST['title'];
            $productData['description'] = $_POST['description'];
            $productData['price'] = $_POST['price'];
            $productData['imageFile'] = $_FILES['image'] ?? null;

            $product = new Product();
            $product->loadData($productData);
            if (empty($errors)) {
                header('Location: /products');
                exit;
            }
        }

        $router->renderView('products/update', [
            'product' =>  $productData,
            'errors' => $errors
        ]);

    }

    public static function delete(Router $router) {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /products');
            exit;
        }
        $router->db->deleteProduct($id);
        header('Location: /products');
    }
}