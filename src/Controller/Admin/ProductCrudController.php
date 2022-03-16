<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProductImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Bridge\Doctrine\Form\Type\ProductImageType;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            
            TextField::new('salecondition'),
            NumberField::new('views')->hideOnIndex(),
            MoneyField::new('price')->setCurrency('XAF'),
            NumberField::new('numberlike')->hideOnIndex(),
            ImageField::new('image')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products')
            ->setRequired(false),
            ImageField::new('image1')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products')
            ->setRequired(false),
            ImageField::new('image2')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products')
            ->setRequired(false),
            ImageField::new('image3')
            ->setBasePath('images/products')
            ->setUploadDir('public/images/products')
            ->setRequired(false),
            // TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            DateTimeField::new('datecreation'),
            AssociationField::new('category')->setFormTypeOptions(['choice_label' => 'name']),
            AssociationField::new('shop')->setFormTypeOptions(['choice_label' => 'nameshop']),
        //     CollectionField::new('productImages')
        //      ->setEntryType(ProductImageType::class)
        //       ->setFormTypeOptions([
        //       'by_reference' => 'false', 
        //   ]),
            TextEditorField::new('bref'),
            TextEditorField::new('avantage')->hideOnIndex(),
        ];
    }
    // public function configureCrud(Crud $crud): Crud
    // {
    //     return $crud
    //         ->setDateFormat('dd/MM/yyyy')
    //     ;
    // }
    
 
}