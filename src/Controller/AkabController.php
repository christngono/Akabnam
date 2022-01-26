<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticleType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\Date;

class AkabController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->render('akab/index.html.twig', [
            'controller_name' => 'AkabController',
            'articles' => $articles
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
    public function show(Article $article): Response

    {
        return $this->render('akab/show.html.twig', [
            'controller_name' => 'AkabController',
            'article' => $article
        ]);
    }

    #[Route('/boutique', name: 'showShop')]
    public function showShop(): Response

    {
        return $this->render('akab/showShop.html.twig', [
            'controller_name' => 'AkabController',

        ]);
    }


    #[Route('/admin/new', name: 'create')]
    #[Route('/admin/{id}/edit', name: 'edit_article')]
    public function create(Article $article = null, Request $request, EntityManagerInterface $manager): Response

    {
        if (!$article) {
            $article = new Article;
        }

        /* $form = $this->createFormBuilder($article)
            ->add('name')
            ->add('detail_product', TextareaType::class)
            ->add('bref', TextareaType::class)
            ->add('sale_conditions', TextareaType::class)
            ->add('image_link1')
            ->add('price')
            ->getForm();*/
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$article->getId()) {
                $article->setCreateAt(new \DateTime());
            }

            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('show', ['id' => $article->getId()]);
        }

        return $this->render('akab/create.html.twig', [
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !== null
        ]);
    }
}
