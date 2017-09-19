<?php

namespace StrApp\TravelAgencyApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('updated')->add('created')->add('travelCode')->add('numberPlaces')->add('travelDate')->add('additionalInformation')->add('originAirport')->add('destinationAirport')->add('passenger');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StrApp\TravelAgencyApiBundle\Entity\Travel',
            'csrf_protection' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'strapp_travelagencyapibundle_travel';
    }


}
