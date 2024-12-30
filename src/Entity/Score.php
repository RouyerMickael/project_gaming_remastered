<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass=ScoreRepository::class)
 */
class Score
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Weapon::class, inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $weapon;

    /**
     * @ORM\ManyToOne(targetEntity=Controls::class, inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $controls;

    /**
     * @var \DateTime $created
     * 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
    */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
    */
    private $updated;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;



    public function __toString()
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getControls(): ?Controls
    {
        return $this->controls;
    }

    public function setControls(?Controls $controls): self
    {
        $this->controls = $controls;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

}
