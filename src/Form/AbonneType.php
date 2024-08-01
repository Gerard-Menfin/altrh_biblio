<?php

namespace App\Form;

use App\Entity\Abonne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $abonne = $options["data"];
        /* 
        $options["data"] permet de récupérer l'objet utilisé comme données du formulaire, 
        c'est le 2ième argument de createForm(), utilisée dans le contrôleur */
        
        $builder
            ->add('pseudo')
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    "Administrateur" => "ROLE_ADMIN",
                    "Bibliothécaire" => "ROLE_BIBLIO",
                    "Lecteur"        => "ROLE_LECTEUR"
                ],
                "multiple" => true,
                "expanded" => true
            ])
            ->add('password', null, [
                "mapped"        =>  false,
                "required"      =>  $abonne->getId() ? false : true
            ])
            ->add('nom')
            ->add('prenom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonne::class,
        ]);
    }
}
