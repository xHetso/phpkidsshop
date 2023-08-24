<!DOCTYPE html>
<html lang="en">
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
                <!--<li>
                    <a href="#"><i class="icon-find fs-30"></i></a>
                </li>-->
                <li>
                    <a href="#">
                        <a href="/basket.php"><i class="icon-basket fs-30"></i></a>
                        
                    </a>
                </li>
                <li>
                    <a href="/favorites.php"><i class="icon-favorite fs-30"></i></a>
                    <!--<span class="counter">3</span>-->
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
    <button onclick="location.href='add.php'">Тауар қосу</button>
    <button onclick="location.href='allclients.php'">Тапсырыстар</button>
    
    <?php
    $servername = "127.0.0.1"; // Дереккөз серверінің атауы
    $username = "root"; // Дереккөз пайдаланушының аты
    $password = "root"; // Дереккөз пайдаланушының құпия сөзі
    $dbname = "kidsshop"; // Дереккөз базасының атауы
    // Байланысты жасау
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Байланысты тексеру
    if ($conn->connect_error) {
    die("Қосылу катесі: " . $conn->connect_error);
    }

    // Таңбаларды көрсету үшін products кестесінен деректерді алу үшін сұраныс жасау
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Кестені көрсету
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Аты</th>
    <th>Бағасы</th>
    <th>Сипаттама</th>
    <th>Санаты</th>
    <th>Сурет_жолу</th>
    <th>Жасалған уақыты</th>
    <th>Балалар</th>
    <th>Өзгерту</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "<td>" . $row["category"] . "</td>";
    echo "<td>" . $row["image_path"] . "</td>";
    echo "<td>" . $row["created_at"] . "</td>";
    echo "<td>" . $row["children"] . "</td>";
    echo "<td><a href='edit.php?id=" . $row["id"] . "'><i class='fas fa-edit'></i></a>
    <a href='delete.php?id=" . $row["id"] . "'><i class='fas fa-trash'></i></a></td>";
    echo "</tr>";
    }
    echo "</table>";
    } else {
    echo "products кестесінде деректер жоқ.";
    }

    // Байланысты жабу
    $conn->close();
    ?>

</body>
</html>
