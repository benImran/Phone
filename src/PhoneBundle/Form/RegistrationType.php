<?php

namespace PhoneBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('genre', ChoiceType::class, ['choices' => ['Mr' => 'Monsieur', 'Mlle' => 'Mademoiselle', 'Mme' => 'Madame'], 'multiple' => false , 'expanded' => true]);
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('date_de_naissance', BirthdayType::class, ['placeholder' => ['year' => 'Année', 'month' => 'Mois', 'date' => 'Date']]);
        $builder->add('adresse');
        $builder->add('complement_adresse');
        $builder->add('confirmation_email');
        $builder->add('code_postale');
        $builder->add('ville');
        $builder->add('pays', CountryType::class);
        $builder ->add('save', SubmitType::class, ['label' => 'Inscription']);
        $builder->add('username',null, ['required' => false]);
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
