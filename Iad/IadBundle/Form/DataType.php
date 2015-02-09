<?php

namespace Iad\IadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DataType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('otg')
            ->add('itg')
            ->add('dt_charge_start')
            ->add('dt_charge_start_m100')
            ->add('call_type_id')
            ->add('destination')
            ->add('called_number')
            ->add('dt_call_end')
            ->add('dt_call_end_m100')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iad\IadBundle\Entity\Data'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iad_iadbundle_data';
    }
}
