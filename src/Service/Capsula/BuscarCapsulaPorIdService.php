<?php

namespace App\Service\Capsula;

use App\Entity\Capsula;
use App\Repository\CapsulaRepository;
use Exception;

class BuscarCapsulaPorIdService
{
    public function __construct(
        public readonly CapsulaRepository $capsulaRepository
    )
    {
    }

    public function buscarPorIdOuFalhar(int $id): ?Capsula
    {
        return $this->capsulaRepository->find($id) ?? throw new Exception('nao encontrado');
    }
}
