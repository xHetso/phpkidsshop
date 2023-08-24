<!DOCTYPE html>
<html>
<head>
  <title>О компании</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
        section.section__navbar {
    position: relative;
    z-index: 99999999999999999;
    width: 100%;
    background-color:#c56ca2;
    margin-bottom: 20px;
        }
    .about-section {
        margin-bottom: 30px;
    }
    
    .about-section h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    
    .about-section p {
        font-size: 16px;
        color: #666;
        line-height: 1.5;
    }
    
    .product-section {
        margin-bottom: 30px;
    }
    
    .product-section h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    
    .product-section p {
        font-size: 16px;
        color: #666;
        line-height: 1.5;
    }
    
    .product-section ul {
        margin-top: 10px;
        list-style-type: disc;
        padding-left: 20px;
    }
    
    .advantages-section {
        margin-bottom: 30px;
    }
    
    .advantages-section h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    
    .advantages-section ul {
        margin-top: 10px;
        list-style-type: disc;
        padding-left: 20px;
    }
    img{
        height: 70%
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
    <section class="about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/img/about.png" alt="О нас" />
      </div>
      <div class="col-md-6">
      <h4>Біз туралы</h4>
        <p>
          Біз - балалар киімдерінің интернет-магазині, әдетте, барлық жас топтың балаларына арналған сәнді дизайнды және сапалы киімдердің кең таңбасын ұсынамыз. Каталогымызда сіз қыздар мен ұлдар үшін різді модельдер менөлдері мен өлшемдерін таба аласыз. Біздің мақсатымыз, тек жақсы материалдар мен заманауи технологияларды қолданып, сіздің балаларыңызға ықылас және стильді бейнелеу.
        </p>
        <h5>Біздің өніміз</h5>
        <p>Біз балаларға арналған киімдердің кең таңбасын ұсынамыз:</p>
        <ul>
          <li>Футболкалар және көйлектер</li>
          <li>Шалбарлар және шорттар</li>
          <li>Көйлектер</li>
          <li>Костюмдер</li>
          <li>Аксессуарлар және т.б.</li>
        </ul>
        <h5>Біздің сатып алу артықшылықтары</h5>
        <ul>
          <li>Өнімнің кең таңбасы</li>
          <li>Өнімнің жоғары сапасы</li>
          <li>Қолжетімді бағалар</li>
          <li>Тез және сенімді жеткізу</li>
          <li>Клиенттерге көмек</li>
          <li>Алмасу және айырбастау т.б.</li>
        </ul>
      </div>
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
