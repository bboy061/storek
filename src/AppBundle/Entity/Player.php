<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
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
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     * */
    private $team;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueMatch", mappedBy="hostPlayer")
     * @var LeagueMatch[]
     * */
    private $leagueHostMatches = null;
    
    /**
     * @ORM\OneToMany(targetEntity="LeagueMatch", mappedBy="guestPlayer")
     * @var LeagueMatch[]
     * */
    private $leagueGuestMatches = null;

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
     * Set team
     *
     * @param integer $team
     *
     * @return Player
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }
    
    /**
     * Get team
     *
     * @return int
     */
    public function getTeam()
    {
        return $this->team;
    }
    
    /**
     * Add league host match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueHostMatch
     *
     * @return Player
     */
    public function addLeagueHostMatch(\AppBundle\Entity\LeagueMatch $leagueHostMatch)
    {
        $this->leagueHostMatches[] = $leagueHostMatch;

        return $this;
    }

    /**
     * Remove league host match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueHostMatch
     */
    public function removeLeagueHostMatch(\AppBundle\Entity\LeagueMatch $leagueHostMatch)
    {
        $this->leagueHostMatches->removeElement($leagueHostMatch);
    }

    /**
     * Get league host matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueHostMatchs()
    {
        return $this->leagueHostMatches;
    }
    
    /**
     * Add league guest match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueGuestMatch
     *
     * @return Player
     */
    public function addLeagueGuestMatch(\AppBundle\Entity\LeagueMatch $leagueGuestMatch)
    {
        $this->leagueGuestMatches[] = $leagueGuestMatch;

        return $this;
    }

    /**
     * Remove league guest match
     *
     * @param \AppBundle\Entity\LeagueMatch $leagueGuestMatch
     */
    public function removeLeagueGuestMatch(\AppBundle\Entity\LeagueMatch $leagueGuestMatch)
    {
        $this->leagueGuestMatches->removeElement($leagueGuestMatch);
    }

    /**
     * Get league guest matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueGuestMatchs()
    {
        return $this->leagueGuestMatches;
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
     * Get leagueHostMatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueHostMatches()
    {
        return $this->leagueHostMatches;
    }

    /**
     * Get leagueGuestMatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagueGuestMatches()
    {
        return $this->leagueGuestMatches;
    }
}
