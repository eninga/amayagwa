<?php

namespace App\Controller\Rest;

use App\Entity\Title;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Route("/api/amaya", name="api_amaya_")
 */
class MainController extends AbstractFOSRestController {

    /**
     * Creates an Title resource
     * @Rest\Post("/titles")
     * @param Request $request
     * @return View
     */
    public function postTitle(Request $request): View {
        $article = new Title();
        $article->setName($request->get('name'));
        $this->articleRepository->save($article);
        // In case our POST was a success we need to return a 201 HTTP CREATED response
        return View::create($article, Response::HTTP_CREATED);
        ;
    }

    /**
     * @Rest\Get("/users")
     * @return View
     */
    public function getTitle(): View {
        $articles = $this->getDoctrine()->getRepository(Title::class)->findAll();
        return View::create($articles, Response::HTTP_OK);
    }
}
