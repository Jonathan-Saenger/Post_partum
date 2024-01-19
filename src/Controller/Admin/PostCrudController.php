<?php

namespace App\Controller\Admin;

use App\Entity\Post;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Intl\Languages;

\Locale::setDefault('en');
$language = Languages::getName('fr');
$language = Languages::getAlpha3Name('fra');

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');
        yield ChoiceField::new('categorie')->setChoices([
            'Grossesse/Accouchement' => 'Grossesse/Accouchement',
            'Allaitement' => 'Allaitement',
            'Alimentation' => 'Alimentation',
            'Sommeil' => 'Sommeil',
            'Santé et bien-être bébé' => 'Santé et bien-être bébé',
            'Développement/Education' => 'Développement/Education',
            'Bien-être Maman' => 'Bien-être Maman',
        ]);
        yield TextEditorField::new('article');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield DateField::new('jour_redaction');

    }
}
