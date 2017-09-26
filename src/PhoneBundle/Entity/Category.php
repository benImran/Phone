<?php

namespace PhoneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="PhoneBundle\Repository\CategoryRepository")
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @ORM\OneToMany(
     *     targetEntity="PhoneBundle\Entity\Model",
     *     mappedBy="category", cascade={"remove"})
     */
    private $model;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="PhoneBundle\Entity\Brand",
     *     inversedBy="category", cascade={"remove"})
     */
    private $brand;


    public function getBrand()
    {
        return $this->brand;
    }


    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }


    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }


    public function __construct()
    {
        $this->model = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
    }



    public function getId()
    {
        return $this->id;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }
}

