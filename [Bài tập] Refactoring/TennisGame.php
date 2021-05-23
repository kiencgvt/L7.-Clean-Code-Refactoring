<?php

class TennisGame
{
    const zero = 0;
    const one = 1;
    const two = 2;
    const three = 3;
    const four = 4;
    const player1 = 1;
    const player2 = 2;
    public string $scoreString = '';

    public function getScore($player1Name, $player2Name, $player1Score, $player2Score)
    {

        if ($player1Score == $player2Score) {
            $this->equalScore($player1Score);
        } else if ($player1Score >= self::four || $player2Score >= self::four) {
            $this->moreThan40Scores($player1Score, $player2Score);
        } else {
            $this->lessThan40Scores($player1Score, $player2Score);
        }
    }

    public function __toString(): string
    {
        return $this->scoreString;
    }

    public function lessThan40Scores($player1Score, $player2Score): void
    {
        $playerScore = 0;
        for ($i = self::player1; $i <= self::player2; $i++) {
            if ($i == self::player1) $playerScore = $player1Score;
            else {
                $this->scoreString .= "-";
                $playerScore = $player2Score;
            }
            switch ($playerScore) {
                case self::zero:
                    $this->scoreString .= "Love";
                    break;
                case self::one:
                    $this->scoreString .= "Fifteen";
                    break;
                case self::two:
                    $this->scoreString .= "Thirty";
                    break;
                case self::three:
                    $this->scoreString .= "Forty";
                    break;
            }
        }
    }

    public function equalScore($player1Score): void
    {
        switch ($player1Score) {
            case self::zero:
                $this->scoreString = "Love-All";
                break;
            case self::one:
                $this->scoreString = "Fifteen-All";
                break;
            case self::two:
                $this->scoreString = "Thirty-All";
                break;
            case self::three:
                $this->scoreString = "Forty-All";
                break;
            default:
                $this->scoreString = "Deuce";
                break;

        }
    }


    public function moreThan40Scores($player1Score, $player2Score): void
    {
        $result = $player1Score - $player2Score;
        if ($result == 1) $this->scoreString = "Advantage player1";
        else if ($result == -1) $this->scoreString = "Advantage player2";
        else if ($result >= 2) $this->scoreString = "Win for player1";
        else $this->scoreString = "Win for player2";
    }
}