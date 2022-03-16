<?php

namespace App\Controller\Admin;

use App\Entity\Shop;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
class ShopCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Shop::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameshop'),
            TextEditorField::new('description'),
            ImageField::new('imageProfil')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products'),
            ImageField::new('imageBanner')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products'),
            DateTimeField::new('creatAt'),
            
        ];
    }
    
}
