<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
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
     * @ORM\ManyToOne(targetEntity="Season", inversedBy="teams")
     * */
    private $season;
    
    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="teams")
     * */
    private $league;
    
    /**
     * @ORM\OneToOne(targetEntity="Team")
     * */
    private $parentTeam;
    
    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     * @var Player[]
     * */
    private $players = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueDoublesMatch", mappedBy="hostTeam")
     * @var LeagueDoublesMatch[]
     * */
    private $leagueHostDoublesMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueDoublesMatch", mappedBy="guestTeam")
     * @var LeagueDoublesMatch[]
     * */
    private $leagueGuestDoublesMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueTeamsMatch", mappedBy="hostTeam")
     * @var LeagueTeamsMatch[]
     * */
    private $leagueHostTeamsMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueTeamsMatch", mappedBy="guestTeam")
     * @var LeagueTeamsMatch[]
     * */
    private $leagueGuestTeamsMatches = null;

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
     * @return Team
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
     * Set season
     *
     * @param integer $season
     *
     * @return Team
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
     * Set league
     *
     * @param integer $league
     *
     * @return Team
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
     * Set parent team
     *
     * @param string $parentTeam
     *
     * @return Team
     */
    public function setParentTeam($parentTeam)
    {
        $this->parentTeam = $parentTeam;

        return $this;
    }

    /**
     * Get parent team
     *
     * @return string
     */
    public function getParentTeam()
    {
        return $this->parentTeam;
    }
    
    /**
     * Add player
     *
     * @param \AppBundle\Entity\Player $player
     *
     * @return Team
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param \AppBundle\Entity\Player $player
     */
    public function removePlayer(\AppBundle\Entity\Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }
    
    /**
     * Add league host doubles matches
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueHostDoublesMatch
     *
     * @return Team
     */
    public function addLeagueHostDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueHostDoublesMatch)
    {
        $this->leagueHostDoublesMatches[] = $leagueHostDoublesMatch;

        return $this;
    }

    /**
     * Remove league host doubles matches
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueHostDoublesMatch
     */
    public function removeLeagueHostDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueHostDoublesMatch)
    {
        $this->leagueHostDoublesMatches->removeElement($leagueHostDoublesMatch);
    }

    /**
     * Get league host doubles matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueHostDoublesMatches()
    {
        return $this->leagueHostDoublesMatches;
    }
    
    /**
     * Add league guest doubles matches
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueGuestDoublesMatch
     *
     * @return Team
     */
    public function addLeagueGuestDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueGuestDoublesMatch)
    {
        $this->leagueGuestDoublesMatches[] = $leagueGuestDoublesMatch;

        return $this;
    }

    /**
     * Remove league guest doubles matches
     *
     * @param \AppBundle\Entity\LeagueDoublesMatch $leagueGuestDoublesMatch
     */
    public function removeLeagueGuestDoublesMatch(\AppBundle\Entity\LeagueDoublesMatch $leagueGuestDoublesMatch)
    {
        $this->leagueGuestDoublesMatches->removeElement($leagueGuestDoublesMatch);
    }

    /**
     * Get league guest doubles matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueGuestDoublesMatches()
    {
        return $this->leagueGuestDoublesMatches;
    }
    
    /**
     * Add league host teams matches
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueHostTeamsMatch
     *
     * @return Team
     */
    public function addLeagueHostTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueHostTeamsMatch)
    {
        $this->leagueHostTeamsMatches[] = $leagueHostTeamsMatch;

        return $this;
    }

    /**
     * Remove league host teams matches
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueHostTeamsMatch
     */
    public function removeLeagueHostTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueHostTeamsMatch)
    {
        $this->leagueHostTeamsMatches->removeElement($leagueHostTeamsMatch);
    }

    /**
     * Get league host teams matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueHostTeamsMatches()
    {
        return $this->leagueHostTeamsMatches;
    }
    
    /**
     * Add league guest teams matches
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueGuestTeamsMatch
     *
     * @return Team
     */
    public function addLeagueGuestTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueGuestTeamsMatch)
    {
        $this->leagueGuestTeamsMatches[] = $leagueGuestTeamsMatch;

        return $this;
    }

    /**
     * Remove league guest teams matches
     *
     * @param \AppBundle\Entity\LeagueTeamsMatch $leagueGuestTeamsMatch
     */
    public function removeLeagueGuestTeamsMatch(\AppBundle\Entity\LeagueTeamsMatch $leagueGuestTeamsMatch)
    {
        $this->leagueGuestTeamsMatches->removeElement($leagueGuestTeamsMatch);
    }

    /**
     * Get league guest teams matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueGuestTeamsMatches()
    {
        return $this->leagueGuestTeamsMatches;
    }
    
    public function __toString() {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leagueHostDoublesMatches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leagueGuestDoublesMatches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leagueHostTeamsMatches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leagueGuestTeamsMatches = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
