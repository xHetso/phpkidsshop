<?php
    // Получение данных из AJAX-запроса
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $deleteProduct = $_POST['deleteProduct'];

    // Установка параметров подключения к базе данных
    $servername = "127.0.0.1"; // Имя сервера базы данных
    $username = "root"; // Имя пользователя базы данных
    $password = "root"; // Пароль пользователя базы данных
    $dbname = "kidsshop"; // Имя базы данных

    // Подключение к базе данных
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Обновление количества продукта в базе данных
    $sql = "UPDATE basket SET quantity = $quantity WHERE id = $productId";
    $result = $conn->query($sql);

    // Удаление продукта из базы данных, если указано удаление
    if ($deleteProduct) {
        $sql = "DELETE FROM basket WHERE id = $productId";
        $result = $conn->query($sql);
    }

    // Закрытие соединения с базой данных
    $conn->close();

    // Возвращение успешного ответа
    echo "Success";
?>