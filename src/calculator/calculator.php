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
        return $this->a + $this->b;
    }

    private function minus(): int
    {
        return $this->a - $this->b;
    }

    private function multiplication(): int
    {
        return $this->a * $this->b;
    }

    private function intDivision(): int
    {
        return intdiv($this->a,$this->b);
    }

    public function twoInPower(int $n): int
    {
        return 2**$n;
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
}