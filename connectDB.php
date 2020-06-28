<?php
    $link = mysqli_connect("localhost", "root", "", "lokrdbcollege");
    
    //Авторизация

    //Критерии
    $queryCriterias = "SELECT criterion FROM criterias";
    $resultCriterias = mysqli_query($link,$queryCriterias);
    $rows = mysqli_num_rows($resultCriterias);

    //таблица определения размера стимулирующей выплаты
    $queryTable2 = "SELECT IncentivePaymentCategory, NumberOfPoints, coefficient FROM downtable";
    $resultTable2 = mysqli_query($link,$queryTable2);
    $rowsTable2 = mysqli_num_rows($resultTable2);
?>