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

// Проверяем наличие айди товара в запросе
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Выполняем запрос для получения данных о продукте с указанным айди
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    // Проверяем, есть ли данные
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Товар не найден";
    }
} else {
    echo "Не указан айди товара";
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
    <style>
        .logo_style{
            height: 140px;
        }
    </style>

    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/one_products.css">
    <style>

.notification {
position: fixed;
top: 140px;
right: 10px;
padding: 10px;
background-color: #39b916;
color:white;
border-radius: 4px;
display: none;
transition: display 0.5s;
}

.notification.error {
    background-color: #ff3333;
}
span.counter {
    color: white;
}
h3 {
    margin-bottom: 20px;
}
p {
    margin-bottom: 5px;
}
h4 {
    margin-bottom: 10px;
}
button.button:hover {
    background-color: #ab1871;
}
button.button {
    margin-top: 20px;
    background-color: #c56ca2;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}
</style>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <section class="section section__one__products">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product__presentation">
                        <div class="images__big">
                            <img class="images__big_presentation" src="<?php echo $product['image_path']; ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="one_products__name"><?php echo $product['name']; ?></h3>
                    <h3 class="one_products__count"><?php echo $product['price']; ?> тг.</h3>
                    <h4 class="one_products__table__description">Тауар анықтамасы:</h4>
                    <p>
                        <?php echo $product['description']; ?>
                    </p>
                    <p class="one_products__size"><b>Размерлер</b></p>
                    <input type="radio" name="size" id="sizeS" value="3-4 жас">
                    <label for="sizeS">3-4 жас</label>
                    <input type="radio" name="size" id="sizeM" value="5-6 жас">
                    <label for="sizeM">5-6 жас</label>
                    <input type="radio" name="size" id="sizeL" value="7-8 жас">
                    <label for="sizeL">7-8 жас</label>
                    <input type="radio" name="size" id="sizeXL" value="9-10 жас">
                    <label for="sizeXL">9-10 жас</label>
                    <input type="radio" name="size" id="sizeXXL" value="11-12 жас">
                    <label for="sizeXXL">11-12 жас</label><br>

                    <button class="button" onclick="addToCart()">Себетке салу</button>
                </div>
            </div>
        </div>
    </section>
    <script>
function addToCart() {
    var selectedSize = document.querySelector('input[name="size"]:checked');

    if (!selectedSize) {
        document.getElementById('sizeModal').style.display = 'block';
        return;
    }

    var productData = {
    id: '<?php echo $product['id']; ?>',
    name: '<?php echo $product['name']; ?>',
    price: '<?php echo $product['price']; ?>',
    description: '<?php echo $product['description']; ?>',
    image_path: '<?php echo $product['image_path']; ?>',
    size: selectedSize.value,
    quantity: 1 // Установка значения quantity в 1
};

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Успешно добавлено в корзину
                var notification = document.createElement('div');
                notification.classList.add('notification');
                notification.textContent = 'Тауар себетке салынды';
                document.body.appendChild(notification);
                notification.style.display = 'block';
                setTimeout(function() {
                    notification.style.display = 'none';
                    document.body.removeChild(notification);
                }, 2000);
                document.getElementById('successModal').style.display = 'block';
            } else if (xhr.status === 409) {
                // Товар уже добавлен в корзину
                var notification = document.createElement('div');
                notification.classList.add('notification', 'error');
                notification.textContent = 'Тауар себетте тұр';
                document.body.appendChild(notification);
                notification.style.display = 'block';
                setTimeout(function() {
                    notification.style.display = 'none';
                    document.body.removeChild(notification);
                }, 2000);
            } else {
                // Ошибка при добавлении товара
                console.error('Ошибка при отправке запроса:', xhr.statusText);
            }
        }
    };
    xhr.send(JSON.stringify(productData));

    xhr.onerror = function() {
        console.error('Ошибка при отправке запроса:', xhr.statusText);
    };
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
                                    <a href="#">
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