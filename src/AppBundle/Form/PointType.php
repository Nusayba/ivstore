<?php



namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of PointType
 *
 * @author grand coco
 */
class PointType extends AbstractType{
     public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->setMethod('POST')
                ->add('x', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('y', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('position', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('utilisateur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class,array('class'=>'AppBundle:Utilisateur'))
                ->add('ajouter', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
