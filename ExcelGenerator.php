<?php


require_once 'Classes/PHPExcel.php';
require_once 'variablesExcel.php';
require_once 'connectDB.php';
$objPHPExcel=new PHPExcel();

//Выбор активного листа//
$objPHPExcel->setActiveSheetIndex(0);
$active_sheet = $objPHPExcel->getActiveSheet();
$active_sheet->getPageSetup()->setFitToPage(true);

$active_sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

//Название листа
$active_sheet->setTitle('ЛОКР');

//Задание левого и правого отступа
$active_sheet->getPageMargins()->SetLeft(0.5);
$active_sheet->getPageMargins()->SetRight(0.2);

//Общий шрифт на весь документ
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(11);

$active_sheet->getColumnDimension('A')->setWidth(3);

//Заголовок локра
$active_sheet->mergeCells('B1:N1');
$active_sheet->getStyle('B1:N1')->getFont()->setName('Times New Roman');
$active_sheet->getStyle('B1:N1')->getFont()->setSize(12);
$active_sheet->getStyle('B1:N1')->getFont()->setBold(true);


//Основная таблица
for($i = 7;$i<18;$i++){
$active_sheet->mergeCells("B{$i}:D{$i}");
}
$active_sheet->mergeCells("B18:H18");
for($i = 7;$i<18;$i++){
$active_sheet->mergeCells("J{$i}:O{$i}");
}
$active_sheet->mergeCells("J5:O6");
$active_sheet->mergeCells("I5:I6");
$active_sheet->mergeCells("B5:D6");
/*$active_sheet->mergeCells("B5:B6");
$active_sheet->mergeCells("C5:C6");
$active_sheet->mergeCells("D5:D6");
$active_sheet->mergeCells("B5:D5");*/
$active_sheet->mergeCells("E5:H5");
$active_sheet->setCellValue('B18','ИТОГО');
$active_sheet->getStyle('I18')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00);
$border = array(
    'borders'=>array(
      'outline' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
     )
   );
$active_sheet->getStyle("B5:O17")->applyFromArray($border);

$border1 = array(
    'borders'=>array(
      'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
     )
   );
   $borderBottomLeftRight = array(
    'borders'=>array(
       'inside' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
       'bottom' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
     )
   );
$active_sheet->getStyle("J5:O17")->applyFromArray($border1);
$active_sheet->getStyle("B5:D6")->applyFromArray($border1);
$active_sheet->getStyle("E6:H6")->applyFromArray($borderBottomLeftRight);
$active_sheet->getStyle("I5:I6")->applyFromArray($border1);

//$active_sheet->getStyle("B5:J5")->applyFromArray($border1);

