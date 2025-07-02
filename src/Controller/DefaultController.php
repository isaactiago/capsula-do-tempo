<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DefaultController extends AbstractController
{
    public function toJsonResponse(
        mixed $data = null,
        int $statusCode = Response::HTTP_OK
    ): JsonResponse
    {
        return $this->json([
            'data' => $data,
            'status' => $statusCode
        ],$statusCode);
    }

    public function toJsonResponseException(
        Throwable $erro,
        int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR
    ): JsonResponse
    {
        return $this->json([
            'erro' => (string) $erro,
            'status' => $statusCode,
            'menssage' => $erro->getMessage()
        ],$statusCode);
    }
}
