<?php

namespace App\Domain\Loan\ValueObject;

use JsonSerializable;

class LoanCalculationSchedule implements JsonSerializable
{
    public function __construct(private array $installments = [])
    {
    }

    public function addInstallment(LoanCalculationInstallment $installment): void
    {
        $this->installments[] = $installment;
    }

    public function jsonSerialize(): array
    {
        return array_map(
            fn (LoanCalculationInstallment $installment) => $installment->jsonSerialize(),
            $this->installments
        );
    }
}
