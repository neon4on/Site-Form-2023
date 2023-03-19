<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<body>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root1';    // Имя созданного вами пользователя
    $pass = 'Kkkk'; // Установленный вами пароль пользователю
    $db_name = 'sim';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    //Если переменная Name передана
    if (isset($_POST["Name"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red'])) {
        $sql = mysqli_query($link, "UPDATE `products` SET `Name` = '{$_POST['Name']}',`Price` = '{$_POST['Price']}' WHERE `ID`={$_GET['red']}");
      } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($link, "INSERT INTO `products` (`Name`, `Price`) VALUES ('{$_POST['Name']}', '{$_POST['Price']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Удаляем, если что
    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `products` WHERE `ID` = {$_GET['del']}");
      if ($sql) {
        echo "<p>Товар удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red'])) {
      $sql = mysqli_query($link, "SELECT `ID`, `Name`, `Price` FROM `products` WHERE `ID`={$_GET['red']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <form action="" method="post">
    <table>
      <tr>
        <td>Наименование:</td>
        <td><input type="text" name="Name" value="<?= isset($_GET['red']) ? $product['Name'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Цена:</td>
        <td><input type="text" name="Price" size="3" value="<?= isset($_GET['red']) ? $product['Price'] : ''; ?>"> руб.</td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <?php
  //Получаем данные
  $sql = mysqli_query($link, 'SELECT `ID`, `Name`, `Price` FROM `products`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "<p>{$result['ID']}) {$result['Name']} - {$result['Price']} ₽ - <a href='?del={$result['ID']}'>Удалить</a> - <a href='?red={$result['ID']}'>Редактировать</a></p>";
  }
  ?>
  <p><a href="?add=new">Добавить новый товар</a></p>
</body>
</html>