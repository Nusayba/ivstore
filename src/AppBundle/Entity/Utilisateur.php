<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=255)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;
    
    /**
     * @ORM\OneToMany(targetEntity="HistoriqueZone", mappedBy="utilisateur")
     */
    private $actionZones;


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
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Utilisateur
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return Utilisateur
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actionZones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add actionZone
     *
     * @param \AppBundle\Entity\HistoriqueZone $actionZone
     *
     * @return Utilisateur
     */
    public function addActionZone(\AppBundle\Entity\HistoriqueZone $actionZone)
    {
        $this->actionZones[] = $actionZone;

        return $this;
    }

    /**
     * Remove actionZone
     *
     * @param \AppBundle\Entity\HistoriqueZone $actionZone
     */
    public function removeActionZone(\AppBundle\Entity\HistoriqueZone $actionZone)
    {
        $this->actionZones->removeElement($actionZone);
    }

    /**
     * Get actionZones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActionZones()
    {
        return $this->actionZones;
    }
    
    function __toString() {
        return $this->pseudo;
    }
}
