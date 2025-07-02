<?php

namespace App\Service\Capsula;

use App\Repository\CapsulaRepository;
use Exception;

class AbrirCapsulaService
{
    public function __construct(
        public readonly CapsulaRepository $capsulaRepository,
        public readonly BuscarCapsulaPorIdService $buscarCapsulaPorIdService
    )
    {
    }

    public function execute(int $id, string $senha): void
    {
        $capsula = $this->buscarCapsulaPorIdService->buscarPorIdOuFalhar(id: $id);

        if(! password_verify($senha, $capsula->getSenha())){
            throw new Exception("Senha não corresponde");
        }

        if($capsula->getOpenCapsula() === true){
            throw new Exception('capsula ja aberta');
        }

        $capsula->openCapsula();
        $this->capsulaRepository->editar();
    }
}
