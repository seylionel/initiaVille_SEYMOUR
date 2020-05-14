<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(ProjectRepository $projectRepository) : Response
    {
        return $this->render('default/index.html.twig', [
            'projects' => $projectRepository->findAll()
        ]);
    }
}

