<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 16:21
 */

namespace Application\Service\User;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceLocatorInterface;

class User implements ServiceLocatorAwareInterface{

    use ServiceLocatorAwareTrait;


    public function persist($user){

        $this->getServiceLocator()->get('mapper.user.user')->store($user);

    }
} 