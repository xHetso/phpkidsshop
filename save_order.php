<?php
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "kidsshop"; // Имя базы данных

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Вставка данных в таблицу orders
$orderSql = "INSERT INTO orders (order_id, name, address, phone) VALUES (?, ?, ?, ?)";
$orderStmt = $conn->prepare($orderSql);
$orderStmt->bind_param("ssss", $orderId, $name, $address, $phone);

// Генерация уникального order_id
$orderId = intval(uniqid());

// Выполнение запроса
$orderStmt->execute();

// Получение последнего вставленного идентификатора заказа
$orderId = $conn->insert_id;

// Вставка данных из таблицы cart
$cartSql = "INSERT INTO cart (order_id, image_path, name, size, price, quantity) VALUES (?, ?, ?, ?, ?, ?)";
$cartStmt = $conn->prepare($cartSql);

// Получение данных из таблицы basket
$basketSql = "SELECT * FROM basket";
$basketResult = $conn->query($basketSql);

if ($basketResult->num_rows > 0) {
    // Вставка каждой записи из таблицы basket
    while ($row = $basketResult->fetch_assoc()) {
        $cartStmt->bind_param("ssssdi", $orderId, $row['image_path'], $row['name'], $row['size'], $row['price'], $row['quantity']);
        $cartStmt->execute();
    }
}

// Закрытие соединения с базой данных
$conn->close();

// Перенаправление на другую страницу после сохранения данных
header("Location: success_page.php");
exit();
?>

success_page.php:
<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
</head>
<body>
    <h1>Заказ успешно сохранен!</h1>
    <p>Благодарим вас за ваш заказ. Мы обработаем его в ближайшее время.</p>
</body>
</html>