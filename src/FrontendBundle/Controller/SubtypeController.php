<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Subtype;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/subtype")
 */
class SubtypeController extends Controller
{

	/**
     * @Route("/list", name="subtype_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $subtypes = $em->getRepository('BackendBundle:Subtype')->findAll();

        return $this->render('FrontendBundle:Subtype:index.html.twig', array(
            "subtypes"=>$subtypes
        ));
    }


    /**
     * @Route("/detail/{id}", name="subtype_detail")
     */
    public function showAction(Subtype $subtype)
    {

        return $this->render('FrontendBundle:Subtype:show.html.twig', array(
            'subtype' => $subtype,
        ));
    }

}
