<?php

namespace PhoneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="PhoneBundle\Repository\ModelRepository")
 */
class Model
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;


    /**
     * @ORM\OneToOne(
     *     targetEntity="PhoneBundle\Entity\Category",
     *     inversedBy="model")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;


    /**
     * @ORM\OneToMany(
     *     targetEntity="PhoneBundle\Entity\Product",
     *     mappedBy="models", cascade={"remove"})
     */
    private $products;

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


    public function getProducts()
    {
        return $this->products;
    }


    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }


    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
}

