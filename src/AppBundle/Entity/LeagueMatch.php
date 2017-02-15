<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="league_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueMatchRepository")
 */
class LeagueMatch
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
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="leagueHostMatches")
     * */
    private $hostPlayer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="leagueGuestMatches")
     * */
    private $guestPlayer;
    
    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="leagueMatches")
     * */
    private $league;
    
    /**
     * @ORM\ManyToOne(targetEntity="LeagueTeamsMatch", inversedBy="leagueMatches")
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
     * Set host player
     *
     * @param integer $hostPlayer
     *
     * @return LeagueMatch
     */
    public function setHostPlayer($hostPlayer)
    {
        $this->hostPlayer = $hostPlayer;

        return $this;
    }
    
    /**
     * Get host player
     *
     * @return int
     */
    public function getHostPlayer()
    {
        return $this->hostPlayer;
    }
    
    /**
     * Set guest player
     *
     * @param integer $guestPlayer
     *
     * @return LeagueMatch
     */
    public function setGuestPlayer($guestPlayer)
    {
        $this->guestPlayer = $guestPlayer;

        return $this;
    }
    
    /**
     * Get guest player
     *
     * @return int
     */
    public function getGuestPlayer()
    {
        return $this->guestPlayer;
    }
    
    /**
     * Set league
     *
     * @param integer $league
     *
     * @return LeagueMatch
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
     * @return LeagueMatch
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
     * @return LeagueMatch
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
