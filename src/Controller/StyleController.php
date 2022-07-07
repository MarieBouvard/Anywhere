<?php

namespace App\Controller;

use App\Repository\StyleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StyleController extends AbstractController
{
    /**
     * @Route("/style", name="app_style")
     */
    public function index(StyleRepository $repo): Response
    {
        $style = $repo->findAll([], ['name'=>'DESC']);
        return $this->render('style/index.html.twig', [
            'style' => $style
        ]);
                
    }
}
