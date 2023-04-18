<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function index(
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response
    {
        $user = new User();
        $user->setEmail("admin@localhost.com");
        $plainpassword = "admin";
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plainpassword
        );
        $user->setPassword($hashedPassword);
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response("User has been registered");

        /*return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);*/
    }
}
