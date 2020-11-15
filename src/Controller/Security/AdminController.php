<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class AdminController
 * @package App\Controller\Security
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/login", name="admin_login")
     *
     * @param AuthenticationUtils $utils
     *
     * @return Response
     */
    public function login(AuthenticationUtils $utils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('admin_dashboard');
         }

        return $this->render('Admin/Security/login.twig', [
            'last_username' => $utils->getLastUsername(),
            'error' => $utils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/logout", name="admin_logout")
     */
    public function logout(): void
    {
    }
}
