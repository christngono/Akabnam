<?php

namespace App\Controller;

use DateTime;
use App\Entity\Shop;
use App\Entity\Product;
use App\Entity\Category;
use App\Form\ProductType;
use App\Repository\ShopRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AkabController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProductRepository $repo, ShopRepository $shops): Response
    {
        $products = $repo->findAll();
        $shops = $shops->findAll();
        
        return $this->render('akab/index.html.twig', [
            'products' => $products,
            'shops' => $shops
        ]);
    }

    #[Route('/article', name: 'article')]
    public function article(): Response
    {
        return $this->render('akab/article.html.twig', [
            'controller_name' => 'AkabController',
        ]);
    }

    #[Route('/article/{id}', name: 'show')]
    public function show(Product $product): Response

    {
        return $this->render('akab/show.html.twig', [
            'controller_name' => 'AkabController',
            'product' => $product
        ]);
    }

    #[Route('/boutique/{id}', name: 'showShop')]
    public function showShop(Shop $shop): Response

    {
        return $this->render('akab/showShop.html.twig', [
            'shop' => $shop

        ]);
    }


    #[Route('/category/{name}', name: 'showCategory')]
    public function showCategory($name,Category $products): Response

    {

        return $this->render('akab/showCategory.html.twig', [
            'products' => $products

        ]);
    }


    #[Route('/about', name: 'about')]
    public function About(): Response

    {
        return $this->render('akab/about.html.twig', [
            'controller_name' => 'AkabController',

        ]);
    }


    #[Route('/monadmin/new', name: 'create')]
    #[Route('/monadmin/{id}/edit', name: 'edit_article')]
    public function create(Product $product = null, Request $request, EntityManagerInterface $manager): Response

    {
        if (!$product) {
            $product = new Product;
        }

        /* $form = $this->createFormBuilder($product)
            ->add('name')
            ->add('detail_product', TextareaType::class)
            ->add('bref', TextareaType::class)
            ->add('sale_conditions', TextareaType::class)
            ->add('image_link1')
            ->add('price')
            ->getForm();*/
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$product->getId()) {
                $product->setdatecreation(new \DateTime());
            }

            $manager->persist($product);
            $manager->flush();
            return $this->redirectToRoute('show', ['id' => $product->getId()]);
        }

        return $this->render('akab/create.html.twig', [
            'formProduct' => $form->createView(),
            'editMode' => $product->getId() !== null
        ]);
    }
}
