<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="league_round")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueRoundRepository")
 */
class LeagueRound
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
     * @ORM\Column(name="name", type="string", length=191)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="leagueRounds")
     * */
    private $league;
    
    /**
     * @ORM\ManyToOne(targetEntity="LeagueGroup", inversedBy="leagueRounds")
     * */
    private $leagueGroup;
    
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
     * @return LeagueRound
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
     * Set league
     *
     * @param integer $league
     *
     * @return LeagueRound
     */
    public function setLeague($league)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return int
     */
    public function getLeague()
    {
        return $this->league;
    }
    
    /**
     * Set league group
     *
     * @param integer $leagueGroup
     *
     * @return LeagueRound
     */
    public function setLeagueGroup($leagueGroup)
    {
        $this->leagueGroup = $leagueGroup;

        return $this;
    }

    /**
     * Get league group
     *
     * @return int
     */
    public function getLeagueGroup()
    {
        return $this->leagueGroup;
    }
    
    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return LeagueRound
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
     * @return LeagueRound
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
    
    public function __toString() {
        return $this->name;
    }
}
