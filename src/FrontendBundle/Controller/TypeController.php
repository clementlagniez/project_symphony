<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/type")
 */
class TypeController extends Controller
{

	/**
     * @Route("/list", name="type_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $types = $em->getRepository('BackendBundle:Type')->findAll();

        return $this->render('FrontendBundle:Type:index.html.twig', array(
            "types"=>$types
        ));
    }


    /**
     * @Route("/detail/{id}", name="type_detail")
     */
    public function showAction(Type $type)
    {

        return $this->render('FrontendBundle:Type:show.html.twig', array(
            'type' => $type,
        ));
    }

}
