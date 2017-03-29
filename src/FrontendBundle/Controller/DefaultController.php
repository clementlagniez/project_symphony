<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function exempleAction()
    {
        return $this->render('FrontendBundle:Default:index.html.twig');
    }

    /**
     * @Route("/artist")
     */
    public function indexAction()
    {
        return $this->render('artist/index.html.twig', array(
            'artists' => $artists,
        ));
    }

}
