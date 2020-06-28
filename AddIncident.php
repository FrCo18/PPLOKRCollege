<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: index.php");
}
if(isset($_POST['Exit'])){
    session_start();
    if (session_id() != "" || isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
    header("Location: index.php");
    }
}
if(isset($_POST['addincident'])){
    $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
    $queryAddIncident = "INSERT INTO incidents(date_incident, incident, id_worker) VALUES(NOW(), '{$_POST['incident']} {$_POST['pruf']}', '{$_POST['workers']}')";
    $resultAddIncident = mysqli_query($link, $queryAddIncident);
    mysqli_close($link);
}
if(isset($_POST['Del'])){
    $id = $_POST['incidentsDel'];
    $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
$queryAddIncident = "DELETE FROM incidents WHERE id_incident={$id}";
    $resultAddIncident = mysqli_query($link, $queryAddIncident);
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>Добавление инцидента</title>
</head>
<body>
<form action="" method='post'>
<input type="submit" value="Выйти" name='Exit' class='autorization btn'>
</form>
<a href='GenerateExcel.php'><img src="images/logo.png" alt="картинки" style='width: 230px; border-top: 10px;'></a>
    <form action="" method="post" style='top: 30%; height: 150px;' class='interface  center'>
    
    <label for="incident" style='margin-right: 120px;'>Инцидент</label><label for="pruf" style='margin-left: 30px;'>Пруф</label><br>
    
    <input type="text" name="incident" required style='opacity: 0.8; border-radius: 10px; border: 1px solid;' id="incident">
    
    <input type="text" name="pruf" required placeholder="(ссылка на пруф)" style='opacity: 0.8; border-radius: 10px; border: 1px solid;' id="pruf"><br>
    <select name="workers" id="" required>
        <option disabled>Выберите сотрудника</option>
        <?php 
        $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
        $queryWorkers = "SELECT * FROM workers;";
        $resultWorkers = mysqli_query($link, $queryWorkers);
        while($row = mysqli_fetch_row($resultWorkers)){
            $str ="{$row[0]}. ";
            for($i=1;$i<=mysqli_num_rows($resultWorkers)+1;$i++){
                $str = $str."{$row[$i]} ";
            }
            echo "
            <option value='{$row[0]}'>{$str}</option>
            ";
        }
        mysqli_close($link);
        ?>
        </select>
    <input type="submit" class='btn' name='addincident' style='margin-right: 10px; margin-top: 20px;' value="Добавить">
    </form>
    
    <form action="" method='post' style='top: 50%; height: 170px;' class='interface  center'>
    Удаление инцидента<br>
    <select name="incidentsDel" id="" required style='margin-top: 20px;'>
        <option disabled>Выберите инцидент</option>
        <?php 
        $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
        $queryWorkers = "SELECT * FROM incidents";
        $resultWorkers = mysqli_query($link, $queryWorkers);
        while($row = mysqli_fetch_row($resultWorkers)){
            $str ="{$row[0]}. ";
            for($i=1;$i<=mysqli_num_rows($resultWorkers)+1;$i++){
                $str = $str."{$row[$i]} ";
            }
            echo "
            <option value='{$row[0]}'>{$str}</option>
            ";
        }
        mysqli_close($link);
        ?>
        </select><br>
        <input type="submit" class='btn' name='Del' value="Удалить">
    </form>
</body>
</html>