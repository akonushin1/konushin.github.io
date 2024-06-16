<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тур-агентство</title>
  <link rel="stylesheet" href="style.css"> 
  
  
</head>
<body>
<script src="script.js"></script>
  <header>
    <h1>Добро пожаловать в Амазонка-тур</h1>
    <!-- Меню навигации -->
    <nav>
      <ul>
        <li><a href="./main.php">Главная</a></li>
        <li><a href="./main1.php"><b>Новости<b></a></li>
        <li><a href="./cont.php">Контакты</a></li>
        <li><a href="./vx.php">Выход</a></li>
        
      </ul>
    </nav>
  </header>
  <main>
  <style>
    
    #slider-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            
        }

        #image {
            width: 1100px;
            height: 600px;
        }
        .rr{
            background-color: white;
            color: black;
            font-size: 50px;
        }
     
        
    </style>
 <div id="slider-container">
        <button id="previous" class="rr"><</button>
        <img id="image" src="images/image1.jpg" />
        <button id="next" class="rr">></button>
    </div>

    <script>
        // Массив с URL изображений
        const imagesUrls = [
            "images/222.jpg",
            "images/333.jpg",
            "images/444.jpg",
            "images/555.jpg",
  
        ];

        // индекс для отслеживания текущей картинки
        let currentIndex = 0;

        // Устанавливаем начальное изображение
        const imageElement = document.querySelector("#image");
        imageElement.src = imagesUrls[currentIndex];

        // Функция, отвечающая за переход к следующему изображению
        function nextImageHandler() {
            // Увеличиваем индекс текущего изображения
            currentIndex++;

            // Если текущий индекс больше длины массива изображений, устанавливаем его обратно в 0
            if (currentIndex >= imagesUrls.length) {
                currentIndex = 0;
            }

            // Показываем следующее изображение
            imageElement.src = imagesUrls[currentIndex];
        }

        //  Функция, отвечающая за переход к предыдущему изображению
        function previousImageHandler() {
            // Уменьшаем индекс
            currentIndex--;

            // Если текущий индекс меньше 0, устанавливаем его на последний индекс массива изображений
            if (currentIndex < 0) {
                currentIndex = imagesUrls.length - 1;
            }

            // Показываем предыдущее изображение
            imageElement.src = imagesUrls[currentIndex];
        }

        // Устанавливаем обработчики изображений на кнопки
        const nextButton = document.querySelector("#next");
        nextButton.addEventListener("click", nextImageHandler);

        const previousButton = document.querySelector("#previous");
        previousButton.addEventListener("click", previousImageHandler);
    </script>

<br><br><br>


<?php
$dbhost = "localhost"; // Имя хоста сервера базы данных
$dbuser = "root"; // Имя пользователя базы данных
$dbpass = ""; // Пароль базы данных
$dbname = "tyyr"; // Название базы данных

// Создаем соединение с базой данных
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Проверка соединения
if (!$conn) {
    die("Не удалось подключиться к базе данных: " . mysqli_connect_error());
}

// Выполняем запрос SQL
$sql = "SELECT * FROM news";
$result = mysqli_query($conn, $sql);

// Проверка выполнения запроса
if (!$result) {
    die("Ошибка запроса: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
  echo "<p>" . "<br> - " . $row["heading"] . " <br> " . $row["text"] . "</p><br><br>";

}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>

  </main>
  
</body>
</html>