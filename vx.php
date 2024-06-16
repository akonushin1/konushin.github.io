<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тур-агентство</title>
  <link rel="stylesheet" href="vx.css"> 
  
  
</head>
<body>

  <header>
    <h1>Амазонка-тур</h1>
    <!-- Меню навигации -->
    <nav>
      
    </nav>
  </header>
  <main>
 

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


// Обработка формы авторизации
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
 
    // Проверка на пустые поля
    if (empty($username) || empty($password)) {
        $error = "Заполните все поля.";
    } else {
        // Поиск пользователя в базе данных
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                // Авторизация пользователя
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                echo 'Рады видеть Вас, '.$username. ' !<br><br>';
                echo 'Чтобы перейти на наш портал, нажмите <a href="main.php">cюда</a>';
                exit;
            } else {
                $error = "Неверный пароль.";
            }
        } else {
            $error = "Пользователь не найден.";
        }
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <h1></h1>

    <?php if (isset($error)) {
        echo "<p class='error'>$error</p>";
    } ?>


<div class="wrapperReg"> 
    <span class="icon-close1"><b>Авторизация<b><ion-icon name="close"></ion-icon></span> 
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
       
        
        <button type="submit" name="login" class="btn">Войти</button> 
        <div class="login-register"> 
          <p>Если нет аккаунта - <a href="reg.php" class="login-link">Регистрация</a></p> 
        </div> 
      </form> 
  
    
</body>
</html>