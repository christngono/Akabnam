<?php

namespace App\Controller\Admin;


use App\Entity\Product;
use App\Entity\Shop;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\ProductImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Akabnam Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('E-commerce Akabnam', 'fa fa-home');
        yield  MenuItem::section('PRODUITS');
        yield MenuItem::subMenu('Actions','fas fa-list' )->setSubItems([
                 MenuItem::linkToCrud('Ajouter un produit', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
                 MenuItem::linkToCrud('Voir les produits', 'fas fa-eye', Product::class)
        ]);
        yield MenuItem::subMenu('Catégories','fas fa-list' )->setSubItems([
                 MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
                 MenuItem::linkToCrud('Voir les catégories', 'fas fa-eye', Category::class)
        ]);

        yield MenuItem::subMenu('Boutiques','fas fa-list' )->setSubItems([
               MenuItem::linkToCrud('Ajouter une boutique', 'fas fa-plus', Shop::class)->setAction(Crud::PAGE_NEW),
               MenuItem::linkToCrud('Voir les boutiques', 'fas fa-eye', Shop::class)
        ]);
        
    }
}
