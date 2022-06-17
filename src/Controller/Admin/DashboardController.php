<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use App\Entity\Article;
use App\Entity\Style;
use App\Entity\HeaderBlog;
use App\Entity\NumberOfPeople;
use App\Entity\Period;
use App\Entity\ServiceIncluded;
use App\Entity\ServiceNotIncluded;
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
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Style de voyage', 'fa fa-list', Style::class);
        yield MenuItem::linkToCrud('Activités de voyage', 'fa fa-dice-four', Activity::class);
        yield MenuItem::linkToCrud('Période de voyage', 'fa fa-calendar-week', Period::class);
        yield MenuItem::linkToCrud('Avec qui partir ?', 'fa fa-users', NumberOfPeople::class);
        yield MenuItem::linkToCrud('Services inclus dans le voyage', 'fa fa-clipboard-check' ,ServiceIncluded::class);
        yield MenuItem::linkToCrud('Services non inclus dans le voyage','fa fa-ban',ServiceNotIncluded::class);
        yield MenuItem::linkToCrud('Voyages', 'fa fa-plane', Travel::class);
        yield MenuItem::linkToCrud('Header du blog', 'fa fa-image', HeaderBlog::class);
        yield MenuItem::linkToCrud("Catégories d'articles pour le blog", 'fa fa-wallet', Type::class);
        yield MenuItem::linkToCrud('Articles de blog', 'fa fa-feather', Article::class);
    }
}
