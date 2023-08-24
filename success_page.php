<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-p7e/0ABzh9em5cOn32/DB1vZB1mcDMP2nTqOeJ0lK4HutQrrpzTaATtlmrTqjNTNEDLWnLEq7JdDxfrThCrJfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Администрация</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    button {
        padding: 10px 40px;
        background-color:#c56ca2;
        color: white;
        border: none;
        margin-bottom: 15px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    th {
        background-color:#c56ca2;
        color: white;
    }
    .fa, .fas {
    font-weight: 900;
    color:#c56ca2;
}
    .edit-link,
    .delete-link {
        color: blue;
        margin-right: 5px;
    }
    section.section__navbar {
    position: relative;
    z-index: 99999999999999999;
    width: 100%;
    background-color:#c56ca2;
    margin-bottom: 20px;
}
.title {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .message {
            color: #555;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .order-number {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .order-item {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .order-image {
            float: left;
            margin-right: 10px;
        }

        .order-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .order-details {
            margin-bottom: 5px;
        }

        .order-price {
            font-weight: bold;
        }
</style>
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
    <div class="container">
    <h1>Тапсырыс сәтті қабылданды!</h1>
    <p>Тапсырысыңызға рахмет. Біз оны жақын арада жеткіземіз.</p>
    <?php
// Подключение к базе данных
$servername = "127.0.0.1"; // Имя сервера базы данных
                            $username = "root"; // Имя пользователя базы данных
                            $password = "root"; // Пароль пользователя базы данных
                            $dbname = "kidsshop"; // Имя базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения на ошибки
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Запрос к базе данных для получения наивысшего значения order_id
$sql = "SELECT MAX(order_id) AS max_order_id FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $order_id = $row['max_order_id'];
    // Вывод номера заказа
    echo "<h2 class=\"order-number\">Сіздің тапсырысыңыздың нөмірі: $order_id</h2>";

    // Запрос к базе данных для получения данных из таблицы "cart" с наивысшим значением order_id
    $sql = "SELECT * FROM cart WHERE order_id = $order_id";
    $result = $conn->query($sql);

    // Проверка наличия данных
    if ($result->num_rows > 0) {
        // Отображение данных заказа
        while ($row = $result->fetch_assoc()) {
            echo "<div class=\"order-item\">";
            echo "<img class=\"order-image\" src='{$row['image_path']}' alt='{$row['name']}' width='50'>";
            echo "<p class=\"order-name\">Тауар атауы: {$row['name']}</p>";
            echo "<p class=\"order-details\">Өлшемі: {$row['size']}</p>";
            echo "<p class=\"order-details\">Бағасы: {$row['price']} ₸</p>";
            echo "<p class=\"order-details\">Саны: {$row['quantity']}</p>";
            echo "<p class=\"order-price\">Құны: " . ($row['price'] * $row['quantity']) . " ₸</p>";
            echo "</div>";
        }
    } else {
        echo "Нет данных в таблице 'cart'";
    }
} else {
    echo "Нет данных в таблице 'cart'";
}

// Закрытие подключения к базе данных
$conn->close();
?>

    </div>
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
</body>
</html>
