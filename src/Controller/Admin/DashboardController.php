<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Client;
use App\Entity\Compte;
use App\Entity\Article;
use App\Entity\Commande;
use App\Entity\Paiement;
use App\Entity\Categorie;
use App\Entity\LigneCommande;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('easy_admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kiri Kita-Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Clients', 'fa fa-user',Client::class);
        yield MenuItem::linkToCrud('Comptes', 'fa fa-user',Compte::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list',Categorie::class);
        yield MenuItem::linkToCrud('Articles', 'fa-solid fa-newspaper',Article::class);
        yield MenuItem::linkToCrud('Images', 'fa-regular fa-file-image',Image::class);
        yield MenuItem::linkToCrud('Paiements', 'fa-solid fa-cash-register',Paiement::class);
        yield MenuItem::linkToCrud('Commandes', 'fa-solid fa-bag-shopping',Commande::class);
        yield MenuItem::linkToCrud('Lignes de commandes', 'fa-regular fa-file-image',LigneCommande::class);
    }
}
