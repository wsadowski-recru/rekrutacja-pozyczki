<?php

namespace App\Application\Message\Command;

use InvalidArgumentException;

class CalculateLoanCommand
{
    private int $amount;
    private float $annualInterestRate;
    private int $installments;
    private int $installmentsPerYear;


    public function __construct(int $amount, float $annualInterestRate, int $installments, int $installmentsPerYear)
    {
        $this->validateAmount($amount);
        $this->validateInstallments($installments);

        $this->amount = $amount;
        $this->installments = $installments;
        $this->annualInterestRate = $annualInterestRate;
        $this->installmentsPerYear = $installmentsPerYear;
    }

    private function validateAmount(int $amount): void
    {
        if ($amount < 1000 || $amount > 12000 || $amount % 500 !== 0) {
            throw new InvalidArgumentException('Kwota musi być z przedziału <1000, 12000> i podzielna przez 500.');
        }
    }

    private function validateInstallments(int $installments): void
    {
        if ($installments < 3 || $installments > 18) {
            throw new InvalidArgumentException('Liczba rat musi być z przedziału <3, 18> i podzielna przez 3.');
        }
        if ($installments % 3 !== 0) {
            throw new InvalidArgumentException('Liczba rat musi być podzielna przez 3.');
        }
    }
}
