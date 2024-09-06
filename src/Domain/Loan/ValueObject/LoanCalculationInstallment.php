<?php

namespace App\Domain\Loan\ValueObject;

use JsonSerializable;

readonly class LoanCalculationInstallment implements JsonSerializable
{
    public function __construct(
        private int $installmentNumber,
        private float $installmentAmount,
        private float $interestPayment,
        private float $principalPayment
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
