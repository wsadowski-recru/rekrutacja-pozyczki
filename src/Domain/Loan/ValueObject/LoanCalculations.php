<?php

namespace App\Domain\Loan\ValueObject;

use JsonSerializable;

readonly class LoanCalculations implements JsonSerializable
{
    public function __construct(
        private LoanCalculationSchedule $schedule,
        private LoanCalculationMetrics $metrics
    )
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'metrics' => $this->metrics,
            'schedule' => $this->schedule
        ];
    }
}
