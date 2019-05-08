<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MIRUserController extends AbstractController
{
    /**
     * @Route("/panel", name="user_panel")
     */
    public function index()
    {
        return $this->render('mir_user/panel.html.twig');
    }
}
