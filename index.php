<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Результат</title>
</head>
<body>
<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root1';    // Имя созданного вами пользователя
$pass = 'Kkkk'; // Установленный вами пароль пользователю
$db_name = 'sim';   // Имя базы данных

$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

if(isset($_POST['submit'])){
  if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['fileImg']) 
  && !empty($_POST['Radios']) && (!empty($_POST['CheckPrograming']) || !empty($_POST['CheckBusiness']) 
  || !empty($_POST['CheckCook'])) && !empty($_POST['CheckSelect']) && !empty($_POST['message'])){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $fileImg = $_POST['fileImg'];
    $Radios = $_POST['Radios'];

    if (!empty($_POST['CheckPrograming'])){
      $CheckPrograming = $_POST['CheckPrograming'];
      $CheckBusiness = 'Нет';
      $CheckCook = 'Нет';
    }
    else if (!empty($_POST['CheckBusiness'])){
      $CheckPrograming = $_POST['Нет'];
      $CheckBusiness = $_POST['CheckBusiness'];
      $CheckCook = $_POST['Нет'];
    }
    else if (!empty($_POST['CheckCook'])){
      $CheckPrograming = $_POST['Нет'];
      $CheckBusiness = $_POST['Нет'];
      $CheckCook = $_POST['CheckCook'];
    }

    $CheckSelect = $_POST['CheckSelect'];
    $message = $_POST['message'];

    $query = "insert into users(name,surname,email,fileImg,Radios,CheckPrograming,CheckBusiness,CheckCook,CheckSelect,message) 
    values('$name','$surname','$email','$fileImg','$Radios','$CheckPrograming','$CheckBusiness','$CheckCook','$CheckSelect','$message')";

    $run = mysqli_query($link, $query);

    if($run){
      echo "Form submitted seccessfully <br>";
    }
    else{
      echo "Form not submitted";
    }
    // <?php 
        // $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`, `email`, `fileImg`, `Radios`, `CheckPrograming`, `CheckBusiness`, `CheckCook`, `CheckSelect`, `message` FROM `users`');
        
        // while ($result = mysqli_fetch_array($sql)) {
    //       echo "{$result['id']} {$result['name']} {$result['surname']} {$result['email']} {$result['fileImg']} {$result['Radios']} {$result['CheckPrograming']} {$result['CheckBusiness']} {$result['CheckCook']} {$result['CheckSelect']} {$result['message']}<br>";  
    //     }
    // 
  }
  else{
    echo "all fields required";
  }
}
?>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Мейл</th>
      <th scope="col">Фото</th>
      <th scope="col">Радио кнопка</th>
      <th scope="col">Bool 1</th>
      <th scope="col">Bool 2</th>
      <th scope="col">Bool 3</th>
      <th scope="col">Kypc</th>
      <th scope="col">Комментарий</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`, `email`, `fileImg`, `Radios`, `CheckPrograming`, `CheckBusiness`, `CheckCook`, `CheckSelect`, `message` FROM `users`');
      $result = mysqli_fetch_array($sql);
    ?>
    <?php foreach ($sql as $result): ?>
    <tr>
        <th scope="row"><?php echo $result['id'] ?></th>
        <td><?php echo $result['name'] ?></td>
        <td><?php echo $result['surname'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['fileImg'] ?></td>
        <td><?php echo $result['Radios'] ?></td>
        <td><?php echo $result['CheckPrograming'] ?></td>
        <td><?php echo $result['CheckBusiness'] ?></td>
        <td><?php echo $result['CheckCook'] ?></td>
        <td><?php echo $result['CheckSelect'] ?></td>
        <td><?php echo $result['message'] ?></td>
    </tr>
    <?php endforeach; ?>  
  </tbody>
</table>

<form action= "index.php" method= "GET"> 
  <input type="submit" value="Отправить результат на почту" class="btn btn-primary "/>
</form>
<section id="copy-right">
			<div class="copy-right-sec">
				<a>Site Form 2023 Powerd By</a><br>
        <a href="https://github.com/neon4on">Kamenskikh Valeriy</a> 
        <div class="navigation">
          <a href="index.html">Вернуться назад</a>
        </div>
			</div>
	</section>
</body>
</html>


