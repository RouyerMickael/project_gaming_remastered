<?php

namespace App\Entity;

use App\Repository\SecurityRepository;
use Doctrine\ORM\Mapping as ORM;

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


    public function getId(){
        return $this->id;
    }

    public function getGlobalPassword(): string
    {
        return $this->globalPassword;
    }

}
