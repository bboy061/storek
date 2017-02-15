<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
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
     * @var int
     *
     * @ORM\Column(name="host_score", type="integer")
     */
    private $hostScore;
    
    /**
     * @var int
     *
     * @ORM\Column(name="guest_score", type="integer")
     */
    private $guestScore;
    
    /**
     * @ORM\ManyToOne(targetEntity="LeagueMatch", inversedBy="games")
     * */
    private $leagueMatch;

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
     * Set host score
     *
     * @param int $hostScore
     *
     * @return Game
     */
    public function setHostScore($hostScore)
    {
        $this->hostScore = $hostScore;

        return $this;
    }

    /**
     * Get host score
     *
     * @return int
     */
    public function getHostScore()
    {
        return $this->hostScore;
    }
    
    /**
     * Set guest score
     *
     * @param int $guestScore
     *
     * @return Game
     */
    public function setGuestScore($guestScore)
    {
        $this->guestScore = $guestScore;

        return $this;
    }

    /**
     * Get guest score
     *
     * @return int
     */
    public function getGuestScore()
    {
        return $this->guestScore;
    }
    
    /**
     * Set league match
     *
     * @param integer $leagueMatch
     *
     * @return Game
     */
    public function setLeagueMatch($leagueMatch)
    {
        $this->leagueMatch = $leagueMatch;

        return $this;
    }
    
    /**
     * Get league match
     *
     * @return int
     */
    public function getLeagueMatch()
    {
        return $this->leagueMatch;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        
    }
    
    public function __toString() {
        return $this->hostScore . ' - ' . $this->guestScore;
    }
}
