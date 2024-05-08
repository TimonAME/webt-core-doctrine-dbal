<?php
namespace entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'game_rounds')]
class GameRound
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $player1;

    #[ORM\Column(type: 'string')]
    private string $player2;

    #[ORM\Column(type: 'date')]
    private \DateTime $date;

    #[ORM\Column(type: 'time')]
    private \DateTime $time;

    /**
     * @param $player1
     * @param $player2
     * @param $date
     * @param $time
     */
    public function __construct($player1, $player2, $date, $time)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->date = $date;
        $this->time = $time;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPlayer1(): string
    {
        return $this->player1;
    }

    public function setPlayer1(string $player1): void
    {
        $this->player1 = $player1;
    }

    public function getPlayer2(): string
    {
        return $this->player2;
    }

    public function setPlayer2(string $player2): void
    {
        $this->player2 = $player2;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }
}