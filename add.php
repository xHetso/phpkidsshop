<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-p7e/0ABzh9em5cOn32/DB1vZB1mcDMP2nTqOeJ0lK4HutQrrpzTaATtlmrTqjNTNEDLWnLEq7JdDxfrThCrJfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Добавить товар</title>
    <style>
        form {
            margin: 20px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #c56ca2;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c56ca2;
        }
    </style>
</head>
<body>
    <h1>Тауар қосу</h1>
    <form action="process_add.php" method="POST">
        <label for="name">Атауы:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Бағасы:</label>
        <input type="text" id="price" name="price" required>

        <label for="description">Анықтама:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="category">Категориясы:</label>
        <input type="text" id="category" name="category" required>

        <label for="image_path">Сурет жолы:</label>
        <input type="text" id="image_path" name="image_path" required>

        <label for="children">ер бала / қыз бала:</label>
        <select id="children" name="children">
            <option value="ер бала">ер бала</option>
            <option value="қыз бала">қыз бала</option>
        </select>

        <input type="submit" value="Тауарды қосу">
    </form>
</body>
</html>
