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
            "images/4444.jpg",
            "images/5555.jpg",
            "images/6666.jpg",
           
  
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
    
  </main>
 
</body>
</html>