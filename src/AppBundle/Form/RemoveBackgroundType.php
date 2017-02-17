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
 * Description of RemoveBackground
 *
 * @author Administrateur
 */
class RemoveBackgroundType extends AbstractType{
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array('class'=>'AppBundle:Background'))
                ->add('submit', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
