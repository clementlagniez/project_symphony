<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Subgenre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/subgenre")
 */
class SubgenreController extends Controller
{

	/**
     * @Route("/list", name="subgenre_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $subgenres = $em->getRepository('BackendBundle:Subgenre')->findAll();

        return $this->render('FrontendBundle:Subgenre:index.html.twig', array(
            "subgenres"=>$subgenres
        ));
    }


    /**
     * @Route("/detail/{id}", name="subgenre_detail")
     */
    public function showAction(Subgenre $subgenre)
    {

        return $this->render('FrontendBundle:Subgenre:show.html.twig', array(
            'subgenre' => $subgenre,
        ));
    }

}
