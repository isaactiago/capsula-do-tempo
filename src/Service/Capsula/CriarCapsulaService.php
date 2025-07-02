<?php

namespace App\Service\Capsula;

use App\DTO\Capsula\CriarCapsulaDTO;
use App\Entity\Capsula;
use App\Repository\CapsulaRepository;
use App\Repository\UsuarioRepository;

class CriarCapsulaService
{
    public function __construct(
        public readonly CapsulaRepository $capsulaRepository,
        public readonly UsuarioRepository $usuarioRepository
    )
    {
    }

    public function execute(
        CriarCapsulaDTO $dto,
        int $id
    ): Capsula
    {
        $usuario = $this->usuarioRepository->find($id);

        $capsula = new Capsula(
            titulo: $dto->titulo,
            descricao: $dto->descricao,
            openData: $dto->openData,
            usuario: $usuario,
            senha: password_hash($dto->senha,PASSWORD_DEFAULT)
        );

        return $this->capsulaRepository->salvar($capsula);
    }
}
