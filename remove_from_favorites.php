<?php
// Установите соединение с базой данных
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "kidsshop"; // Имя базы данных

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверьте, получен ли идентификатор товара
if (isset($_POST["productId"])) {
    $productId = $_POST["productId"];

    // Выполните запрос на удаление товара из таблицы "favorites" с указанным идентификатором
    $sql = "DELETE FROM favorites WHERE product_id = $productId";
    if ($conn->query($sql) === TRUE) {
        // Верните успешный статус HTTP 200, чтобы указать, что удаление прошло успешно
        http_response_code(200);
    } else {
        // Верните ошибку сервера, если удаление не удалось
        http_response_code(500);
    }
} else {
    // Верните ошибку, если идентификатор товара не был получен
    http_response_code(400);
}

// Закройте соединение с базой данных
$conn->close();
?>
