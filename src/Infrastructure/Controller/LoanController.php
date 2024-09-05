<?php

namespace App\Infrastructure\Controller;

use App\Application\Message\Command\CalculateLoanCommand;
use App\Application\Message\Command\Handler\CalculateLoanHandler;
use App\Infrastructure\Serializer\JsonDeserializer;
use InvalidArgumentException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoanController extends AbstractController
{
    public function __construct(private readonly CalculateLoanHandler $handler)
    {
    }

    #[Route('api/loan/calculate', methods: ['POST'])]
    public function calculateLoan(Request $request): JsonResponse
    {
        try {
            $payload = JsonDeserializer::deserialize($request->getContent());
            $response = $this->handler->handle(new CalculateLoanCommand(
                $payload['amount'],
                $payload['annual_interest_rate'],
                $payload['installments'],
                $payload['installments_per_year'],
            ));
        } catch (InvalidArgumentException $e) {
            return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        } catch (JsonException $e) {
            return new JsonResponse(['message' => 'Coś poszło nie tak, Twoja wiadomość wydaje się nie poprawna'], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($response);
    }
}
