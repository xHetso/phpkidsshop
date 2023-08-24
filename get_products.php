<?php
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "kidsshop"; // Имя базы данных

// Получаем выбранную категорию и параметр сортировки из параметров запроса
$category = isset($_GET['category']) ? $_GET['category'] : ''; // По умолчанию без категории
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'new'; // По умолчанию сортировка по новизне
$children = isset($_GET['children']) ? $_GET['children'] : '';

// Создаем соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Подготавливаем SQL запрос для извлечения данных о продуктах
$sql = "SELECT * FROM products";

// Если выбрана категория, добавляем условие WHERE в SQL запрос
if (!empty($category)) {
    $sql .= " WHERE category = '$category'";
    if (!empty($children)) {
        $sql .= " AND children = '$children'";
    }
} elseif (!empty($children)) {
    $sql .= " WHERE children = '$children'";
}


// Добавляем условие сортировки
switch ($sort) {
    case 'new':
        $sql .= " ORDER BY created_at DESC";
        break;
    case 'price_asc':
        $sql .= " ORDER BY price ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY price DESC";
        break;
    default:
        break;
}

$result = $conn->query($sql);

// Проверяем, есть ли данные
if ($result->num_rows > 0) {
    // Создаем массив для хранения данных о продуктах
    $products = array();

    // Извлекаем данные о продуктах и сохраняем их в массив
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Выводим отформатированный HTML для списка продуктов
    foreach ($products as $product) {
        echo '<div class="col-md-3">';
        echo '<div class="product__card">';
        echo '<a href="one-product.php?id=' . $product['id'] . '">';
        echo '<img class="product__img__collection" src="' . $product['image_path'] . '" alt="">';
        echo '</a>';
        echo '<div class="product__info home">';
        echo '<div>';
        echo '<h5 class="product__title">' . $product['name'] . '</h5>';
        echo '<h5 class="product__price">' . $product['price'] . ' тг.</h5>';
        echo '</div>';
        echo '<div>';
        echo '<a href="#"><i class="icon-favorite"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Нет данных о продуктах";
}

// Закрываем соединение с базой данных
$conn->close();
?>
