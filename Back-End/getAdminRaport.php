<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$configs = include('config.php');


if (isset($_POST['submit'])){
  $tabel = "admin_ticket";
  $dbservername = $configs['host'];
  $dbusername = $configs['username'];
  $dbpassword = $configs['password'];
  $dbName = $configs['dbname'];
  $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbName);

  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

  $spreadsheet = new SpreadSheet;
  $s = $spreadsheet ->getActiveSheet();


  $sql = "SELECT * from ".$tabel." ;";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  $data=array();
  while ($row = $result->fetch_assoc()){
    $data[]=$row;
  }
  $sql1 = "SHOW COLUMNS FROM ".$tabel." ;";
  $res = $conn->query($sql1);
  $col = [];
  while ($row =$res->fetch_assoc()){
    $col[] = $row['Field'];
  }
  $colum='A';
  for ($i=0;$i<count($col);$i++){
    $s ->setCellValue(($colum).'1',$col[$i]);
    ++$colum;
  }
  
  for ($i=0;$i<sizeof($data);$i++){
    $colum='A';
    foreach ($data[$i] as $cheie => $val){
        $s->setCellValue($colum.($i+2),$val);
        ++$colum;
    }
  }
  

  $exc = new Xlsx($spreadsheet);
  $exc -> save('Ex.xlsx');
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename="'. urlencode("AdminReport.xlsx"));
        
  $exc->save('php://output');




}
?>