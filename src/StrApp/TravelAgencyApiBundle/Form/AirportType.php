<?php

namespace StrApp\TravelAgencyApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AirportType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('updated')
        ->add('created')
        ->add('airportCode')
        ->add('airportName')
        ->add('officePhone')
        ->add('streetAddress')
        ->add('city')
        ->add('stateOrProvince')
        ->add('codePostal')
        ->add('region');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StrApp\TravelAgencyApiBundle\Entity\Airport',
            'csrf_protection' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'strapp_travelagencyapibundle_airport';
    }


}
