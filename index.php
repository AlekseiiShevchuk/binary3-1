<?php

declare(strict_types = 1);


use calculator\calculator;
require __DIR__ . '/vendor/autoload.php';

$calculator = new calculator();

$calculator->setLogger(new class {
    public function log($msg)
    {
        file_put_contents('log.txt',$msg,FILE_APPEND);
    }
});

try {
    echo 'Суммируем "-50" и "130" = ';
    echo $calculator->calculate(-50,130,'+');
    echo '<br>';
    echo 'Делаем ошибку в операторе:<br>';
    echo $calculator->calculate(-50,130,'неверный оператор');
    echo '<br>';

} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
} catch (AssertionError $e) {
    echo $e->getMessage(), "\n";
} catch (DivisionByZeroError $e) {
    echo $e->getMessage(), "\n";
} catch (Throwable $e){
    echo 'unforeseen throwable error \n';
    echo $e->getMessage(), "\n";
}

try {
    echo '<br><br>Вычитаем  "130" из "-50" = ';
    echo $calculator->calculate(-50,130,'-');
    echo '<br>';
    echo 'Делаем ошибку в типе операнда:<br>';
    echo $calculator->calculate(-50,130.25,'-');

} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
} catch (AssertionError $e) {
    echo $e->getMessage(), "\n";
} catch (DivisionByZeroError $e) {
    echo $e->getMessage(), "\n";
} catch (Throwable $e){
    echo 'unforeseen throwable error \n';
    echo $e->getMessage(), "\n";
}

try {
    echo '<br><br>Целочисленное деление "150" на "40" = ';
    echo $calculator->calculate(150,40,'/');
    echo '<br>';
    echo 'Делим на ноль:<br>';
    echo $calculator->calculate(150,0,'/');

} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
} catch (AssertionError $e) {
    echo $e->getMessage(), "\n";
} catch (DivisionByZeroError $e) {
    echo $e->getMessage(), "\n";
} catch (Throwable $e){
    echo 'unforeseen throwable error \n';
    echo $e->getMessage(), "\n";
}

try {
    echo '<br><br>Умножаем "150" на "40" = ';
    echo $calculator->calculate(150,40,'*');
    echo '<br>';
    echo 'Неверный тип операндов при умножении:<br>';
    echo $calculator->calculate(150.4,0.5,'*');

} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
} catch (AssertionError $e) {
    echo $e->getMessage(), "\n";
} catch (DivisionByZeroError $e) {
    echo $e->getMessage(), "\n";
} catch (Throwable $e){
    echo 'unforeseen throwable error \n';
    echo $e->getMessage(), "\n";
}

try {
    echo '<br><br>Возводим "2" в степень "20" = ';
    echo $calculator->twoInPower(20);
    echo '<br>';
    echo 'Неверный тип операнда при возведении в степеь:<br>';
    echo $calculator->twoInPower(20.5);

} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
} catch (AssertionError $e) {
    echo $e->getMessage(), "\n";
} catch (DivisionByZeroError $e) {
    echo $e->getMessage(), "\n";
} catch (Throwable $e){
    echo 'unforeseen throwable error \n';
    echo $e->getMessage(), "\n";
}


/* $calculator->setLogger(new class{
     public function log(){
         $LogString = date("Y-m-d H:i:s") . $this->operator;
         file_put_contents('log.txt',$LogString);
     }
 });*/