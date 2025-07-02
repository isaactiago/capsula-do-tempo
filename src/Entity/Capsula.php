<?php

namespace App\Entity;

use App\Repository\CapsulaRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use JsonSerializable;

#[ORM\Entity(repositoryClass: CapsulaRepository::class)]
class Capsula implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private DateTimeImmutable $CriadoEm;

    /**
     * @var Collection<int, Conteudo>
     */
    #[ORM\OneToMany(targetEntity: Conteudo::class, mappedBy: 'capsula')]
    private Collection $conteudos;

    #[ORM\Column]
    private bool $openCapsula = false;

    public function __construct (
        #[ORM\Column]
        private string $titulo,

        #[ORM\Column]
        private string $descricao,

        #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
        private DateTimeImmutable $openData,

        #[ORM\ManyToOne(inversedBy: 'capsulas')]
        #[JoinColumn(nullable: false)]
        private Usuario $usuario,

        #[ORM\Column]
        private string $senha,
    )
    {
        $this->conteudos = new ArrayCollection();
        $this->CriadoEm = new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getCriadoEm(): DateTimeImmutable
    {
        return $this->CriadoEm;
    }

    public function getOpenData(): DateTimeImmutable
    {
        return $this->openData;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    /**
     * @return Collection<int, Conteudo>
     */
    public function getConteudos(): Collection
    {
        return $this->conteudos;
    }

    public function addConteudo(Conteudo $conteudo): static
    {
        if (!$this->conteudos->contains($conteudo)) {
            $this->conteudos->add($conteudo);
            $conteudo->setCapsula($this);
        }

        return $this;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function isOpenCapsula(): ?bool
    {
        return $this->openCapsula;
    }

    public function setOpenCapsula(bool $openCapsula): static
    {
        $this->openCapsula = $openCapsula;

        return $this;
    }

    public function openCapsula(): void
    {
        $this->openCapsula = true;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'openData' => $this->openData
        ];
    }
}
