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
    	$em=$this->getDoctrine()->getManager();

    	$movies=$em->getRepository('BackendBundle:Movie')->getRandom(3);
        return $this->render('FrontendBundle:Hub:index.html.twig');

    }


}
