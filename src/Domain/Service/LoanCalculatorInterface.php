<?php

namespace App\Domain\Service;

use App\Domain\Loan\ValueObject\LoanCalculations;

interface LoanCalculatorInterface
{
    public function calculate(int $amount, float $annualInterestRate, int $installments, int $installmentsPerYear): LoanCalculations;
}
