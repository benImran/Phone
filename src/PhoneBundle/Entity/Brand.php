<?php

namespace PhoneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Brand
 *
 * @ORM\Table(name="brand")
 * @ORM\Entity(repositoryClass="PhoneBundle\Repository\BrandRepository")
 * @Vich\Uploadable
 */
class Brand
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="model", type="string", length=70)
     */
    private $model;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @ORM\OneToMany(
     *     targetEntity="PhoneBundle\Entity\Product",
     *     mappedBy="brand", cascade={"remove"})
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }



    public function __toString()
    {
        return (string) $this->getName();
    }

    public function getProducts()
    {
        return $this->products;
    }



    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
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

    public function addProduct(\PhoneBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }



    public function removeProduct(\PhoneBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
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
}
