<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="league_doubles_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueDoublesMatchRepository")
 */
class LeagueDoublesMatch
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
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="leagueHostDoublesMatches")
     * */
    private $hostTeam;
    
    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="leagueGuestDoublesMatches")
     * */
    private $guestTeam;
    
    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="leagueDoublesMatches")
     * */
    private $league;
    
    /**
     * @ORM\OneToOne(targetEntity="LeagueTeamsMatch", inversedBy="leagueDoublesMatch")
     * */
    private $leagueTeamsMatch;
    
    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="leagueMatch")
     * @var Game[]
     * */
    private $games = null;

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
     * @return LeagueDoublesMatch
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
     * @return LeagueDoublesMatch
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
     * @return LeagueDoublesMatch
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
     * Set league teams match
     *
     * @param integer $leagueTeamsMatch
     *
     * @return LeagueDoublesMatch
     */
    public function setLeagueTeamsMatch($leagueTeamsMatch)
    {
        $this->leagueTeamsMatch = $leagueTeamsMatch;

        return $this;
    }

    /**
     * Get league teams match
     *
     * @return int
     */
    public function getLeagueTeamsMatch()
    {
        return $this->leagueTeamsMatch;
    }
    
    /**
     * Add game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return LeagueDoublesMatch
     */
    public function addGame(\AppBundle\Entity\Game $game)
    {
        $this->games[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param \AppBundle\Entity\Game $game
     */
    public function removeGame(\AppBundle\Entity\Game $game)
    {
        $this->games->removeElement($game);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGames()
    {
        return $this->games;
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
