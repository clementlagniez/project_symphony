<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\State;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/state")
 */
class StateController extends Controller
{

	/**
     * @Route("/list", name="state_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $states = $em->getRepository('BackendBundle:State')->findAll();

        return $this->render('FrontendBundle:State:index.html.twig', array(
            "states"=>$states
        ));
    }


    /**
     * @Route("/detail/{id}", name="state_detail")
     */
    public function showAction(State $state)
    {

        return $this->render('FrontendBundle:State:show.html.twig', array(
            'state' => $state,
        ));
    }

}
