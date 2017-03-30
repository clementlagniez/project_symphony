<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HubController extends Controller
{
	/**
 * @Route("/hub")
 */
	public function HubAction()
    {

        return $this->render('FrontendBundle:Hub:index.html.twig');

    }
}
