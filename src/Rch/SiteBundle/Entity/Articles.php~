<?php

namespace Rch\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Articles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rch\SiteBundle\Entity\ArticlesRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Articles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
    * @ORM\OneToOne(targetEntity="Rch\SiteBundle\Entity\Image", cascade={"persist", "remove"})
    */
      private $image;

    /**
     * @ORM\ManyToMany(targetEntity="Rch\SiteBundle\Entity\Categorie", cascade={"persist"})
     */
      private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    public function __construct()
      {
        $this->date         = new \Datetime;
        $this->categories   = new \Doctrine\Common\Collections\ArrayCollection();
      }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Articles
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Articles
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Articles
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
    * @param Rch\BlogBundle\Entity\Image $image
    * @return Article
    */
    public function setImage(\Rch\SiteBundle\Entity\Image $image = null)
    {
        $this->image = $image;
        return $this;
    }
 
    /**
     * @return Rch\BlogBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add categories
     *
     * @param \Rch\SiteBundle\Entity\Categorie $categories
     * @return Articles
     */
    public function addCategory(\Rch\SiteBundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Rch\SiteBundle\Entity\Categorie $categories
     */
    public function removeCategory(\Rch\SiteBundle\Entity\Categorie $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
