<?php

namespace App\Domain\Loan\Calculator;

use App\Domain\Loan\ValueObject\LoanCalculations;

class LoanCalculator
{
    public function __construct(private readonly LoanCalculatorInterface $calculator)
    {
    }

    public function calculate(int $amount, float $annualInterestRate, int $installments): LoanCalculations
    {
        return $this->calculator->calculate($amount, $annualInterestRate, $installments);
    }
}
