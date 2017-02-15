<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeasonRepository")
 */
class Season
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
     * @ORM\Column(name="name", type="string", length=191, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="smallint")
     */
    private $year;
    
    /**
     * @ORM\ManyToOne(targetEntity="YearSeason")
     */
    private $yearSeason;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date")
     */
    private $endDate;
    
    /**
     * @ORM\OneToMany(targetEntity="League", mappedBy="season")
     * @var League[]
     * */
    private $leagues = null;
    
    /**
     * @ORM\OneToMany(targetEntity="Team", mappedBy="season")
     * @var Team[]
     * */
    private $teams = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="SeasonStatus")
     */
    private $status;


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
     * Set name
     *
     * @param string $name
     *
     * @return Season
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Season
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set yearSeason
     *
     * @param integer $yearSeason
     *
     * @return Season
     */
    public function setYearSeason($yearSeason)
    {
        $this->yearSeason = $yearSeason;

        return $this;
    }

    /**
     * Get yearSeason
     *
     * @return int
     */
    public function getYearSeason()
    {
        return $this->yearSeason;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Season
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Season
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Add league
     *
     * @param \AppBundle\Entity\League $league
     *
     * @return Season
     */
    public function addLeague(\AppBundle\Entity\League $league)
    {
        $this->leagues[] = $league;

        return $this;
    }

    /**
     * Remove league
     *
     * @param \AppBundle\Entity\League $league
     */
    public function removeLeague(\AppBundle\Entity\League $league)
    {
        $this->leagues->removeElement($league);
    }

    /**
     * Get leagues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagues()
    {
        return $this->leagues;
    }
    
    /**
     * Add team
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return Season
     */
    public function addTeam(\AppBundle\Entity\Team $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \AppBundle\Entity\Team $team
     */
    public function removeTeam(\AppBundle\Entity\Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }
    
    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Season
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->leagues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->name;
    }
}
