<?php
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "kidsshop"; // Имя базы данных

// Создаем соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Проверяем, существует ли айди товара в запросе
if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    // Проверяем, существует ли уже запись в таблице favorites с указанным айди товара
    $checkQuery = "SELECT * FROM favorites WHERE product_id = $productId";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Товар уже добавлен в избранное
        http_response_code(409);
        die();
    } else {
        $productQuery = "SELECT * FROM products WHERE id = $productId";
        $productResult = $conn->query($productQuery);

        if ($productResult->num_rows > 0) {
            $productData = $productResult->fetch_assoc();
            $productName = $conn->real_escape_string($productData['name']);
            $productPrice = $conn->real_escape_string($productData['price']);
            $productDescription = $conn->real_escape_string($productData['description']);
            $productImagePath = $conn->real_escape_string($productData['image_path']);
        }
    }

    // Выполняем запрос для добавления товара в таблицу favorites
    $insertQuery = "INSERT INTO favorites (product_id, name, price, description, image_path) VALUES ($productId, '$productName', '$productPrice', '$productDescription', '$productImagePath')";
    if ($conn->query($insertQuery) === TRUE) {
        // Товар успешно добавлен в избранное
        http_response_code(200);
    } else {
        // Ошибка при добавлении товара в избранное
        http_response_code(500);
    }
} else {
    // Не указан айди товара
    http_response_code(400);
}

// Закрываем соединение с базой данных
$conn->close();
?>
