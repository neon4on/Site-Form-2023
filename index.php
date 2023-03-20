<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root1';    // Имя созданного вами пользователя
$pass = 'Kkkk'; // Установленный вами пароль пользователю
$db_name = 'sim';   // Имя базы данных

$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

if(isset($_POST['submit'])){
  if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['fileImg']) 
  && !empty($_POST['Radios']) && !empty($_POST['CheckPrograming']) && !empty($_POST['CheckBusiness']) 
  && !empty($_POST['CheckCook']) && !empty($_POST['CheckSelect'])&& !empty($_POST['message'])){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $fileImg = $_POST['fileImg'];
    $Radios = $_POST['Radios'];

    $CheckPrograming = $_POST['CheckPrograming'];
    $CheckBusiness = $_POST['CheckBusiness'];
    $CheckCook = $_POST['CheckCook'];
    $CheckSelect = $_POST['CheckSelect'];
    $message = $_POST['message'];

    $query = "insert into users(name,surname,email,fileImg,Radios,CheckPrograming,CheckBusiness,CheckCook,CheckSelect,message) 
    values('$name','$surname','$email','$fileImg','$Radios','$CheckPrograming','$CheckBusiness','$CheckCook','$CheckSelect','$message')";

    $run = mysqli_query($link, $query);

    if($run){
      echo "Form submitted seccessfully";
    }
    else{
      echo "Form not submitted";
    }

  }
  else{
    echo "all fields required";
  }
}
?>