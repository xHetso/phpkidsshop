<?php
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "kidsshop"; // Имя базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Қосылым қатесі: " . $conn->connect_error);
}

// Получаем ID товара из параметра запроса
$product_id = $_GET['id'];

// Запрос для получения данных о товаре по ID
$sql = "SELECT * FROM products WHERE id = '$product_id'";
$result = $conn->query($sql);

// Проверяем наличие данных о товаре
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $price = $row["price"];
    $description = $row["description"];
    $category = $row["category"];
    $image_path = $row["image_path"];
    $created_at = $row["created_at"];
    $children = $row["children"];
} else {
    echo "Товар не найден.";
    exit;
}

// Обновление данных о товаре
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST["name"];
    $new_price = $_POST["price"];
    $new_description = $_POST["description"];
    $new_category = $_POST["category"];
    $new_image_path = $_POST["image_path"];
    $new_created_at = $_POST["created_at"];
    $new_children = $_POST["children"];

    // Запрос на обновление данных товара
    $update_sql = "UPDATE products SET name='$new_name', price='$new_price', description='$new_description', category='$new_category', image_path='$new_image_path', created_at='$new_created_at', children='$new_children' WHERE id='$product_id'";

    if ($conn->query($update_sql) === TRUE) {
        // Задержка 1 секунда перед перенаправлением на страницу admin.php
        sleep(1);
        // Перенаправляем пользователя на страницу admin.php
        header("Location: admin.php");
        exit;
    } else {
        echo "Ошибка при обновлении данных о товаре: " . $conn->error;
    }
}

// Закрываем соединение
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Редактирование товара</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 50px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    button[type="submit"] {
        background-color: #c56ca2;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #c56ca2;
    }
    .textarea{
        height:200px
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Тауарды өзгерту</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $product_id); ?>">
            <label for="name">Тауар аты:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>

            <label for="price">Бағасы:</label>
            <input type="text" name="price" id="price" value="<?php echo $price; ?>" required>

            <label for="description">Анықтамасы:</label>
            <textarea class="textarea" name="description" id="description" required><?php echo $description; ?></textarea>

            <label for="category">Категориясы:</label>
            <input type="text" name="category" id="category" value="<?php echo $category; ?>" required>

            <label for="image_path">Сурет жолы:</label>
            <input type="text" name="image_path" id="image_path" value="<?php echo $image_path; ?>" required>

            <label for="created_at">Тауар қосылған дата:</label>
            <input type="text" name="created_at" id="created_at" value="<?php echo $created_at; ?>" required>

            <label for="children">Қыз бала / Ер бала:</label>
            <input type="text" name="children" id="children" value="<?php echo $children; ?>" required>

            <button type="submit">Өзгерту</button>
        </form>
    </div>
</body>
</html>
