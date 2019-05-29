<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MIRUserController extends AbstractController
{
    /**
     * @Route("/panel", name="user_panel")
     */
    public function index()
    {
        //Get datas
        $user = $this->getUser();
        $projects = $user->getProjects();

        return $this->render('mir_user/panel.html.twig',[
            'user' => $user,
            'projects' => $projects
        ]);
    }
}
