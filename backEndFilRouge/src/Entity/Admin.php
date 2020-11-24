<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 * @ApiResource(
 *      collectionOperations={
 *         "post"={"path"="/admin",
 *         "route_name"="admin"
 *      }
 *      }
 * )
 */
class Admin extends User
{

    public function getId(): ?int
    {
        return $this->id;
    }
}
