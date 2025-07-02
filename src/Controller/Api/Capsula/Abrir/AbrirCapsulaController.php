<?php

namespace App\Controller\Api\Capsula\Abrir;

use App\Controller\DefaultController;
use App\Service\Capsula\AbrirCapsulaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path:'api/v1/capsula/abrir/{id}', methods:['PUT'])]
class AbrirCapsulaController extends DefaultController
{
    public function __invoke(int $id, AbrirCapsulaService $abrirCapsula): JsonResponse
    {
        try {
            return $this->toJsonResponse(
                data: $abrirCapsula->execute(id: $id),
               mensagem: 'Capsula aberta'
            );
        } catch (\Throwable $th) {
            return $this->toJsonResponseException($th);
        }
    }
}
