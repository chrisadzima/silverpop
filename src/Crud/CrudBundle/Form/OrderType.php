<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Crud\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('subject');
        $builder->add('Item Name', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}