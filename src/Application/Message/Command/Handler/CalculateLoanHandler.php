<?php

namespace App\Application\Message\Command\Handler;

use App\Application\Message\Command\CalculateLoanCommand;
use App\Domain\Loan\ValueObject\LoanCalculations;
use App\Domain\Service\LoanCalculator;

class CalculateLoanHandler
{
    public function __construct(private readonly LoanCalculator $loanCalculator)
    {
    }

    public function handle(CalculateLoanCommand $command): LoanCalculations
    {
        return $this->loanCalculator->calculate($command->getAmount(), $command->getAnnualInterestRate(), $command->getInstallments(), $command->getInstallmentsPerYear());
    }
}
