<?php

namespace App\DTO\Capsula;

use App\Entity\Usuario;
use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;

class CriarCapsulaDTO
{
    public function __construct (
        #[Assert\NotBlank(message: 'Nao pode ser vazio')]
        public readonly string $titulo,

        #[Assert\NotBlank(message: 'Nao pode ser vazio')]
        public readonly string $descricao,

        #[Assert\NotBlank(message: 'Nao pode ser vazio')]
        public readonly DateTimeImmutable $openData,

        #[Assert\NotBlank(message: 'Nao pode ser vazio')]
        public readonly string $senha,
    )
    {
    }
}
