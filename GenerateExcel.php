<?php
session_start();
require_once 'connectDB.php';
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
    ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>Локр</title>
</head>
<body>
<!--<a href="Autorization.php" class='autorization btn'>Авторизация</a>-->
<form action="" method='post'>
<input type="submit" value="Выйти" name='Exit' class='autorization btn'>
</form>
<a href='GenerateExcel.php'><img src="images/logo.png" alt="картинки" style='width: 230px; border-top: 10px;'></a>
<br><br><br>
<div>
<div class='center'>
<div class='date'>
<table border='1px'>
<caption>Последние 5 скачанных ЛОКРов</caption>
<tr>
    <th>Дата</th>
    <th>Сотрудник</th>
    <th>Пользователь составляющий ЛОКР</th>
   </tr>
   <?php
   $queryDateOutput = "SELECT date, lastname, firstname, middlename, login FROM addedlokr, workers, users WHERE addedlokr.id_worker = workers.id_worker 
   AND addedlokr.id_user = users.id_user ORDER BY date DESC";
   $resultDateOutput = mysqli_query($link, $queryDateOutput);
   $i=0;
   while($row = mysqli_fetch_row($resultDateOutput)){
    $i++;   
    if($i==6){
       break;
       }
        echo "<tr><td>{$row[0]}</td><td>{$row[1]} {$row[2]} {$row[3]}</td><td>{$row[4]}</td></tr>";
   }
    ?>
</table>
</div>

<br>
<br>
<div class='interface'>
Критерии
    <form action="ExcelGenerator.php" method='post'>
        <div class='menu-center'>
            <select type='submit' name="workers" id="" required>
        <option disabled>Выберите сотрудника</option>
        <?php 
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
        ?>
        </select>
        <input type="button" value="1" name='1v' class='btnCrit' onclick='f1()'>
        <input type="button" value="2" name='2v' class='btnCrit' onclick='f2()'>
        <input type="button" value="3" name='3v' class='btnCrit' onclick='f3()'>
        <input type="button" value="4" name='4v' class='btnCrit' onclick='f4()'>
        <input type="button" value="5" name='5v' class='btnCrit' onclick='f5()'>
        <input type="button" value="6" name='6v' class='btnCrit' onclick='f6()'>
        <input type="button" value="7" name='7v' class='btnCrit' onclick='f7()'>
        <input type="button" value="8" name='8v' class='btnCrit' onclick='f8()'>
        <input type="button" value="9" name='9v' class='btnCrit' onclick='f9()'>
        <input type="button" value="10" name='10v' class='btnCrit' onclick='f10()'>
        <input type="button" value="11" name='11v' class='btnCrit' onclick='f11()'>
        <?php
        if(isset($_SESSION['login'])==true){
            echo "
            <a href = 'AddIncident.php' style='color: black; padding-left: 5px; padding: 1px 5px 0px 5px; text-decoration: none;' class='Download btnCrit'>Добавить инцидента</a>
            <input type=\"submit\" value=\"Скачать\" name='Download' style='padding: 5px 15px;' class='Download btnCrit'>";
        }        
        ?>
        <br>
        <br>
        </div>
    </div>
    <?php
        if(isset($_SESSION['login'])==true){
            echo "
            <script>
            var s = document.getElementsByClassName('Download');
            s[0].style.visibility = 'visible';
            var s = document.getElementsByClassName('Download');
            s[1].style.visibility = 'visible';
            var a = document.getElementsByClassName('autorization');
            a[1].style.visibility = 'visible';
            a[0].style.visibility = 'hidden';
    </script>";
        }
        else{
            echo "
            <script>
            var a = document.getElementsByClassName('autorization');
            a[1].style.visibility = 'hidden';
            a[0].style.visibility = 'visible';
            var s = document.getElementsByClassName('Download');
            s[0].style.visibility = 'hidden';
            var s = document.getElementsByClassName('Download');
            s[1].style.visibility = 'hidden';
            </script>";
        }

        for($j=1;$j<12;$j++){
            $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
        $queryInc = "SELECT date_incident, incident, id_worker FROM incidents";
            $resultInc = mysqli_query($link, $queryInc);
            echo "
            <div class='div'>
            <div class='krit'>
            Плюсы:<br>
            <textarea name='t{$j}Plus' class='t{$j}Plus' id='' cols='90' rows='5' readonly></textarea>
            <select  id='' class='sPlus{$j}' style='margin-top: 20px;'>
            <option disabled>Выберите инцидент</option>
            ";
            while($row = mysqli_fetch_row($resultInc)){
                echo "
                <option value='{$row[0]}'>{$row[0]} {$row[1]} ~Id сотрудника:{$row[2]}</option>
                ";
            }
            echo "
            </select><br>
            <input type='button' class='btn buttonPlus{$j}' onclick='showtextPlus{$j}()' value='Добавить'>
            <input type='button' class='btn buttonClearPlus{$j}' onclick='cleartextPlus{$j}()' value='Очистить'>
            </div><br>";
            $resultInc = mysqli_query($link, $queryInc);
            echo "
            <div class='krit'>
            Минусы:<br>
            <textarea name='t{$j}Minus' class='t{$j}Minus' id='' cols='90' rows='5' readonly></textarea>
            <select id=''style='margin-top: 20px;' class='sMinus{$j}'>
            <option disabled>Выберите инцидент</option>
            ";
            while($row = mysqli_fetch_row($resultInc)){
                echo "
                <option value='{$row[0]}'>{$row[0]} {$row[1]} ~Id сотрудника:{$row[2]}</option>
                ";
            }
            echo "</select><br>
            <input type='button' class='btn buttonMinus{$j}' onclick='showtextMinus{$j}()' value='Добавить'>
            <input type='button' class='btn buttonClearMinus{$j}' onclick='cleartextMinus{$j}()' value='Очистить'>
            </div><br>";
    
            echo "
            <div class='krit'>
            Вывод:<br>
            <textarea name='t{$j}Conclusion' id='' cols='90' rows='5' class='t{$i}'></textarea>
                </div>
            </div>";
            
        }
            mysqli_close($link);
