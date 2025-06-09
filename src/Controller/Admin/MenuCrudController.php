<?php

namespace App\Controller\Admin;

use App\Menu\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            TextField::new('label', 'Nom du menu'),

            // Champ pour uploader l’image (utilise VichUploader)
            TextareaField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),

            // Affiche l’image déjà uploadée dans la liste (index)
            ImageField::new('imageName', 'Image actuelle')
                ->setBasePath('/uploads/images/menus')
                ->onlyOnIndex(),

            IntegerField::new('position', 'Position'),
        ];
    }
}