$border2 = array(
    'borders'=>array(
      'bottom' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN,
        'color' => array('rgb' => '000000')
       ),
     )
   );
   $active_sheet->getStyle("E5:H5")->applyFromArray($border2);
   $border3 = array(
    'borders'=>array(
      'bottom' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
       'right' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
       'left' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        'color' => array('rgb' => '000000')
       ),
     )
   );
   for($i = 7;$i<18;$i++){
    $active_sheet->getStyle("A{$i}")->applyFromArray($border1);
  }
   $active_sheet->getStyle("B18:H18")->applyFromArray($border3);
   $active_sheet->getStyle("I18")->applyFromArray($border3);
   $objPHPExcel->getActiveSheet()->getStyle('B7:J17')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
   for($i = 7;$i<18;$i++){
    $active_sheet->getStyle("B{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("C{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("D{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("E{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("F{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("G{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("H{$i}")->applyFromArray($border2);
    $active_sheet->getStyle("I{$i}")->applyFromArray($border2);
   }
   $borderFill1 = array(
    'fill'=>array(
      'type'=>PHPExcel_STYLE_FILL::FILL_SOLID,
      'color'=>array(
        'rgb'=>'8c8c8c'
      )
    ),
   );
   $borderFill2 = array(
    'fill'=>array(
      'type'=>PHPExcel_STYLE_FILL::FILL_SOLID,
      'color'=>array(
        'rgb'=>'9c9c9c'
      )
    ),
   );
   $borderFill3 = array(
    'fill'=>array(
      'type'=>PHPExcel_STYLE_FILL::FILL_SOLID,
      'color'=>array(
        'rgb'=>'b3b3b3'
      )
    ),
   );
   $borderVerticalHorizontalCenter=array(
     'alignment'=>array(
       'horizontal'=>PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
       'vertical'=>PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER
     )
   );
   $borderHorizontalCenter=array(
    'alignment'=>array(
      'horizontal'=>PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER
    )
   );
   for($i = 6;$i<18;$i++){
    $active_sheet->getStyle("E{$i}")->applyFromArray($borderFill1);
  }
  for($i = 6;$i<18;$i++){
    $active_sheet->getStyle("F{$i}")->applyFromArray($borderFill2);
  }
  for($i = 6;$i<18;$i++){
    $active_sheet->getStyle("G{$i}")->applyFromArray($borderFill3);
  }
  $active_sheet->getColumnDimension('O')->setWidth(75);
   //Нижняя таблица
   $active_sheet->mergeCells("B20:M20");
   //Название нижней таблицы
   $active_sheet->setCellValue('B20','таблица определения размера стимулирующей выплаты');
   $active_sheet->getStyle('B20')->getAlignment()->setHorizontal('center');
   $active_sheet->getStyle('B20')->getFont()->setName('Times New Roman');
   $active_sheet->getStyle('B20')->getFont()->setSize(12);
   
   for($i=21;$i<24;$i++){
    $active_sheet->getStyle("B$i")->getFont()->setName('Times New Roman');
    $active_sheet->getStyle("B$i")->getFont()->setSize(9);
   }
   $active_sheet->setCellValue('B21','Категория стимулирующей выплаты');
   $active_sheet->setCellValue('B22','Коэффициент стимулирующей выплаты');
   $active_sheet->setCellValue('B23','Количество баллов');
   $active_sheet->mergeCells("B21:D21");
   $active_sheet->mergeCells("B22:D22");
   $active_sheet->mergeCells("B23:D23");
   $active_sheet->getStyle("B21:O23")->applyFromArray($border1);
   $active_sheet->getColumnDimension('B')->setWidth(20);

    $active_sheet->setCellValue("E21",0);
    $active_sheet->getStyle('E21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("F21",1);
    $active_sheet->getStyle('F21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("G21",2);
    $active_sheet->getStyle('G21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("H21",3);
    $active_sheet->getStyle('H21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("I21",4);
    $active_sheet->getStyle('I21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("J21",5);
    $active_sheet->getStyle('J21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("K21",6);
    $active_sheet->getStyle('K21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("L21",7);
    $active_sheet->getStyle('L21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("M21",8);
    $active_sheet->getStyle('M21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("N21",9);
    $active_sheet->getStyle('N21')->getAlignment()->setHorizontal('center');
    $active_sheet->setCellValue("O21",10);
    $active_sheet->getStyle('O21')->getAlignment()->setHorizontal('center');


    $active_sheet->mergeCells("E30:F30");
    $active_sheet->mergeCells("G30:H30");
    $active_sheet->mergeCells("I30:K30");
    $active_sheet->mergeCells("L30:N30");




    //Вёрстка основной таблицы
    //Нумерация
    $u=1;
    for($i=7;$i<18;$i++){
      $active_sheet->setCellValue("A$i",$u);
      $u++;
    }
    $active_sheet->setCellValue("I5","Поучен\nные баллы");
    $active_sheet->getRowDimension(6)->setRowHeight(27);
    $active_sheet->getStyle('I5')->getFont()->setSize(7);
    $active_sheet->getStyle('I5')->getFont()->setName('Arial');
    $active_sheet->getStyle("I5")->getAlignment()->setWrapText(true);
    $active_sheet->getStyle("I5")->applyFromArray($borderVerticalHorizontalCenter);

    $active_sheet->setCellValue("B5","Критерии оценки");
    $active_sheet->getStyle('B5')->getAlignment()->setHorizontal('center');
    $active_sheet->getStyle('B5')->getAlignment()->setVertical('center');

    $active_sheet->setCellValue("E5","Баллы за оценку");
    $active_sheet->getStyle('E5')->getAlignment()->setHorizontal('center');
    $active_sheet->getStyle('E5')->getFont()->setSize(7);
    
    $active_sheet->setCellValue("E6","НЕУД");
    $active_sheet->getStyle('E6')->getFont()->setSize(11);
    $active_sheet->getColumnDimension('E')->setWidth(7);
    $active_sheet->getStyle("E6")->applyFromArray($borderHorizontalCenter);

    $active_sheet->setCellValue("F6","УД");
    $active_sheet->getStyle('F6')->getFont()->setSize(11);
    $active_sheet->getColumnDimension('F')->setWidth(7);
    $active_sheet->getStyle("F6")->applyFromArray($borderHorizontalCenter);
    
    $active_sheet->setCellValue("G6","ХОР");
    $active_sheet->getStyle('G6')->getFont()->setSize(11);
    $active_sheet->getColumnDimension('G')->setWidth(7);
    $active_sheet->getStyle("G6")->applyFromArray($borderHorizontalCenter);

    $active_sheet->setCellValue("H6","ОТЛ");
    $active_sheet->getStyle('H6')->getFont()->setSize(11);
    $active_sheet->getColumnDimension('H')->setWidth(7);
    $active_sheet->getStyle("H6")->applyFromArray($borderHorizontalCenter);

    $active_sheet->getColumnDimension('I')->setWidth(7);

    $active_sheet->setCellValue("J5","Конкретные замечания, конструктивные предложения. Обязательно заполняется при оценке ниже максимальной");
    $active_sheet->getStyle("J5")->applyFromArray($borderVerticalHorizontalCenter);

    //Заполнение таблиц
    //Критерии
    $r=7; 
    while($row = mysqli_fetch_row($resultCriterias)){
    $active_sheet->setCellValue("B{$r}",$row[0]);
    $active_sheet->getStyle("B{$r}")->getAlignment()->setWrapText(true);
    $active_sheet->getStyle("B{$r}")->getAlignment()->setVertical('center');
    $r++;
    } 
    

//Конкретные замечания
    //echo "<script> alert('{$_POST['workers']}'); </script>";
    $objExcel = new AddDate($_POST['workers']);
    $active_sheet->setCellValue('B1', $objExcel->worker);


    $active_sheet->setCellValue("B25","С оценкой ознакомлен                                          _______________________ \"$objExcel->day\" месяц {$objExcel->year}г");
    $active_sheet->setCellValue('B28',"Дата сдачи ЛОКР  \"$objExcel->day\" месяц {$objExcel->year}г.");
    $j=1;
for($i=7;$i<18;$i++){
  if($_POST["t{$j}Plus"]=="Выберите инцидент"){
    $objExcel = new variablesExcel("",$_POST["t{$j}Minus"],$_POST["t{$j}Conclusion"]);
    $active_sheet->setCellValue("J{$i}","{$objExcel->Plusses}\n{$objExcel->Minusses}\n\n{$objExcel->Conclusion}");
  $sds="{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}";
  }
  else if($_POST["t{$j}Minus"]=="Выберите инцидент"){
    $objExcel = new variablesExcel($_POST["t{$j}Plus"],"",$_POST["t{$j}Conclusion"]);
    $active_sheet->setCellValue("J{$i}","{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}");
  $sds="{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}";
  }
  else if($_POST["t{$j}Plus"]=="Выберите инцидент"&&$_POST["t{$j}Minus"]=="Выберите инцидент"){
    $objExcel = new variablesExcel("","",$_POST["t{$j}Conclusion"]);
    $active_sheet->setCellValue("J{$i}","{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}");
  $sds="{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}";
  }
  else{
    $objExcel = new variablesExcel($_POST["t{$j}Plus"],$_POST["t{$j}Minus"],$_POST["t{$j}Conclusion"]);
    $active_sheet->setCellValue("J{$i}","{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}");
  $sds="{$objExcel->Plusses}\n{$objExcel->Minusses}\n{$objExcel->Conclusion}";
  }
  $active_sheet->getStyle("A{$i}:O{$i}")->getAlignment()->setWrapText(true);

  $j++;
 $active_sheet->getRowDimension($i)->setRowHeight(125);
}

  $queryMarks = "SELECT mark FROM marks";
  $resultMarks = mysqli_query($link, $queryMarks);
  $i=7;
  while($row = mysqli_fetch_row($resultMarks)){
    $active_sheet->setCellValue("G{$i}","$row[0]");
    $active_sheet->getStyle("G{$i}")->applyFromArray($borderVerticalHorizontalCenter);
    $active_sheet->getStyle("G{$i}")->getFont()->setName('Arial');
$active_sheet->getStyle("G{$i}")->getFont()->setSize(12);
    $i++;
  }


//таблица определения размера стимулирующей выплаты
$char = array(
  0=>'E',
  1=>'F',
  2=>'G',
  3=>'H',
  4=>'I',
  5=>'J',
  6=>'K',
  7=>'L',
  8=>'M',
  9=>'N',
  10=>'O'
);
$c=0;
while($row = mysqli_fetch_row($resultTable2)){
  $r=21;
  for($i=0;$i<$rowsTable2;$i++){
    $active_sheet->setCellValue("{$char[$c]}{$r}",$row[$i]);
    //$active_sheet->getStyle("{$char[$c]}{$r}")->getAlignment()->setWrapText(true);
    $active_sheet->getStyle("{$char[$c]}{$r}")->getAlignment()->setHorizontal('center');
    $r++;
  }
  $c++;
}
 
$active_sheet->setCellValue('H28',"Ответственный за оценку Норин А.Н. /______________");
$active_sheet->setCellValue('E30','прощаемся');
$active_sheet->setCellValue('G30','вопрос');
$active_sheet->setCellValue('I30','норм');
$active_sheet->setCellValue('L30',' + на 1 ступень');
$active_sheet->setCellValue('O30',' + на 2 ступени');
     // echo $objExcel::$Plusses;
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=LOKR.xls");
//header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // выводим данные в excel формате
$objWriter->save('php://output');
exit();
?>