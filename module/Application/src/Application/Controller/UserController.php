<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 15:08
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController{


    public function createAction(){

        $sl = $this->getServiceLocator();
        /** @var \Application\Form\User\Profile $form */
        $form = $sl->get('FormElementManager')->get('form.user.profile');


        if($this->getRequest()->isPost()){
            $form->setData($this->params()->fromPost());

            if($form->isValid()){
                $user = $sl->get('service.user.user');
                $user->persist($form->getData());

            }

        }
        return array('form' => $form);

    }
} 