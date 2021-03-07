<?php

// PDO is a class that we can connect any DB within.
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=exampleCrud', 'root', '');

// when connecting with DB, and there is exception then throw it.
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //

$statement = $pdo -> prepare("SELECT * FROM products ORDER BY create_date DESC");// it returns statement of PDO class
// run the statement
$statement->execute(); // make query in the DB

$products = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch all data as an associate array

//print_r($products);

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
<h1>PRODUCTS</h1>
<p>
    <a href="createProduct.php" class="btn btn-success">New Product</a>
</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $i => $product) : ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <img src="<?php echo $product['image']  ?>" alt="" class="images">
            </td>
            <td><?php echo $product['title']  ?></td>
            <td><?php echo $product['price']  ?></td>
            <td><?php echo $product['create_date']  ?></td>
            <td>
                <a href="updateProduct.php?id=<?php echo $product['id'] ?>"  class="btn btn-sm btn-outline-primary">EDIT</a>

                <form style="display: inline-block"  action="deleteProduct.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                </form>

            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>

</body>
</html>