<?php

namespace PhoneBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(name="genre", type="string", length=50)
     */
    protected $Genre;
    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=60)
     */
    protected $Nom;
    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=60)
     */
    protected $Prenom;
    /**
     * @var string
     * @ORM\Column(name="date_de_naissance", type="datetime", length=255)
     */
    protected $DateDeNaissance;
    /**
     * @var string
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    protected $Adresse;
    /**
     * @var string
     * @ORM\Column(name="complement_adresse", type="string", length=255, nullable=true)
     */
    protected $ComplementAdresse;
    /**
     * @var string
     * @ORM\Column(name="confirmation_email", type="string", length=70)
     */
    protected $ConfirmationEmail;
    /**
     * @var string
     * @ORM\Column(name="code_postale", type="integer")
     */
    protected $CodePostale;
    /**
     * @var string
     * @ORM\Column(name="ville", type="string", length=100)
     */
    protected $Ville;
    /**
     * @var string
     * @ORM\Column(name="pays", type="string", length=70)
     */
    protected $Pays;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $facebookID;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $googleID;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->Genre = $genre;
        return $this;
    }
    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->Genre;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->Nom = $nom;
        return $this;
    }
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->Nom;
    }
    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;
        return $this;
    }
    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }
    /**
     * Set dateDeNaissance
     *
     * @param string $dateDeNaissance
     *
     * @return User
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->DateDeNaissance = $dateDeNaissance;
        return $this;
    }
    /**
     * Get dateDeNaissance
     *
     * @return string
     */
    public function getDateDeNaissance()
    {
        return $this->DateDeNaissance;
    }
    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->Adresse = $adresse;
        return $this;
    }
    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }
    /**
     * Set complementAdresse
     *
     * @param string $complementAdresse
     *
     * @return User
     */
    public function setComplementAdresse($complementAdresse)
    {
        $this->ComplementAdresse = $complementAdresse;
        return $this;
    }
    /**
     * Get complementAdresse
     *
     * @return string
     */
    public function getComplementAdresse()
    {
        return $this->ComplementAdresse;
    }
    /**
     * Set confirmationEmail
     *
     * @param string $confirmationEmail
     *
     * @return User
     */
    public function setConfirmationEmail($confirmationEmail)
    {
        $this->ConfirmationEmail = $confirmationEmail;
        return $this;
    }
    /**
     * Get confirmationEmail
     *
     * @return string
     */
    public function getConfirmationEmail()
    {
        return $this->ConfirmationEmail;
    }
    /**
     * Set codePostale
     *
     * @param string $codePostale
     *
     * @return User
     */
    public function setCodePostale($codePostale)
    {
        $this->CodePostale = $codePostale;
        return $this;
    }
    /**
     * Get codePostale
     *
     * @return string
     */
    public function getCodePostale()
    {
        return $this->CodePostale;
    }
    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return User
     */
    public function setVille($ville)
    {
        $this->Ville = $ville;
        return $this;
    }
    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->Ville;
    }
    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return User
     */
    public function setPays($pays)
    {
        $this->Pays = $pays;
        return $this;
    }
    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->Pays;
    }
    /**
     * @return mixed
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * @param mixed $facebookID
     */
    public function setFacebookID($facebookID)
    {
        $this->facebookID = $facebookID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }

    /**
     * @param mixed $googleID
     */
    public function setGoogleID($googleID)
    {
        $this->googleID = $googleID;
        return $this;
    }
}
