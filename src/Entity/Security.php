<?php

namespace App\Entity;

use App\Repository\SecurityRepository;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass=SecurityRepository::class)
 */
class Security
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $globalPassword;

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


    public function __toString()
    {
        return $this->id;
    }

    public function getId(){
        return $this->id;
    }

    public function getGlobalPassword(): string
    {
        return $this->globalPassword;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

}
