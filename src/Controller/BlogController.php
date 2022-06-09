<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Type;
use App\Repository\ArticleRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    // private $entityManager;

    // public function __construct(EntityManagerInterface $entityManager)
    // {
    //     $this->entityManager = $entityManager;
    // }


    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(TypeRepository $repo): Response
    {
        $type = $repo->findAll([], ['name'=>'DESC']);
        return $this->render('blog/index.html.twig', [
            'type' => $type,
            'articles' => $this->getDoctrine()->getRepository(Article::class)->findLastTwoArticles(),
        ]);
    }

    // Afficher tous les articles quelque soit leur type. 
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

    // Afficher les articles par catégorie.
    /**
     * @Route("/blog/type/{id}", name="app_blog_id")
     */
    public function byType($id, ArticleRepository $repo): Response
    {                
       
        $articles = $repo->findBy([
            'Type' => $id
        ]);
        return $this->render('blog/type.html.twig', [
            'articles' => $articles,
        ]);

    }

    // Afficher un article en détail
    /**
     * @Route("/blog/article/{id}", name="app_blog_show")
     */
    public function show($id, ArticleRepository $repo): Response
    {
        $article = $repo->find($id);
        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }

}
