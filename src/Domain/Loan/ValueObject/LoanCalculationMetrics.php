<?php

namespace App\Domain\Loan\ValueObject;

use DateTimeImmutable;
use JsonSerializable;

class LoanCalculationMetrics implements JsonSerializable
{
    public function __construct(
        private readonly DateTimeImmutable $calculationTime,
        private readonly int $totalInstallments,
        private readonly float $principal,
        private readonly float $annualInterestRate
    ) {
    }


    public function jsonSerialize(): array
    {
        return [
            'calculation_time' => $this->calculationTime->format('Y-m-d H:i:s'),
            'total_installments' => $this->totalInstallments,
            'principal' => $this->principal,
            'annual_interest_rate' => $this->annualInterestRate,
        ];
    }
}