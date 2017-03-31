<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/country")
 */
class CountryController extends Controller
{

	/**
     * @Route("/list", name="country_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $countries = $em->getRepository('BackendBundle:Country')->findAll();

        return $this->render('FrontendBundle:Country:index.html.twig', array(
            "countries"=>$countries
        ));
    }	

}
