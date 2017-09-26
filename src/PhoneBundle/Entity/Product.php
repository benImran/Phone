<?php

namespace PhoneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="PhoneBundle\Repository\ProductRepository")
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="string", length=80)
     */
    private $abstract;

    /**
     * @var int
     *
     * @ORM\Column(name="rate", type="integer")
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="stock", type="string", length=255)
     */
    private $stock;



    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="PhoneBundle\Entity\Type",
     *     inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;


    /**
     * @ORM\ManyToOne(
     *     targetEntity="PhoneBundle\Entity\Model",
     *     inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $models;


    /**
     * @Gedmo\Slug(fields={"title"}, updatable=false)
     * @ORM\Column(type="string", unique=true, length=128)
     */
    private $slug;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    /**
     * @ORM\Column(name="youtube_id", type="string", length=255)
     */
    private $youtubeId;

    public function __toString()
    {
        return (string) $this->getModels();
    }


    public function getYoutubeId()
    {
        return $this->youtubeId;
    }


    public function setYoutubeId($youtubeId)
    {
        $this->youtubeId = $youtubeId;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
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


    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }


    public function getAbstract()
    {
        return $this->abstract;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }


    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }


    public function getDetail()
    {
        return $this->detail;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }


    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getModels()
    {
        return $this->models;
    }

    public function setModels($models)
    {
        $this->models = $models;
        return $this;
    }

}

