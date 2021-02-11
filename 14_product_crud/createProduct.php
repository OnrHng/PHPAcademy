<?php

// PDO is a class that we can connect any DB within.
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=exampleCrud', 'root', '');

// when connecting with DB, and there is exception then throw it.
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //

/*
 * How can you get data using GET?
 * There you can use the super global variable like _GET
 * */

//var_dump($_GET);
//var_dump($_POST);

/* IMPORTANT!!
her sayfa yeniden yuklendiginde form otomatik olarak icindeki verileri bos bile olsa GET methodu ile gondermeye calisiyor
bundan dolayi super global variable olan SERVER kullanmaliyiz.
 * */

//var_dump($_SERVER); you can see which values has SERVER
//var_dump($_SERVER['REQUEST_METHOD']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// receives data from Form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');


    // FORM VALIDATION
    if (!trim($title)){
        $errors[] = 'Product title is required';
    }
    if (!$price){
        $errors[] = 'Product Price is required';
    }

    // there isnot any error then insert data into db
    if (empty($errors)) {

        // prepare statement
        $statement = $pdo->prepare("INSERT INTO products (image, title, description, price, create_date)
                        VALUES (:image, :title, :description, :price, :date)");

        $statement->bindValue(':image', '');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);

        $statement->execute();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--     Bootstrap CSS -->
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>PRODUCTS</title>
</head>
<body>
<h1>Create New Product</h1>

<!--ERRORs of FROM VALIDATION-->
<?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<!--
    GET vs POST
    html form da get ve post bu iki method da veri gonderir. arasindaki en onemli farklardan biri; get ile gonderilen
    veriler adres satirinda URL de gozukur. If you send some sensitive data like username or password, you shouldn't
    use GET. And also Get need name property inside the all form tag. Get get data using name attribute.

    and search funktion inside the website. All search data is seen on the URL
-->
<form action="" method="post">
    <div class="mb-3">
        <label>Product Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>