<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @var Collection<int, Capsula>
     */
    #[ORM\OneToMany(targetEntity: Capsula::class, mappedBy: 'usuario')]
    private Collection $capsulas;

    public function __construct (
        #[ORM\Column]
        private string $nome,
    )
    {
        $this->capsulas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return Collection<int, Capsula>
     */
    public function getCapsulas(): Collection
    {
        return $this->capsulas;
    }

    public function addCapsula(Capsula $capsula): static
    {
        if (!$this->capsulas->contains($capsula)) {
            $this->capsulas->add($capsula);
            $capsula->setUsuario($this);
        }

        return $this;
    }

    public function removeCapsula(Capsula $capsula): static
    {
       $this->capsulas->removeElement($capsula);
        return $this;
    }
}
