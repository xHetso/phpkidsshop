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

// Создаем пустой массив для хранения данных о продуктах
$products = array();

// Проверяем, есть ли данные
if ($result->num_rows > 0) {
    // Добавляем данные о продуктах в массив
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

    <link rel="stylesheet" href="css/style.css">
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
        //скролл навбар
        window.addEventListener('scroll', function() {
        var section__navbar = document.querySelector('.section__navbar'); // выбираем элемент навбара
        if (window.scrollY > 900) { // если высота прокрутки больше 900px
            section__navbar.classList.add('scrolled'); // добавляем класс "scrolled"
        } else {
            section__navbar.classList.remove('scrolled'); // удаляем класс "scrolled"
        }
        });
      </script>

    <header class="header" style="background-image: url(img/header.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header__content">
                        <p class="header__title">КОЛЛЕКЦИЯ 2023</p>
                        <h1 class="header__title2">ТАНЫМАЛ МОДЕЛЬДЕР</h1>
                        <a href="/allproducts.php"><button class="btn btn-accent">КАТАЛОГҚА ӨТУ</button></a>
                    </div>
                </div>
            </div>
        </div>
    </header>




<section class="section collection">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="section__title">КОЛЛЕКЦИЯ 2023</h1>
            </div>
            <?php
            $count = 0;
            foreach ($products as $product) {
                if ($count >= 12) {
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
                                    <a onclick="addToFavorites(<?php echo $product['id']; ?>)">
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
        function addToFavorites(productId, event) {

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_favorites.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Успешно добавлено в избранное
                    var notification = document.createElement('div');
                    notification.classList.add('notification');
                    notification.textContent = 'Товар добавлен в избранное';
                    document.body.appendChild(notification);
                    notification.style.display = 'block';
                    setTimeout(function() {
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

        xhr.onerror = function() {
            console.error('Ошибка при отправке запроса:', xhr.statusText);
        };
    }
        </script>


    <section class="section__collection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/categories1.png" alt="">
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <h2 class="collection_name1">
                        Көйлектер мен <br> Комбинациялар
                    </h2>
                    <a href="/allproducts.php">
                        <button class="btn__collection btn__collection-accent">КАТАЛОГҚА ӨТУ</button>
                    </a>
                </div>
                <div class="bg__image__banner1">
                    <img src="img/bg.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="section__collection bannercollection2">
        <div class="container">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <h2 class="collection_name1">
                        90%-ға дейін жеңілдіктер
                    </h2>
                    <a href="/allproducts.php">
                        <button class="btn__collection btn__collection-accent">КАТАЛОГҚА ӨТУ</button>
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="img/categories2.png" alt="">
                </div>
                <div class="bg__image__banner1 bg__image__banner1__right">
                    <img src="img/bg.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="section bannerabout">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="collection_name1">Компания туралы</h2>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6">

                </div>
                <div class="bg__image__banner3">
                    <img src="img/about_bg.png" alt="">
                </div>
                <div class="bg__image__banner2">
                    <img src="img/about.png" alt="">
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <div class="collection__info">
                        <p class="collection_name1">
                        Балалар кереметтерінің интернет-дүкеніне қош келдіңіз! Менің нәресте өнімдерін сатып алу мүмкін емес, бірақ бұл өте әдемі және стильді.
                        </p>
                        <a href="/allproducts.php">
                            <button class="btn__collection btn__collection-accent">КАТАЛОГҚА ӨТУ</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>

    <section class=" section instagram__colection">
        <div class="container">
            <h1 class="instagram__colection__title section__title__center">Біздің Instagram</h1>
            <a color="black" href="https://www.instagram.com/fashion_kids_uralsk/" target="_blank" rel="noopener noreferrer">
                <h5 class="instagram__title section__title__center">@fashion_kids_uralsk</h5>
            </a>
            <div class="row">
                <div class="col-md-3">
                    <div class="instagram__card">
                        <img class="instagram__img__collection" src="img/product1.png" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="instagram__card">
                        <img class="instagram__img__collection" src="img/product2.png" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="instagram__card">
                        <img class="instagram__img__collection" src="img/product3.png" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="instagram__card">
                        <img class="instagram__img__collection" src="img/product4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
                    
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