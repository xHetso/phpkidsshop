<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "kidsshop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$deleteProduct = $_POST['deleteProduct'];

if ($deleteProduct == 'true') {
    $sql = "DELETE FROM basket WHERE id = $productId";
} else {
    $sql = "UPDATE basket SET quantity = $quantity WHERE id = '$productId'";
}

if ($conn->query($sql) === TRUE) {
    // Обновление общей суммы заказа
    $sql = "SELECT SUM(price * quantity) AS total FROM basket";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalAmount = $row['total'];

    // Получение данных пользователя из формы
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $products = serialize($_POST['products']); // Сериализация выбранных товаров для сохранения в базе данных

    // Вставка данных пользователя и товаров в таблицу orders
    $sql = "INSERT INTO orders (name, address, phone, total_amount, products) VALUES ('$name', '$address', '$phone', '$totalAmount', '$products')";
    if ($conn->query($sql) === TRUE) {
        echo "Заказ успешно сохранен.";
    } else {
        echo "Ошибка при сохранении заказа: " . $conn->error;
    }
} else {
    echo "Ошибка при обновлении количества товара: " . $conn->error;
}

$conn->close();
?>
