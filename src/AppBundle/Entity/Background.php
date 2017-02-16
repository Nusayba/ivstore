<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Background
 *
 * @ORM\Table(name="background")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BackgroundRepository")
 */
class Background
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
     * @ORM\Column(name="src", type="string", length=255)
     */
    private $src;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_date", type="datetime")
     */
    private $heureDate;


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
     * Set src
     *
     * @param string $src
     *
     * @return Background
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set heureDate
     *
     * @param \DateTime $heureDate
     *
     * @return Background
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
}
