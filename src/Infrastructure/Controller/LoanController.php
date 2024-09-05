<?php

namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoanController
{
    #[Route('/loan/calculate', methods: ['GET'])]
    public function calculateLoan(Request $request): JsonResponse
    {
       dd(123);
    }
}
