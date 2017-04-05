<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/book")
 */
class BookController extends Controller
{

	/**
     * @Route("/list", name="book_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $books = $em->getRepository('BackendBundle:Book')->findAll();

        return $this->render('FrontendBundle:Book:index.html.twig', array(
            "books"=>$books
        ));
    }

    /**
     * @Route("/detail/{id}", name="book_detail")
     */
    public function showAction(Book $book)
    {

        return $this->render('FrontendBundle:Book:show.html.twig', array(
            'book' => $book,
        ));
    }

}
