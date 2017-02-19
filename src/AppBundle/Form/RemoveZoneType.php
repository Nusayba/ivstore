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
 * Description of RemoveZoneType
 *
 * @author grand coco
 */
class RemoveZoneType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('DELETE')
                ->add('supprimer la zone', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
    //put your code here
}
