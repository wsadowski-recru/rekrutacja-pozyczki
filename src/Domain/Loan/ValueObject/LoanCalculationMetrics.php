<?php

namespace App\Domain\Loan\ValueObject;

use DateTimeImmutable;
use JsonSerializable;

readonly class LoanCalculationMetrics implements JsonSerializable
{
    public function __construct(
        private DateTimeImmutable $calculationTime,
        private int $totalInstallments,
        private float $principal,
        private float $annualInterestRate
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
