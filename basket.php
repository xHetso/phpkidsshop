<!DOCTYPE html>
<html>
<head>
    <title>Корзина магазина</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <script>
    // Здесь ваш остальной JavaScript код

    // Вызывается после загрузки страницы
    window.onload = function() {
        calculateTotalAmount();
    };

    function incrementQuantity(productId) {
        // Ваш код обработки
        calculateTotalAmount();
    }

    function decrementQuantity(productId) {
        // Ваш код обработки
        calculateTotalAmount();
    }

    function deleteProduct(productId) {
        // Ваш код обработки
        calculateTotalAmount();
    }

    function calculateTotalAmount() {
        // Ваш код подсчета и обновления общей суммы
    }
</script>
    <style>
        /* Стили для таблицы */
        
        section.section__navbar {
            position: static; 
            z-index: 99999999999999999;
            width: 100%;
            background-color:#c56ca2;
            margin-bottom: 40px;
        }
        h2 {
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: black;
        }

        /* Стили для кнопок */
        .quantity-btn {
            display: inline-block;
            width: 30px;
            height: 30px;
            text-align: center;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .quantity-btn:hover {
            background-color: #f1f1f1;
        }

        .delete-btn {
            color: #c56ca2;
            cursor: pointer;
        }
        .forever {
            display: flex;
        }
        /* Стили для кнопки "Купить" и общей суммы */
        .buy-btn {
            margin: 40px 0px 0px 30px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #c56ca2;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .total-amount {
    font-weight: bold;
    MARGIN-TOP: 50PX;
    margin-left: 20px;
}
        button, input, optgroup, select, textarea {
            MARGIN-TOP: 50PX;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
        label {
            MARGIN-LEFT: 20PX;
        }
        .dropdown {
    position: relative;
    display: inline-block;
    PADDING-BOTTOM: 50PX;
}


button.buy-btn {
    border: none;
}

    </style>
</head>
<body>
    <!-- Ваш навбар -->
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

    <!-- Корзина магазина -->
    <section class="section__cart">
    <div class="container">
        <h2>Себет</h2>
        <table>
            <tr>
                <th>Суреті</th>
                <th>Тауар атауы</th>
                <th>Өлшемі</th>
                <th>Бағасы</th>
                <th>Саны</th>
                <th>Құны</th>
                <th>Жою</th>
            </tr>
            <?php
            $servername = "127.0.0.1"; // Имя сервера базы данных
            $username = "root"; // Имя пользователя базы данных
            $password = "root"; // Пароль пользователя базы данных
            $dbname = "kidsshop"; // Имя базы данных            

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Получение данных из таблицы basket
            $sql = "SELECT * FROM basket";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Вывод каждой записи в таблицу
                while($row = $result->fetch_assoc()) {
                    echo "<tr id='product{$row['id']}'>";
                    echo "<td><img src='{$row['image_path']}' alt='{$row['name']}' width='50'></td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['size']}</td>";
                    echo "<td>{$row['price']} ₸</td>";
                    echo "<td>";
                    echo "<div class='quantity-btn' onclick='decrementQuantity({$row['id']})'>-</div>";
                    echo "<span id='quantity{$row['id']}'>1</span>";
                    echo "<div class='quantity-btn' onclick='incrementQuantity({$row['id']})'>+</div>";
                    echo "</td>";
                    echo "<td id='product-total-product{$row['id']}'>{$row['price']} ₸</td>";
                    echo "<td><i class='fas fa-trash delete-btn' onclick='deleteProduct({$row['id']})'></i></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Корзина пуста</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div class="forever">
            <form id="checkout-form" method="post">
                <label for="name"><b>Аты-жөні:</b></label>
                <input type="text" id="name" name="name" required>
                <label for="address"><b>Мекен-жайы:</b></label>
                <input type="text" id="address" name="address" required>
                <label for="phone"><b>Байланыс номері:</b></label>
                <input type="text" id="phone" name="phone" required>
                <button type="button" class="buy-btn" onclick="checkout()">Сатып алу</button>
            </form>
            <span class="total-amount" id="total-amount"></span>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function incrementQuantity(productId) {
        var quantityElement = document.getElementById('quantity' + productId);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        var newQuantity = currentQuantity + 1;
        quantityElement.innerHTML = newQuantity;
        updateDatabase(productId, newQuantity);
        calculateTotalAmount();
    }

    function decrementQuantity(productId) {
        var quantityElement = document.getElementById('quantity' + productId);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        if (currentQuantity > 1) {
            var newQuantity = currentQuantity - 1;
            quantityElement.innerHTML = newQuantity;
            updateDatabase(productId, newQuantity);
            calculateTotalAmount();
        }
    }

    function deleteProduct(productId) {
        var productElement = document.getElementById('product' + productId);
        productElement.remove();
        updateDatabase(productId, 0, true);
        calculateTotalAmount();
    }

    function updateDatabase(productId, quantity, deleteProduct) {
        $.ajax({
            url: 'update_quantity.php',
            method: 'POST',
            data: { productId: productId, quantity: quantity, deleteProduct: deleteProduct },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function calculateTotalAmount() {
        var totalAmount = 0;
        var productElements = document.querySelectorAll('table tr[id^="product"]');
        for (var i = 0; i < productElements.length; i++) {
            var productId = productElements[i].getAttribute('id').replace('product', '');
            var price = parseFloat(productElements[i].querySelector('td:nth-child(4)').innerHTML);
            var quantity = parseInt(document.getElementById('quantity' + productId).innerHTML);
            var totalProduct = price * quantity;
            document.getElementById('product-total-product' + productId).innerHTML = totalProduct + ' ₸';
            totalAmount += totalProduct;
        }
        document.getElementById('total-amount').innerHTML = 'Жалпы құны: ' + totalAmount + ' ₸';
    }

    function checkout() {
        var name = document.getElementById('name').value;
        var address = document.getElementById('address').value;
        var phone = document.getElementById('phone').value;
        var products = [];

        var productElements = document.querySelectorAll('table tr[id^="product"]');
        for (var i = 0; i < productElements.length; i++) {
            var productId = productElements[i].getAttribute('id').replace('product', '');
            var quantity = parseInt(document.getElementById('quantity' + productId).innerHTML);
            products.push({ productId: productId, quantity: quantity });
        }

        $.ajax({
            url: 'save_order.php',
            method: 'POST',
            data: {
                name: name,
                address: address,
                phone: phone,
                products: products
            },
            success: function (response) {
                console.log(response);
                window.location.href = 'success_page.php';
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
</body>
</html>
