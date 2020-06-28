<?php
//Переменные для заполнения документа
class variablesExcel{
    public $Plusses;
    public $Minusses;
    public $Conclusion;
    public $worker;
    public $year;
    public $day;
    function __construct($plusses, $minusses, $conclusion){
        $this->Plusses="Плюсы:\n".$plusses;
        $this->Minusses="Минусы:\n".$minusses;
        $this->Conclusion="Вывод:\n".$conclusion;
    }
}
class AddDate{
    function __construct($id_worker){
        $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
        $id = $id_worker;
       $queryWorker = "SELECT firstname, lastname, middlename FROM workers WHERE id_worker = $id";
            $resultWorker = mysqli_query($link, $queryWorker);
            $name="";
            $lastname="";
            $row = mysqli_fetch_row($resultWorker);
                    $name = $row[0];
                    $lastname=$row[1];
                    $quart = 1;
        session_start();
        $queryUserId ="SELECT id_user FROM users WHERE login = '{$_SESSION['login']}'";
        $resultUserId = mysqli_query($link, $queryUserId);
        $row1 = mysqli_fetch_row($resultUserId);
                    $queryDate = "INSERT INTO addedlokr(date, id_worker, id_user) VALUES (NOW(), $id, {$row1[0]})";
            $resultDate = mysqli_query($link, $queryDate);

                    $queryDate = "SELECT date FROM addedlokr ORDER BY id_date DESC";
        $resultDate = mysqli_query($link, $queryDate);
            $row1 = mysqli_fetch_row($resultDate);

        //свойство года
        $this->year="{$row1[0][0]}{$row1[0][1]}{$row1[0][2]}{$row1[0][3]}";
        $this->day = "{$row1[0][8]}{$row1[0][9]}";

        $this->worker = "ЛИСТ ОЦЕНКИ КАЧЕСТВА РАБОТЫ (ЛОКР) {$lastname} {$name} {$quart} квартал {$this->year}г.";
    }
}
?>