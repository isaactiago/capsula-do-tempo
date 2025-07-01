<?php

namespace App\Entity;

use App\Repository\ConteudoRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConteudoRepository::class)]
class Conteudo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'conteudos')]
    #[ORM\JoinColumn(nullable: false)]
    private capsula $capsula;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private DateTimeImmutable $criadoEm;

    public function __construct (
        #[ORM\Column(type: 'string', enumType:ConteudoTypeEnum::class)]
        private string $conteudoType,
    )
    {
        $this->criadoEm = new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCapsula(): capsula
    {
        return $this->capsula;
    }

    public function setCapsula(capsula $capsula): static
    {
        $this->capsula = $capsula;

        return $this;
    }

    public function getCriadoEm(): DateTimeImmutable
    {
        return $this->criadoEm;
    }
}
