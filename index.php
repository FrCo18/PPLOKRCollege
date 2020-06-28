<?php 
if(isset($_POST['vhod'])){
    require_once 'connectDB.php';

        //echo "{$row[0]}\n{$row[1]}";
        $login=$_POST['login'];
        $queryLogin = "SELECT login FROM users WHERE login = '$login'";
        $queryPassword = "SELECT password FROM users WHERE login = '$login'";
        $resultLogin = mysqli_query($link,$queryLogin);
        $resultPassword = mysqli_query($link,$queryPassword);
        $rowLogin=mysqli_fetch_row($resultLogin);
        $rowPassword=mysqli_fetch_row($resultPassword);
                if($_POST['password']==$rowPassword[0]){
                    session_start();
                    $_SESSION['login']=$rowLogin[0];
                   // $_SESSION['password']=$rowPassword[0];
                   if($rowLogin[0]!=null){
                    header("Location: GenerateExcel.php");
                   }
                   else{
                    header("Location: http://pplokrcollege/Autorization.php");
                   }
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>Авторизация</title>
</head>
<body>
<img src="images/logo.png" alt="картинки" style='width: 230px; border-top: 10px;'>
<div class='center'>
    <form action="" method='post' class='autorizationForm'>
    <label for="login">Логин</label><br><input type="text" name="login" id="login"><br>
    <label for="password">Пароль</label><br><input type="password" name="password" id="password"><br><br>
    <input type="submit" name='vhod' class='btn' value="Войти">
    </form>
</div>
</body>
</html>