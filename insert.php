<!DOCTYPE html>
<html>
<head>
    <title>Добавление товара</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .success {
            color: #4CAF50;
            font-weight: bold;
        }

        .error {
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Добавление товара</h1>

    <form action="" method="post">
        <label for="name">Название товара:</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Цена:</label>
        <input type="number" name="price" id="price" required>

        <label for="description">Описание:</label>
        <textarea name="description" id="description" rows="5" required></textarea>

        <label for="category">Категория:</label>
        <input type="text" name="category" id="category" required>

        <label for="image_path">Путь к изображению:</label>
        <input type="text" name="image_path" id="image_path" required>

        <label for="created_at">Дата создания:</label>
        <input type="text" name="created_at" id="created_at" required>

        <label for="children">Детский товар:</label>
        <input type="checkbox" name="children" id="children">

        <input type="submit" value="Добавить товар">
    </form>

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

    // Получаем данные из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $image_path = $_POST['image_path'];
        $created_at = $_POST['created_at'];
        $children = isset($_POST['children']) ? 1 : 0;

        // Подготавливаем и выполняем SQL-запрос для добавления товара
        $sql = "INSERT INTO products (name, price, description, category, image_path, created_at, children)
                VALUES ('$name', $price, '$description', '$category', '$image_path', '$created_at', $children)";

        if ($conn->query($sql) === TRUE) {
            echo '<p class="success">Товар успешно добавлен.</p>';
        } else {
            echo '<p class="error">Ошибка при добавлении товара: ' . $conn->error . '</p>';
        }
    }

    // Закрываем соединение
    $conn->close();
    ?>

</body>
</html>
