<?php

namespace PhoneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Footer
 *
 * @ORM\Table(name="footer")
 * @ORM\Entity(repositoryClass="PhoneBundle\Repository\FooterRepository")
 */
class Footer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;


    public function getId()
    {
        return $this->id;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }


    public function getPhone()
    {
        return $this->phone;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;
        return $this;
    }
}
