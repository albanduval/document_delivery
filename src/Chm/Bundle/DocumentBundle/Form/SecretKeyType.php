<?php

namespace Chm\Bundle\DocumentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SecretKeyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('secret_key', 'password')
            ->add('save', 'submit', [
                    'icon'       => 'save',
                ]
            );
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chm_bundle_documentbundle_document';
    }
}
