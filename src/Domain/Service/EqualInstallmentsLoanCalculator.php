<?php

namespace App\Domain\Service;

use App\Domain\Loan\Enum\InstallmentsPerYear;
use App\Domain\Loan\ValueObject\LoanCalculationInstallment;
use App\Domain\Loan\ValueObject\LoanCalculationMetrics;
use App\Domain\Loan\ValueObject\LoanCalculations;
use App\Domain\Loan\ValueObject\LoanCalculationSchedule;
use DateTimeImmutable;

class EqualInstallmentsLoanCalculator implements LoanCalculatorInterface
{
    public function calculate(int $amount, float $annualInterestRate, int $installments, int $installmentsPerYear): LoanCalculations
    {
        $k = InstallmentsPerYear::MONTHLY->value;
        $r = $annualInterestRate / 100;
        $n = $installments;

        $monthlyInterestRate = $r / $k;
        $installmentAmount = $amount * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $n)) / (pow(1 + $monthlyInterestRate, $n) - 1);

        $schedule = new LoanCalculationSchedule();
        $remainingPrincipal = $amount;

        for ($i = 1; $i <= $n; $i++) {
            $interestPayment = $remainingPrincipal * $monthlyInterestRate;
            $principalPayment = $installmentAmount - $interestPayment;
            $remainingPrincipal -= $principalPayment;

            $schedule->addInstallment(new LoanCalculationInstallment(
                    $i,
                    round($installmentAmount, 2),
                    round($interestPayment, 2),
                    round($principalPayment, 2)
                )
            );
        }

        $metrics = new LoanCalculationMetrics(
            new DateTimeImmutable(),
            $installments,
            $amount,
            $annualInterestRate
        );

        return new LoanCalculations(
            $schedule,
            $metrics
        );
    }
}