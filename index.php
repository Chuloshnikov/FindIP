<?php
//стартуем сервер
session_start();
//собираем куки 2 - запуск функции подсчета посещений
setcookie('test', numberOfVisits());

//создаем файл и инициализируем запись в него
$filepath = 'ips.txt';
$file = file($filepath);

// функция подсчета посещений
function numberOfVisits(){
	if(isset($_COOKIE['test'])){
	$_COOKIE['test']++;
}else {
	$_COOKIE['test'] = 1;
}
return $_COOKIE['test'];
}

// получаем IP посетителя + функция подсчета куки
$numberVisitsFinal = $_SERVER['REMOTE_ADDR'] . " " . numberOfVisits();
//вкладываем IP и счетчик посещения в ips.txt
file_put_contents($filepath, $numberVisitsFinal);
?>
