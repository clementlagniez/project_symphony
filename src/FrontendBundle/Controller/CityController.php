<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/city")
 */
class CityController extends Controller
{

	/**
     * @Route("/list", name="city_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $cities = $em->getRepository('BackendBundle:City')->findAll();

        return $this->render('FrontendBundle:City:index.html.twig', array(
            "cities"=>$cities
        ));
    }

    /**
     * @Route("/detail/{id}", name="city_detail")
     */
    public function showAction(City $city)
    {

        return $this->render('FrontendBundle:City:show.html.twig', array(
            'city' => $city,
        ));
    }

}
