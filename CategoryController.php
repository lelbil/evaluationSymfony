<?php

namespace AppBundle\Controller;

use AppBundle\Entity\book;
use AppBundle\Entity\Category;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/bookstore", name="bookstore")
     */
    public function indexAction(){

        $results = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('categories/index.html.twig', [
            "results" => $results
        ]);
    }

    /**
     * @Route("bookstore/category/{id}", name="category")
     */
    public function categoryAction($id) {
        $result = $this->getDoctrine()->getRepository(Category::class)->find($id);
        return $this->render('categories/one.html.twig', [
            "result" => $result
        ]);
    }

    /**
     * @Route("bookstore/book/{id}", name="book")
     */
    public function queryAction($id) {
        $result = $this->getDoctrine()->getRepository(book::class)->find($id);

        return $this->render('categories/book.html.twig', [
            "result" => $result
        ]);
    }
}