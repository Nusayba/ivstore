<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zone
 *
 * @ORM\Table(name="zone")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\OneToMany(targetEntity="HistoriqueZone", mappedBy="zone")
     */
    private $historiques;
    
    /**
     * @ORM\OneToMany(targetEntity="ActivePeriodeZone", mappedBy="zone")
     */
    private $activePeriodes;


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
     * Constructor
     */
    public function __construct()
    {
        $this->historiques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add historique
     *
     * @param \AppBundle\Entity\HistoriqueZone $historique
     *
     * @return Zone
     */
    public function addHistorique(\AppBundle\Entity\HistoriqueZone $historique)
    {
        $this->historiques[] = $historique;

        return $this;
    }

    /**
     * Remove historique
     *
     * @param \AppBundle\Entity\HistoriqueZone $historique
     */
    public function removeHistorique(\AppBundle\Entity\HistoriqueZone $historique)
    {
        $this->historiques->removeElement($historique);
    }

    /**
     * Get historiques
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistoriques()
    {
        return $this->historiques;
    }

    /**
     * Add activePeriode
     *
     * @param \AppBundle\Entity\ActivePeriodeZone $activePeriode
     *
     * @return Zone
     */
    public function addActivePeriode(\AppBundle\Entity\ActivePeriodeZone $activePeriode)
    {
        $this->activePeriodes[] = $activePeriode;

        return $this;
    }

    /**
     * Remove activePeriode
     *
     * @param \AppBundle\Entity\ActivePeriodeZone $activePeriode
     */
    public function removeActivePeriode(\AppBundle\Entity\ActivePeriodeZone $activePeriode)
    {
        $this->activePeriodes->removeElement($activePeriode);
    }

    /**
     * Get activePeriodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivePeriodes()
    {
        return $this->activePeriodes;
    }
    
    public function __toString() {
        return "nom zone";
    }
}
