<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Evenement;
use App\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Application Post Partum');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Blog', 'fas fa-list', Blog::class);
        yield MenuItem::linkToCrud('Post', 'fas fa-list', Post::class);  
        yield MenuItem::linkToCrud('Commentaire', 'fas fa-list', Commentaire::class);
        yield MenuItem::linkToCrud('Evenement', 'fas fa-list', Evenement::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);   
        yield MenuItem::linkToUrl('Retour sur le site', 'fas fa-home', $this->generateUrl('app_home'));
    }
}
