<?php

namespace App\Application\Message\Command\Handler;

use App\Application\Message\Command\CalculateLoanCommand;
use App\Domain\Loan\Calculator\LoanCalculator;
use App\Domain\Loan\ValueObject\LoanCalculations;

class CalculateLoanHandler
{
    public function __construct(private readonly LoanCalculator $loanCalculator)
    {
    }

    public function handle(CalculateLoanCommand $command): LoanCalculations
    {
        return $this->loanCalculator->calculate($command->getAmount(), $command->getAnnualInterestRate(), $command->getInstallments());
    }
}
