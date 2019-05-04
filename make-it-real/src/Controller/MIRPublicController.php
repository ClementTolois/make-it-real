<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MIRPublicController extends AbstractController
{
    /**
     * @Route("/", name="public_home")
     */
    public function home()
    {
        return $this->render('mir_public/home.html.twig');
    }

    /**
     * @Route("/discover", name="public_discover")
     */
    public function discover()
    {
        return $this->render('mir_public/discover.html.twig');
    }

    /**
     * @Route("/get_started", name="public_get_started")
     */
    public function getStarted()
    {
        return $this->render('mir_public/getStarted.html.twig');
    }

    /**
     * @Route("/community", name="public_community")
     */
    public function community()
    {
        return $this->render('mir_public/community.html.twig');
    }
}
