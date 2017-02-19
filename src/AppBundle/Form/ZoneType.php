<?php



namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ZoneType
 *
 * @author grand coco
 */
class ZoneType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('POST')
                ->add('nom')
                ->add('couleur', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('heureDate', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('utilisateur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class,array('class'=>'AppBundle:Utilisateur'))
                ->add('ajouter', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }
}
