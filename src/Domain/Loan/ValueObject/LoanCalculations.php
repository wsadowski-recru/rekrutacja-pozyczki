<?php

namespace App\Domain\Loan\ValueObject;

use JsonSerializable;

class LoanCalculations implements JsonSerializable
{

    public function __construct(
        private readonly LoanCalculationSchedule $schedule,
        private readonly LoanCalculationMetrics  $metrics
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
