<?php
// to connect with DB import database.php
$pdo = require_once "database.php";

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


#####    FILES UPLOADING ####
// we can use super global _FILES and should add from an attribute which is enctype


$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

// update statement
$statement = $pdo -> prepare("SELECT * FROM products WHERE id = :id");
$statement -> bindValue(':id', $id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];
$title = $product['title'] ?? null;
$description = $product['description'] ?? null;
$price = $product['price'] ?? null;

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

    if (!is_dir(__DIR__.'/images')) {
        mkdir(__DIR__.'/images');
    }

    // there isnot any error then insert data into db
    if (empty($errors)) {
        // find old image folder
        $oldDirName = dirname($product['image']);
        if($product['image']) {
            // first delete all files in the folder
            array_map('unlink', glob("$oldDirName/*.*"));
            // delete folder
            rmdir($oldDirName);

        }

        // upload image
        $imagePath = null;
        $image = $_FILES['image'] ?? null;
        if ($image['tmp_name']) {

            // upload new one
            $imagePath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);

        }

        // prepare statement
        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description,
                    price = :price WHERE id = :id");

        $statement->bindValue(':image', $imagePath); // for db give imagepath has also image name with pat
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();

        // after create a product, go index page
        header("Location: index.php");
    }
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
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
    <title>Update Product</title>
</head>
<body>

<a href="index.php" class="btn btn-secondary">Go Back To Products</a>
<h1>Update Product <b><?php echo $product['title']?></b> </h1>

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
<form action="" method="post" enctype="multipart/form-data">
    <?php if ($product['image']) :  ?>
        <img src="<?php echo($product['image']) ?>" alt="" class="update-image">
    <?php endif;  ?>

    <div class="mb-3">
        <label>Product Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <input type="text" name="description" class="form-control" value="<?php echo $description ?>">
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>