<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Style;
use App\Entity\HeaderBlog;
use App\Entity\Travel;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Anywhere');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Catégorie de voyage', 'fa fa-list', Style::class);
        yield MenuItem::linkToCrud('Voyages', 'fa fa-plane', Travel::class);
        yield MenuItem::linkToCrud("Catégories d'articles", 'fa fa-wallet', Type::class);
        yield MenuItem::linkToCrud('Articles de blog', 'fa fa-feather', Article::class);
        yield MenuItem::linkToCrud('Header du blog', 'fa fa-image', HeaderBlog::class);
    }
}
