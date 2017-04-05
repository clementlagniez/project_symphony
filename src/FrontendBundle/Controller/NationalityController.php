<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Nationality;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/nationality")
 */
class NationalityController extends Controller
{

	/**
     * @Route("/list", name="nationality_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $nationalities = $em->getRepository('BackendBundle:Nationality')->findAll();

        return $this->render('FrontendBundle:Nationality:index.html.twig', array(
            "nationalities"=>$nationalities
        ));
    }


    /**
     * @Route("/detail/{id}", name="nationality_detail")
     */
    public function showAction(Nationality $nationality)
    {

        return $this->render('FrontendBundle:Nationality:show.html.twig', array(
            'nationality' => $nationality,
        ));
    }

}
