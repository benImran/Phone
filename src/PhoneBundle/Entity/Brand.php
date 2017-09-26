<?php

namespace PhoneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @ORM\OneToMany(
     *     targetEntity="PhoneBundle\Entity\Category",
     *     mappedBy="brand", cascade={"remove"})
     */
    private $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }



    public function __toString()
    {
        return (string) $this->getName();
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

    public function addModel(\PhoneBundle\Entity\Model $category)
    {
        $this->category[] = $category;

        return $this;
    }

    public function removeModel(\PhoneBundle\Entity\Model $category)
    {
        $this->category->removeElement($category);
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
