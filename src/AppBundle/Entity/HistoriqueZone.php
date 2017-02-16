<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueZone
 *
 * @ORM\Table(name="historique_zone", uniqueConstraints={@ORM\UniqueConstraint(name="historique_zones_name_unique",columns={"nom"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HistoriqueZoneRepository")
 */
class HistoriqueZone
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="couleur", type="integer")
     */
    private $couleur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_date", type="datetime")
     */
    private $heureDate;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255)
     */
    private $action;
    
    /**
     * @ORM\ManyToOne(targetEntity="Zone", inversedBy="historiques")
     * @ORM\JoinColumn(name="zone_id", referencedColumnName="id")
     */
    private $zone;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="actionZones")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;
    
    /**
     * @ORM\ManyToMany(targetEntity="Point", inversedBy="zones")
     */
    private $points;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return HistoriqueZone
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set couleur
     *
     * @param integer $couleur
     *
     * @return HistoriqueZone
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return int
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set heureDate
     *
     * @param \DateTime $heureDate
     *
     * @return HistoriqueZone
     */
    public function setHeureDate($heureDate)
    {
        $this->heureDate = $heureDate;

        return $this;
    }

    /**
     * Get heureDate
     *
     * @return \DateTime
     */
    public function getHeureDate()
    {
        return $this->heureDate;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return HistoriqueZone
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set zone
     *
     * @param \AppBundle\Entity\Zone $zone
     *
     * @return HistoriqueZone
     */
    public function setZone(\AppBundle\Entity\Zone $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \AppBundle\Entity\Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return HistoriqueZone
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->points = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add point
     *
     * @param \AppBundle\Entity\Point $point
     *
     * @return HistoriqueZone
     */
    public function addPoint(\AppBundle\Entity\Point $point)
    {
        $this->points[] = $point;

        return $this;
    }

    /**
     * Remove point
     *
     * @param \AppBundle\Entity\Point $point
     */
    public function removePoint(\AppBundle\Entity\Point $point)
    {
        $this->points->removeElement($point);
    }

    /**
     * Get points
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoints()
    {
        return $this->points;
    }
}
