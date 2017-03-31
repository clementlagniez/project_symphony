<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/charact")
 */
class CharactController extends Controller
{

	/**
     * @Route("/list", name="charact_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $characts = $em->getRepository('BackendBundle:Charact')->findAll();

        return $this->render('FrontendBundle:Charact:index.html.twig', array(
            "characts"=>$characts
        ));
    }	

}
