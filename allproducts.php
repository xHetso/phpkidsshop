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

// Выполняем запрос для извлечения данных о продуктах
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Проверяем, есть ли данные
if ($result->num_rows > 0) {
    // Создаем массив для хранения данных о продуктах
    $products = array();

    // Извлекаем данные о продуктах и сохраняем их в массив
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "Нет данных о продуктах";
}

// Закрываем соединение с базой данных
$conn->close();
?>

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
        section.section.section__product {
            margin: 60px;
        }
        span.counter {
    color: white;
}
    </style>
    <link rel="stylesheet" href="css/products.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <script>
        window.onload = function() {
            updateProducts();
        };
    </script>
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


    <div class="container">
        <header class="product__header" style="background-image: url(img/productbg.png);">
                    <div class="product__header__content">
                        <p class="header__title">Басты бет > Каталог</p>
                        <h1 class="header__title2">Барлық тауарлар</h1>
                    </div>
        </header>
    </div>

    <section class="section section__product">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <h1 class="section__title__product">Тауарлар</h1>
                </div>
                <div class="col-md-4">
                </div>
                    <div class="product__sort col-md-12" style="background-image: url(img/bg.png);">
                        <div class="col-md-8 products__sort__1">
                        <select name="user_profile_products_1" onchange="updateProducts()">
                            <option value="">Қыз бала + Ер бала</option>
                            <option value="қыз бала">Қыз бала</option>
                            <option value="ер бала">Ер бала</option>
                        </select>

                        <select name="user__profile__products__1" onchange="updateProducts(this.value)">
                            <option value="" selected>Киім түрі</option>
                            <option value="Комбинация">Комбинация</option>
                            <option value="Көйлек">Көйлек</option>
                            <option value="Кроссовка">Кроссовка</option>
                            <option value="Худи">Худи</option>
                        </select>
                    </div>
                    <div class="col-md-4 product__sort__2">
                        <p>Сұрыптау</p>
                        <select name="user__profile__products__sort__1" onchange="updateProducts()">
                            <option value="new" selected>Жаңа топтамалар</option>
                            <option value="price_asc">Құны жоғарылауы бойынша</option>
                            <option value="price_desc">Құны төмендеуі бойынша</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="row" id="product__list">
                        <!-- Здесь будет отображаться отсортированный список продуктов -->
                    </div>
            </div>
        </div>
    </section>
    <script>
        function updateProducts() {
            var category = document.getElementsByName("user__profile__products__1")[0].value;
            var children = document.getElementsByName("user_profile_products_1")[0].value;
            var sort = document.getElementsByName("user__profile__products__sort__1")[0].value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("product__list").innerHTML = this.responseText;
                }
            };

            var url = "get_products.php?category=" + category + "&children=" + children + "&sort=" + sort;
            xhttp.open("GET", url, true);
            xhttp.send();
        }
 </script>





    <section class="section collection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section__title">КОЛЛЕКЦИЯ 2023</h1>
                </div>
                <?php
                $count = 0;
                foreach ($products as $product) {
                    if ($count >= 4) {
                        break;
                    }
                    $count++;
                ?>
                    <div class="col-md-3">
                        <div class="product__card">
                            <a href="one-product.php?id=<?php echo $product['id']; ?>">
                                <img class="product__img__collection" src="<?php echo $product['image_path']; ?>" alt="">
                            </a>
                            <div class="product__info home">
                                <div>
                                    <h5 class="product__title"><?php echo $product['name']; ?></h5>
                                    <h5 class="product__price"><?php echo $product['price']; ?> тг.</h5>
                                </div>
                                <div>
                                    <a href="" onclick="addToFavorites(<?php echo $product['id']; ?>)">
                                        <i class="icon-favorite"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section>
    <script>
        function addToFavorites(productId) {
        console.log("Отправляем productId: " + productId + " на сервер");
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_favorites.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Успешно добавлено в избранное
                var notification = document.createElement('div');
                notification.classList.add('notification');
                notification.textContent = 'Товар добавлен в избранное';
                document.body.appendChild(notification);
                notification.style.display = 'block';
                setTimeout(function () {
                notification.style.display = 'none';
                document.body.removeChild(notification);
                }, 2000);
            } else {
                // Ошибка при добавлении в избранное
                console.error('Ошибка при отправке запроса:', xhr.statusText);
            }
            }
        };
        xhr.send('id=' + productId);

        xhr.onerror = function () {
            console.error('Ошибка при отправке запроса:', xhr.statusText);
        };
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

    <script>
        /* Когда пользователь нажимает на кнопку,
        переключение между скрытием и отображением раскрывающегося содержимого */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Закройте выпадающее меню, если пользователь щелкает за его пределами
        window.onclick = function(event) {
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
      </script>
      
</body>

</html>