?>
    </form>
    </div>
    
</div>
<script>
/*function showtext1(){
    var sel = document.getElementsByClassName("sPlus1");
    var txt = document.getElementsByClassName("t1Plus");
    txt[0].value += sel[0].options[sel[0].selectedIndex].text+'\n';
            console.log(sel[0].options[sel[0].selectedIndex].text);
        }*/
<?php
for($j=1;$j<12;$j++){
    echo "
    function showtextPlus{$j}(){
        var sel = document.getElementsByClassName('sPlus{$j}');
        var txt = document.getElementsByClassName('t{$j}Plus');
        txt[0].value += sel[0].options[sel[0].selectedIndex].text.split('~')[0].trim()+'\\n';
            }

            function cleartextPlus{$j}(){
                var txt = document.getElementsByClassName('t{$j}Plus');
                txt[0].value ='';
                    }
            
                    function showtextMinus{$j}(){
                        var sel = document.getElementsByClassName('sMinus{$j}');
                        var txt = document.getElementsByClassName('t{$j}Minus');
                        txt[0].value += sel[0].options[sel[0].selectedIndex].text.split('~')[0].trim()+'\\n';
                            }
                
                            function cleartextMinus{$j}(){
                                var txt = document.getElementsByClassName('t{$j}Minus');
                                txt[0].value ='';
                                    }
                    ";
}
?>
        function hiddenAll()
        {
            var ch = document.getElementsByClassName('div');
            var btn = document.getElementsByClassName('btnCrit');
            for(let i=0;i<11;i++)
            {
                ch[i].style.visibility = "hidden";
                btn[i].style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
            }
        }
        function f1(){
            hiddenAll();
            var btn = document.getElementsByClassName('btnCrit');
            btn[0].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[0].style.visibility = "visible";
       }
       function f2(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[1].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[1].style.visibility = "visible";
       }
       function f3(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[2].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[2].style.visibility = "visible";
       }
       function f4(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[3].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[3].style.visibility = "visible";
       }
       function f5(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[4].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[4].style.visibility = "visible";
       }
       function f6(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[5].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[5].style.visibility = "visible";
       }
       function f7(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[6].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[6].style.visibility = "visible";
       }
       function f8(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[7].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[7].style.visibility = "visible";
       }
       function f9(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[8].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[8].style.visibility = "visible";
       }
       function f10(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[9].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[9].style.visibility = "visible";
       }
       function f11(){
        hiddenAll();
        var btn = document.getElementsByClassName('btnCrit');
            btn[10].style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            var ch = document.getElementsByClassName('div');
        ch[10].style.visibility = "visible";
       }
    </script>
</body>
</html>