<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * League
 *
 * @ORM\Table(name="league")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueRepository")
 */
class League
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
     * @var int
     *
     * @ORM\Column(name="rank", type="smallint")
     */
    private $rank;

    /**
     * @ORM\ManyToOne(targetEntity="Season", inversedBy="leagues")
     * */
    private $season;
    
    /**
     * @ORM\OneToMany(targetEntity="Team", mappedBy="league")
     * @var Team[]
     * */
    private $teams = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueGroup", mappedBy="league")
     * @var LeagueGroup[]
     * */
    private $leagueGroups = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueRound", mappedBy="league")
     * @var LeagueRound[]
     * */
    private $leagueRounds = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueMatch", mappedBy="league")
     * @var LeagueMatch[]
     * */
    private $leagueMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueDoublesMatch", mappedBy="league")
     * @var LeagueDoublesMatch[]
     * */
    private $leagueDoublesMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueTeamsMatch", mappedBy="league")
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
     * Set rank
     *
     * @param integer $rank
     *
     * @return League
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set season
     *
     * @param integer $season
     *
     * @return League
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }
    
    /**
     * Get season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }
    
    /**
     * Add team
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return League
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
     * Add league group
     *
     * @param \AppBundle\Entity\LeagueGroup $leagueGroup
     *
     * @return League
     */
    public function addLeagueGroup(\AppBundle\Entity\LeagueGroup $leagueGroup)
    {
        $this->leagueGroups[] = $leagueGroup;

        return $this;
    }

    /**
     * Remove league group
     *
     * @param \AppBundle\Entity\LeagueGroup $leagueGroup
     */
    public function removeLeagueGroup(\AppBundle\Entity\LeagueGroup $leagueGroup)
    {
        $this->leagueGroups->removeElement($leagueGroup);
    }

    /**
     * Get league groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueGroups()
    {
        return $this->leagueGroups;
    }
    
    /**
     * Add league round
     *
     * @param \AppBundle\Entity\LeagueRound $leagueRound
     *
     * @return League
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
     * Add league match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueMatch
     *
     * @return League
     */
    public function addLeagueMatch(\AppBundle\Entity\LeagueMatch $leagueMatch)
    {
        $this->leagueMatches[] = $leagueMatch;

        return $this;
    }

    /**
     * Remove league match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueMatch
     */
    public function removeLeagueMatch(\AppBundle\Entity\LeagueMatch $leagueMatch)
    {
        $this->leagueMatches->removeElement($leagueMatch);
    }

    /**
     * Get league matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueMatches()
    {
        return $this->leagueMatches;
    }
    
    /**
     * Add league doubles match
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueDoublesMatch
     *
     * @return League
     */
    public function addLeagueDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueDoublesMatch)
    {
        $this->leagueDoublesMatches[] = $leagueDoublesMatch;

        return $this;
    }

    /**
     * Remove league doubles match
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueDoublesMatch
     */
    public function removeLeagueDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueDoublesMatch)
    {
        $this->leagueDoublesMatches->removeElement($leagueDoublesMatch);
    }

    /**
     * Get league doubles matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueDoublesMatches()
    {
        return $this->leagueDoublesMatches;
    }
    
    /**
     * Add league teams match
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueTeamsMatch
     *
     * @return League
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
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->name . ' ' . $this->season->__toString();
    }
}
