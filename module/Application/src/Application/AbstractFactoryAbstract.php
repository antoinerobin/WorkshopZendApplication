<?php
/**
 * AbstractFactoryAbstract.php
 *
 * @date        21/05/13
 * @author      Renaud Wellens < renaud.wellens@vaconsulting.lu >
 * @file        AbstractFactoryAbstract.php
 * @copyright   Copyright (c) Foyer - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
namespace Application;

use Zend\Filter\StaticFilter;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractFactoryAbstract
{
    /**
     * @var array
     */
    protected $namespaces = [];

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param string                  $name
     * @param string                  $requestedName
     *
     * @return object
     * @throws Exception
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $requestedName     = explode('.', $requestedName);
        $nameSpaceExploded = explode('/', end($requestedName));

        $className = '';
        foreach ($nameSpaceExploded as $nameSpaces) {
            $className .= '\\' . \ucfirst(StaticFilter::execute($nameSpaces, 'Word\DashToCamelCase'));
        }

        foreach ($this->getNamespaces() as $namespace) {
            $classNameWithNameSpace = '\\' . $namespace . $className;
            if (class_exists($classNameWithNameSpace)) {
                return new $classNameWithNameSpace;
            }
        }

        throw new Exception('No service available for class name ' . (string) $className);
    }


    /**
     * @param $namespaces
     *
     * @return $this
     */
    public function setNamespaces($namespaces)
    {
        $this->namespaces = (array) $namespaces;

        return $this;
    }

    /**
     * @param string $namespace
     *
     * @return $this
     */
    public function addNamespace($namespace)
    {
        $this->namespaces[] = (string) $namespace;

        return $this;
    }

    /**
     * @return array
     */
    public function getNamespaces()
    {
        return $this->namespaces;
    }
}