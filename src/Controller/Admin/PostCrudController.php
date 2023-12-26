<?php

namespace App\Controller\Admin;

use App\Entity\Post;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');
        yield TextField::new('categorie');
        yield TextareaField::new('article');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class);
        yield DateField::new('jour_redaction');

    }
}
