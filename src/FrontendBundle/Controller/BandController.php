<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/band")
 */
class BandController extends Controller
{
    /**
     * @Route("/list", name="band_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $bands = $em->getRepository('BackendBundle:Band')->findAll();

        return $this->render('FrontendBundle:Band:index.html.twig', array(
            "bands"=>$bands
        ));
    }

}
