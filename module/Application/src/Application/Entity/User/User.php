<?php
/**
 * Created by PhpStorm.
 * User: antoinerobin
 * Date: 24/04/2014
 * Time: 14:17
 */

namespace Application\Entity\User;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class User
 * @package Application\Entity\User
 *
 * @ORM\Entity
 * @ORM\Table()
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var Integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var String
     */
    private $mail;

    /**
     * @ORM\Column(type="string")
     *
     * @var String
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     *
     * @var String
     */
    private $lastname;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \datetime
     */
    private $birthdate;

    /**
     * @ORM\Column(type="integer")
     *
     * @var Integer
     */
    private $gender;

    /**
     * @return \datetime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param \datetime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return String
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param String $email
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return String
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }




} 