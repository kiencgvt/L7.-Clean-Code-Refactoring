<?php


class Calculator
{
    const ADDITION = '+';
    const SUBTRACTION = '-';
    const MULTIPLICATION = '*';
    const DIVISION = '/';

    public function calculate($firstOperand, $secondOperand, $operator)
    {
        switch ($operator) {
            case self::ADDITION:
                return $firstOperand + $secondOperand;
            case self::SUBTRACTION:
                return $firstOperand - $secondOperand;
            case self::MULTIPLICATION:
                return $firstOperand * $secondOperand;
            case self::DIVISION:
                if ($secondOperand != 0) {
                    return $firstOperand / $secondOperand;
                } else {
                    return "Can not divide by ";
                }
            default:
                return "Unsupported operation";
        }
    }
}