<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of AddPointType
 *
 * @author grand coco
 */
class AddPointType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('POST')
                ->add('ajouter un point', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
