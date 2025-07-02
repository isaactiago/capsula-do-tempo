<?php

namespace App\Controller\Api\Capsula\Criar;

use App\Controller\DefaultController;
use App\DTO\Capsula\CriarCapsulaDTO;
use App\Service\Capsula\CriarCapsulaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path:'/api/v1/capsula/criar/{id}', methods:['POST'])]
class CriarCapsulaController extends DefaultController
{
    public function __invoke (
        #[MapRequestPayload()] CriarCapsulaDTO $dto,
        int $id,
        CriarCapsulaService $criarCapsulaService
    ): JsonResponse
    {
        try {
            return $this->toJsonResponse(
                data: $criarCapsulaService->execute(dto: $dto, id: $id),
                statusCode: Response::HTTP_CREATED,
            );
        } catch (\Throwable $e) {
            return $this->toJsonResponseException($e);
        }
    }
}
