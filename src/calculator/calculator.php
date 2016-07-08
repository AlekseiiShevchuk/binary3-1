<?php

namespace calculator;


class calculator
{

    private $a;
    private $b;
    private $operator;
    private $logger;


    public function calculate(int $a, int $b, string $operator): int
    {
        $this->a = $a;
        $this->b = $b;
        $this->operator = $operator;

        if
        (
            $this->operator !== '+' &&
            $this->operator !== '-' &&
            $this->operator !== '*' &&
            $this->operator !== '/'
        )
        {
            throw new \AssertionError('operator in calculator is incorrect, it must be "+" or "-" or "*" or "/" !');
        }

        if($this->operator === '+') {
            return $this->plus();
        }elseif($this->operator === '-'){
            return $this->minus();
        }elseif($this->operator === '*'){
            return $this->multiplication();
        }elseif($this->operator === '/'){
            return $this->intDivision();
        }
    }

    private function plus(): int
    {
        $result = $this->a + $this->b;
        $msg = date("Y-m-d H:i:s"). "\t" . $this->operator . "\t" . $this->a . "\t" . $this->b . $result . "\n";
        self::log($msg);
        return $result;
    }

    private function minus(): int
    {
        $result = $this->a - $this->b;
        $msg = date("Y-m-d H:i:s"). "\t" . $this->operator . "\t" . $this->a . "\t" . $this->b . $result . "\n";
        self::log($msg);
        return $result;
    }

    private function multiplication(): int
    {
        $result = $this->a * $this->b;
        $msg = date("Y-m-d H:i:s"). "\t" . $this->operator . "\t" . $this->a . "\t" . $this->b . $result . "\n";
        self::log($msg);
        return $result;
    }

    private function intDivision(): int
    {
        $result = intdiv($this->a,$this->b);
        $msg = date("Y-m-d H:i:s"). "\t" . $this->operator . "\t" . $this->a . "\t" . $this->b . $result . "\n";
        self::log($msg);
        return $result;
    }

    public function twoInPower(int $n): int
    {
        $result = 2**$n;
        $msg = date("Y-m-d H:i:s"). "\t" . $this->operator . "\t" . $this->a . "\t" . $this->b . $result . "\n";
        self::log($msg);
        return $result;
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    public function log($msg) {
        $this->logger->log($msg);
    }
}