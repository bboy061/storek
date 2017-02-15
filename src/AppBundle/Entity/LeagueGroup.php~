<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="league_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueGroupRepository")
 */
class LeagueGroup
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
     * @ORM\ManyToOne(targetEntity="League", inversedBy="leagueGroups")
     * */
    private $league;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueRound", mappedBy="leagueGroup")
     * @var LeagueRound[]
     * */
    private $leagueRounds = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueTeamsMatch", mappedBy="leagueGroup")
     * @var LeagueTeamsMatch[]
     * */
    private $leagueTeamsMatches = null;

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
     * @return League
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
     * @return LeagueGroup
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
     * Add league round
     *
     * @param \AppBundle\Entity\LeagueRound $leagueRound
     *
     * @return LeagueGroup
     */
    public function addLeagueRound(\AppBundle\Entity\LeagueRound $leagueRound)
    {
        $this->leagueRounds[] = $leagueRound;

        return $this;
    }

    /**
     * Remove league round
     *
     * @param \AppBundle\Entity\LeagueRound $leagueRound
     */
    public function removeLeagueRound(\AppBundle\Entity\LeagueRound $leagueRound)
    {
        $this->leagueRounds->removeElement($leagueRound);
    }

    /**
     * Get league rounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueRounds()
    {
        return $this->leagueRounds;
    }
    
    /**
     * Add league teams match
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueTeamsMatch
     *
     * @return LeagueGroup
     */
    public function addLeagueTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueTeamsMatch)
    {
        $this->leagueTeamsMatches[] = $leagueTeamsMatch;

        return $this;
    }

    /**
     * Remove league teams match
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueTeamsMatch
     */
    public function removeLeagueTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueTeamsMatch)
    {
        $this->leagueTeamsMatches->removeElement($leagueTeamsMatch);
    }

    /**
     * Get league teams matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueTeamsMatches()
    {
        return $this->leagueTeamsMatches;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        
    }
    
    public function __toString() {
        return $this->name;
    }
}
