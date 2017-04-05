<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/album")
 */
class AlbumController extends Controller
{

	/**
     * @Route("/list", name="album_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $albums = $em->getRepository('BackendBundle:Album')->findAll();

        return $this->render('FrontendBundle:Album:index.html.twig', array(
            "albums"=>$albums
        ));
    }

    /**
     * @Route("/detail/{id}", name="album_detail")
     */
    public function showAction(Album $album)
    {

        return $this->render('FrontendBundle:Album:show.html.twig', array(
            'album' => $album,
        ));
    }

}
