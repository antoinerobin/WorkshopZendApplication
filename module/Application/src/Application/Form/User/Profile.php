<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 15:01
 */

namespace Application\Form\User;


use Application\Form\ObjectAwareInterface;
use Zend\Form\Form;
use Application\Form\HydratorAwareInterface;

class Profile extends Form implements HydratorAwareInterface, ObjectAwareInterface{

    public function init(){
        $this->add(
            [
                'name' => 'mail',
                'type' => 'email',
                'attributes' => [],
                'options' => [
                    'label' => '__mail'
                ]
            ]
        );

        $this->add(
            [
                'name' => 'firstname',
                'type' => 'text',
                'attributes' => [],
                'options' => [
                    'label' => '__firstname'
                ]
            ]
        );

        $this->add(
            [
                'name' => 'lastname',
                'type' => 'text',
                'attributes' => [],
                'options' => [
                    'label' => '__lastname'
                ]
            ]
        );

        $this->add(
            [
                'name' => 'birthdate',
                'type' => 'date',
                'attributes' => [],
                'options' => [
                    'label' => '__birthdate'
                ]
            ]
        );

        $this->add(
            [
                'name' => 'gender',
                'type' => 'radio',
                'attributes' => [],
                'options' => [
                    'value_options' => [
                        array('label' => '__male', 'value' => '1'),
                        array('label' => '__female', 'value' => '2'),
                    ],
                    'label' => '__gender'
                ]
            ]
        );

        $this->add(
            [
                'name' => 'submit_form',
                'type' => 'submit',
                'attributes' => ['value' => '__send'],
                'options' => [
                ]
            ]
        );


    }

    public function getHydratorClass(){
            return '\DoctrineModule\Stdlib\Hydrator\DoctrineObject';

    }

    public function getObjectClass(){
        return '\Application\Entity\User\User';

    }

} 