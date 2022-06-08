<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(TypeRepository $repo): Response
    {
        $types = $repo->findAll([], ['name'=>'DESC']);
        return $this->render('blog/index.html.twig', [
            'types' => $types
        ]);
    }


    /**
     * @Route("/blog-liste", name="app_blog_list")
     */
    public function list(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll([], ['date'=>'ASC']);
        return $this->render('blog/list.html.twig', [
            'articles' => $articles
        ]);
    }
}
