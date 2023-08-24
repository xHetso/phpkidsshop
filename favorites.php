<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Shop</title>
    <style>
        .logo_style{
            height: 140px;
        }
        .icon-favorite:before {
            content: "\e902";
            color: red;
            }
    </style>

    <link rel="stylesheet" href="css/products.css">
</head>

<body>
    <section class="section__navbar">
        <div class="container">
        <div class="navbar">
            
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">
                    <div class="menu-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="/">Басты бет</a>
                  <a href="/allproducts.php">Барлық тауарлар</a>
                  <a href="/about.php">Байланысу</a>
                </div>
            </div>
            <a href="#" class="logo">
				<img src="img/LOGO_NAME.png" alt="">
			</a>
            <ul class="icons">
                <li>
                    <a href="#">
                        <a href="/basket.php"><i class="icon-basket fs-30"></i></a>
                        <span class="counter">
                        <?php
                            // Подключение к базе данных
                            $servername = "127.0.0.1"; // Имя сервера базы данных
                            $username = "root"; // Имя пользователя базы данных
                            $password = "root"; // Пароль пользователя базы данных
                            $dbname = "kidsshop"; // Имя базы данных

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                            die("Ошибка подключения к базе данных: " . $conn->connect_error);
                            }

                            // Запрос для получения количества товаров
                            $sql = "SELECT COUNT(*) AS total FROM basket";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row["total"]; // Выводим количество товаров
                            } else {
                            echo "0"; // Если нет товаров, выводим 0
                            }

                            // Закрываем соединение с базой данных
                            $conn->close();
                        ?>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="/favorites.php"><i class="icon-favorite fs-30"></i></a>
                    <span class="counter">
                        <?php
                            // Подключение к базе данных
                            $servername = "127.0.0.1"; // Имя сервера базы данных
                            $username = "root"; // Имя пользователя базы данных
                            $password = "root"; // Пароль пользователя базы данных
                            $dbname = "kidsshop"; // Имя базы данных

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                            die("Ошибка подключения к базе данных: " . $conn->connect_error);
                            }

                            // Запрос для получения количества товаров
                            $sql = "SELECT COUNT(*) AS total FROM favorites";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row["total"]; // Выводим количество товаров
                            } else {
                            echo "0"; // Если нет товаров, выводим 0
                            }

                            // Закрываем соединение с базой данных
                            $conn->close();
                        ?>
                    </span>
                </li>
            </ul>
            </div>
        </div>
    </section>


        <section class="section section__product">
        <div class="container">
            <div class="row">
                <?php
                // Устанавливаем соединение с базой данных
                $servername = "127.0.0.1"; // Имя сервера базы данных
                $username = "root"; // Имя пользователя базы данных
                $password = "root"; // Пароль пользователя базы данных
                $dbname = "kidsshop"; // Имя базы данных

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                // Выполняем запрос для получения данных из таблицы "favorites"
                $sql = "SELECT name, price, image_path, product_id FROM favorites";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Выводим данные каждого товара
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                        $price = $row["price"];
                        $imagePath = $row["image_path"];
                        $product_id = $row["product_id"];

                        // Вставляем код HTML для отображения данных товара с переходом на страницу "one-product.php" и вызовом функции addToFavorites()
                        echo '<div class="col-md-3">';
                        echo '<div class="product__card">';
                        echo '<a href="one-product.php?id=' . $product_id . '" onclick="addToFavorites(' . $product_id . ')">';
                        echo '<img class="product__img__collection" src="' . $imagePath . '" alt="">';
                        echo '</a>';
                        echo '<div class="product__info home">';
                        echo '<div>';
                        echo '<h5 class="product__title">' . $name . '</h5>';
                        echo '<h5 class="product__price">' . $price . '</h5>';
                        echo '</div>';
                        echo '<div>';
                        echo '<a href="#" onclick="removeFromFavorites(' . $product_id . ')"><i class="icon-favorite"></i></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Нет данных о товарах в избранном.";
                }

                // Закрываем соединение с базой данных
                $conn->close();
                ?>
            </div>
        </div>
    </section>


    <script>
        // Функция для добавления товара в избранное
        function addToFavorites(productId) {
            // Выполните здесь любые действия, которые вам нужны при добавлении товара в избранное.
            // Например, можно отправить запрос на сервер для обработки добавления товара в избранное.
            // Вы также можете использовать AJAX для асинхронного добавления товара в избранное без перезагрузки страницы.

            // Перенаправление на страницу one-product.php после добавления товара в избранное
            window.location.href = 'one-product.php?id=' + productId;
        }

        /* Когда пользователь нажимает на кнопку,
        переключение между скрытием и отображением раскрывающегося содержимого */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Закройте выпадающее меню, если пользователь щелкает за его пределами
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        // Функция для удаления товара из избранного
function removeFromFavorites(productId) {
    // Создайте новый объект XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Укажите URL-адрес обработчика на сервере, который будет выполнять удаление товара из базы данных
    var url = "remove_from_favorites.php";

    // Создайте строку с данными, которые вы хотите отправить на сервер
    var params = "productId=" + productId;

    // Настройте запрос
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Укажите функцию обратного вызова, которая будет выполняться при получении ответа от сервера
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Обработайте ответ от сервера здесь, если это необходимо
            // Например, можно обновить страницу или выполнить другие действия после удаления товара из избранного

            // Перезагрузите текущую страницу для обновления списка избранных товаров
            location.reload();
        }
    };

    // Отправьте запрос на сервер
    xhr.send(params);
}

    </script>
        <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a href="#" class="brand">
                        <img class="logo_style" src="img/icons/logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-2">
                    <ul class="footer__menu">
                        <li>
                            <h5 class="footer__title">Мәзір</h5>
                        </li>
                        <li>
                            <a href="/">Басты бет</a>
                        </li>
                        <li>
                            <a href="/allproducts.php">Барлық тауарлар</a>
                        </li>
                        <li>
                            <a href="#">Жеткізу және төлеу</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer__menu">
                        <li>
                            <h5 class="footer__title">Компания</h5>
                        </li>
                        <li>
                            <a href="/about.php">Компания туралы</a>
                        </li>
                        <li>
                            <a href="#">Вакансиялар</a>
                        </li>
                        <li>
                            <a href="#">Гарант және сапа</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer__menu">
                        <li>
                            <h5 class="footer__title">Тауарлар</h5>
                        </li>
                        <li>
                            <a href="/allproducts.php">Барлық тауарлар</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer__menu">
                        <li>
                            <h5 class="footer__title">Басқа</a>
                        </li>
                        <li>
                            <a href="#">Рассрочка және кредит</a>
                        </li>
                        <li>
                            <a href="#">Конкурстар</a>
                        </li>
                        <li>
                            <a href="#">Алмасу және ауыстыру</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer__contacts">
                        <li class="footer__title">Байланыстарымыз</li>
                        <li><i class="icon-phone"></i><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                        <li><a href="mailto:vip@housevip.ru">kids-shop@mail.ru</a></li>
                    </ul>
                    <ul class="footer__social">
                        <li>
                            <a href="#">
                                <i class="icon-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="#" class="section__title__center">
                                2023. Kids Shop. Барлық құқықтар қорғалған
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
