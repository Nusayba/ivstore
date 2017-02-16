<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Point
 *
 * @ORM\Table(name="point")
 * uniqueConstraints={@ORM\UniqueConstraint(name="position_point_historique_zone", columns={"position", "point_historique"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PointRepository")
 */
class Point
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
     * @var int
     *
     * @ORM\Column(name="x", type="integer")
     */
    private $x;

    /**
     * @var int
     *
     * @ORM\Column(name="y", type="integer")
     */
    private $y;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;
    
    /**
     * @ORM\ManyToMany(targetEntity="HistoriqueZone", mappedBy="points")
     * * @ORM\JoinTable(name="point_historique")
     */
    private $zones;


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
     * Set x
     *
     * @param integer $x
     *
     * @return Point
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param integer $y
     *
     * @return Point
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Point
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add zone
     *
     * @param \AppBundle\Entity\HistoriqueZone $zone
     *
     * @return Point
     */
    public function addZone(\AppBundle\Entity\HistoriqueZone $zone)
    {
        $this->zones[] = $zone;

        return $this;
    }

    /**
     * Remove zone
     *
     * @param \AppBundle\Entity\HistoriqueZone $zone
     */
    public function removeZone(\AppBundle\Entity\HistoriqueZone $zone)
    {
        $this->zones->removeElement($zone);
    }

    /**
     * Get zones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZones()
    {
        return $this->zones;
    }
}
