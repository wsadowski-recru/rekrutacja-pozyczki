<?php

namespace App\Domain\Loan\ValueObject;

use JsonSerializable;

class LoanCalculationInstallment implements JsonSerializable
{
    public function __construct(
        private readonly int $installmentNumber,
        private readonly float $installmentAmount,
        private readonly float $interestPayment,
        private readonly float $principalPayment
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
          'installment_number' => $this->installmentNumber,
          'installment_amount' => $this->installmentAmount,
          'interest_payment' => $this->interestPayment,
          'principal_payment' => $this->principalPayment,
        ];
    }
}