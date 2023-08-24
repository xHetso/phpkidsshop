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

// Получение данных о товаре из POST-запроса
$productData = json_decode(file_get_contents('php://input'), true);

// Подготавливаем данные для вставки в запрос
$name = $productData['name'];
$price = $productData['price'];
$description = $productData['description'];
$imagePath = $productData['image_path'];
$size = $productData['size'];

// Проверяем, существует ли уже запись с таким же идентификатором товара и размером
$checkQuery = "SELECT * FROM basket WHERE name = '$name' AND size = '$size'";
$checkResult = $conn->query($checkQuery);

if ($checkResult && $checkResult->num_rows > 0) {
    // Запись уже существует, обрабатываем как ошибку
    http_response_code(409); // Код конфликта
    echo "Товар уже добавлен в корзину";
} else {
    // Записи не существует, выполняем добавление в базу данных
    $sql = "INSERT INTO basket (name, price, description, image_path, size) VALUES ('$name', '$price', '$description', '$imagePath', '$size')";

    if ($conn->query($sql) === TRUE) {
        // Успешно добавлено в базу данных
        http_response_code(200);
        echo "Товар успешно добавлен в корзину";
    } else {
        // Ошибка при добавлении в базу данных
        http_response_code(500);
        echo "Ошибка при добавлении товара в корзину";
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>
