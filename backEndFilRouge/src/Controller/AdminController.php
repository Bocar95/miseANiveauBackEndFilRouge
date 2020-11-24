<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\Service;
use App\Repository\ProfilRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
  
    /**
     * @Route("/api/admin", name="admin", methods={"POST"})
     */
    public function addAdmin(Request $request,SerializerInterface $serializer ,UserPasswordEncoderInterface $encoder, ProfilRepository $profilRepo, EntityManagerInterface $manager)
    {
      $service = new Service($serializer,$encoder,$profilRepo);
      $admin = $service->addUser('ADMIN', $request,$manager);

      return new JsonResponse("success",Response::HTTP_CREATED,[],true);
    }
}
