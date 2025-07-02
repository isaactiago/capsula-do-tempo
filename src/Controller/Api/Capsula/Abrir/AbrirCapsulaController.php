<?php

namespace App\Controller\Api\Capsula\Abrir;

use App\Controller\DefaultController;
use App\Service\Capsula\AbrirCapsulaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Webmozart\Assert\Assert as AssertAssert;

#[Route(path:'api/v1/capsula/abrir/{id}', methods:['POST'])]
class AbrirCapsulaController extends DefaultController
{
    public function __invoke(
        int $id,
        AbrirCapsulaService $abrirCapsula,
        Request $request
    ): JsonResponse
    {
        $senha = $request->get("senha");
        try {
            AssertAssert::notEmpty($senha);

            return $this->toJsonResponse(
                data: $abrirCapsula->execute(id: $id, senha: $senha),
               mensagem: 'Capsula aberta'
            );
        } catch (\Throwable $th) {
            return $this->toJsonResponseException($th);
        }
    }
}
