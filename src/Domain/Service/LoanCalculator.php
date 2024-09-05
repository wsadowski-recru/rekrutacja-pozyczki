<?php

namespace App\Domain\Service;

use App\Domain\Loan\ValueObject\LoanCalculations;

class LoanCalculator
{
    public function __construct(private readonly LoanCalculatorInterface $calculator)
    {
    }

    public function calculate(int $amount, float $annualInterestRate, int $installments, int $installmentsPerYear): LoanCalculations
    {
        return $this->calculator->calculate($amount, $annualInterestRate, $installments, $installmentsPerYear);
    }
}
