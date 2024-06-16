<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тур-агентство</title>
  <link rel="stylesheet" href="reg.css"> 
  
  
</head>


  <header>
    <h1>Амазонка-тур</h1>
    <!-- Меню навигации -->
    <nav>
      
    </nav>
  </header>
  <main>
  
 
</head>
<body>

<h2></h2>

<?php
  // Подключение к базе данных
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tyyr";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Не удалось подключиться к базе данных: " . mysqli_connect_error());
}

// Обработка формы регистрации
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Проверка на пустые поля
    if (empty($username) || empty($password)) {
        $error = "Заполните все поля.";
    } else {
        // Проверка на уникальность имени пользователя и адреса электронной почты
        $sql = "SELECT * FROM users WHERE username = '$username' OR password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $error = "Имя пользователя уже существует.";
        } else {
            // Регистрация пользователя
            $sql = "INSERT INTO users (username,  password) VALUES ('$username',  '$password')";

            
            if (mysqli_query($conn, $sql)) {
                $success = "Регистрация прошла успешно! Теперь можете <a href='vx.php'>авторизоваться</a>";
               
            } else {
                $error = "Ошибка регистрации: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h1></h1>

    <?php if (isset($error)) {
        echo "<p class='error'>$error</p>";
    } ?>

    <?php if (isset($success)) {
        echo "<p class='success'>$success</p>";
    } 
    ?>
<div class="wrapperReg"> 
    <span class="icon-close1"><b>Регистрация<b><ion-icon name="close"></ion-icon></span> 
    <div class="form-box"> 
      
      <form action="" method="post"> 
        
        <div class="input-box"> 
          <span class="icon"><ion-icon name="name"></ion-icon></span> 
          <label>Логин (email)</label> 
          <input type="email" name="username" required> 
        </div> 


        <div class="input-box"> 
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
          <label>Пароль</label>
          <input type="password" name="password" required> 
        </div> 
        
        <button type="submit" name="register" class="btn">Зарегистрировать</button> 
        <div class="login-register"> 
          <p><a href="vx.php" class="login-link">Авторизоваться</a></p> 
        </div> 
      </form> 
    </div> 
  </div>
 

</body> 
</html>