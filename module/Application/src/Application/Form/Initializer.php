<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 15:26
 */

namespace Application\Form;


use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Initializer implements  InitializerInterface
{



    public function initialize($instance, ServiceLocatorInterface $serviceLocator){

        if($instance instanceof HydratorAwareInterface && $instance instanceof ObjectAwareInterface){
            $hydratorClass = $instance->getHydratorClass();
            $objectClass = $instance->getObjectClass();

            $entityManager = $serviceLocator->getServiceLocator()->get('doctrine.entitymanager.orm_default');

            $hydrator = new $hydratorClass($entityManager,$objectClass);

            $instance->setObject(new $objectClass);

            $instance->setHydrator($hydrator);
        }

        return $instance;
    }

} 