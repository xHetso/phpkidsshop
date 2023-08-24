<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "kidsshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Қосылым қатесі: " . $conn->connect_error);
}

$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$category = $_POST["category"];
$image_path = $_POST["image_path"];
$children = $_POST["children"];

$sql = "INSERT INTO products (name, price, description, category, image_path, children)
        VALUES ('$name', '$price', '$description', '$category', '$image_path', '$children')";

if ($conn->query($sql) === TRUE) {
    echo "Товар успешно добавлен.";
    sleep(1);
    echo '<script>window.location.href = "admin.php";</script>';
    exit();
} else {
    echo "Ошибка при добавлении товара: " . $conn->error;
}

$conn->close();
?>
