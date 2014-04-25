<?php


namespace Application\Mapper;

use Application\AbstractFactoryAbstract,
    Application\NamespaceManagerAwareTrait,
    Zend\ServiceManager\AbstractFactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;


class AbstractFactory extends AbstractFactoryAbstract implements AbstractFactoryInterface
{
    /**
     * Add current namespace
     */
    public function __construct()
    {
        $this->addNamespace(__NAMESPACE__);
    }

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param string                  $name
     * @param string                  $requestedName
     *
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return strpos($requestedName, 'mapper.') === 0;
    }

}