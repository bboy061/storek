<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="league_teams_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueTeamsMatchRepository")
 */
class LeagueTeamsMatch
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
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="leagueHostTeamsMatches")
     * */
    private $hostTeam;
    
    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="leagueGuestTeamsMatches")
     * */
    private $guestTeam;
    
    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="leagueTeamsMatches")
     * */
    private $league;
    
    /**
     * @ORM\ManyToOne(targetEntity="LeagueGroup", inversedBy="leagueTeamsMatches")
     * */
    private $leagueGroup;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueMatch", mappedBy="leagueTeamsMatch")
     * @var LeagueMatch[]
     * */
    private $leagueMatches = null;
    
    /**
     * @ORM\OneToOne(targetEntity="LeagueDoublesMatch", mappedBy="leagueTeamsMatch")
     * */
    private $leagueDoublesMatch = null;

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
     * Set host team
     *
     * @param integer $hostTeam
     *
     * @return LeagueTeamsMatch
     */
    public function setHostTeam($hostTeam)
    {
        $this->hostTeam = $hostTeam;

        return $this;
    }

    /**
     * Get host team
     *
     * @return int
     */
    public function getHostTeam()
    {
        return $this->hostTeam;
    }
    
    /**
     * Set guest team
     *
     * @param integer $guestTeam
     *
     * @return LeagueTeamsMatch
     */
    public function setGuestTeam($guestTeam)
    {
        $this->guestTeam = $guestTeam;

        return $this;
    }

    /**
     * Get guest team
     *
     * @return int
     */
    public function getGuestTeam()
    {
        return $this->guestTeam;
    }
    
    /**
     * Set league
     *
     * @param integer $league
     *
     * @return LeagueTeamsMatch
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
     * @return LeagueTeamsMatch
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
     * Add league match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueMatch
     *
     * @return LeagueTeamsMatch
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
    public function getLeagueMatchs()
    {
        return $this->leagueMatches;
    }
    
    /**
     * Set league doubles match
     *
     * @param integer $leagueDoublesMatch
     *
     * @return LeagueTeamsMatch
     */
    public function setLeagueDoublesMatch($leagueDoublesMatch)
    {
        $this->leagueDoublesMatch = $leagueDoublesMatch;

        return $this;
    }

    /**
     * Get league doubles match
     *
     * @return int
     */
    public function getLeagueDoublesMatch()
    {
        return $this->leagueDoublesMatch;
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

    /**
     * Get leagueMatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueMatches()
    {
        return $this->leagueMatches;
    }
}
