<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 17:29
 */

namespace Application\Mapper\User;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class User  implements ServiceLocatorAwareInterface{

    use ServiceLocatorAwareTrait;

    /**
     * @param User $user
     *
     * @return $this
     */
    public function store(\Application\Entity\User\User $user)
    {
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $entityManager->persist($user);
        $entityManager->flush();

        return $this;
    }


} 