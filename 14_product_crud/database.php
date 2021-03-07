<?php
// PDO is a class that we can connect any DB within.
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=exampleCrud', 'root', '');

// when connecting with DB, and there is exception then throw it.
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;