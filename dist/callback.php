<?php

$data = file_get_contents("php://input");

$fp = fopen('callback_values.txt', 'a');
fwrite($fp, $data);
fclose($fp);

$data = json_decode($data, true);

$to  = "vladislavzubetcs@gmail.com, " ; 
$to .= "<vladislavzubetcs@gmail.com>"; 

$subject = "artasur.by: Заявка на обратный звонок"; 

$billboards_string = false;
if(!empty($data['billboards'])) {
  $billboards_string = "Выбранные рекламные щиты: \n";

  foreach($data['billboards'] as $billboard)
    $billboards_string .= $billboard['title'] . "\n";

  $bollboards_string .= "Выбранный период размещения: с {$data['dateFrom']} по {$data['dateTo']}\n";
}

$message = "Заявка на обратный звонок с сайта artasur.by\n\nОтправил заявку:\n{$data['name']}\n\nEmail отправителя:\n{$data['email']}\n\nТелефон отправителя:\n{$data['phone']}\n\n\n" . ($billboards_string ? $billboards_string:'Рекламные щиты не выбраны.');

mail($to, $subject, $message);