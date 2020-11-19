<?php

namespace App\Entity;

class Service{

    public function addUser($user){
      
      // Get Body content of the Request
      $userJson = $request->getContent();
            
      // Deserialize and insert into dataBase
      $user = $serializer->deserialize($userJson, $user,'json');

      // Data Validation
      $errors = $validator->validate($user);
      if (count($errors)>0) {
        $errorsString =$serializer->serialize($errors,"json");
        return new JsonResponse( $errorsString ,Response::HTTP_BAD_REQUEST,[],true);
      }

      $entityManager = $this->getDoctrine()->getManager();
      $password = $user->getPassword();
      $user->setPassword($encoder->encodePassword($user, $password));
      $entityManager->persist($user);
      $entityManager->flush();
      return new JsonResponse("success",Response::HTTP_CREATED,[],true);
    }

}