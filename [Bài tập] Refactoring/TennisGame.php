<?php

class TennisGame
{
    const ZERO = 0;
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const SCORE_OF_PLAYER1 = 1;
    const SCORE_OF_PLAYER2 = 2;
    public string $scoreString = '';

    public function getScore($player1Name, $player2Name, $player1Score, $player2Score)
    {

        $equalScore = $player1Score == $player2Score;
        if ($equalScore) {
            $this->equalScore($player1Score);
        } else {
            $moreThan40Scores = $player1Score >= self::FOUR || $player2Score >= self::FOUR;
            if ($moreThan40Scores) {
                $this->moreThan40Scores($player1Score, $player2Score);
            } else {
                $this->lessThan40Scores($player1Score, $player2Score);
            }
        }
    }

    public function __toString(): string
    {
        return $this->scoreString;
    }

    private function lessThan40Scores($player1Score, $player2Score): void
    {
        $playerScore = 0;
        for ($i = self::SCORE_OF_PLAYER1; $i <= self::SCORE_OF_PLAYER2; $i++) {
            if ($i == self::SCORE_OF_PLAYER1) $playerScore = $player1Score;
            else {
                $this->scoreString .= "-";
                $playerScore = $player2Score;
            }
            switch ($playerScore) {
                case self::ZERO:
                    $this->scoreString .= "Love";
                    break;
                case self::ONE:
                    $this->scoreString .= "Fifteen";
                    break;
                case self::TWO:
                    $this->scoreString .= "Thirty";
                    break;
                case self::THREE:
                    $this->scoreString .= "Forty";
                    break;
            }
        }
    }

    private function equalScore($player1Score): void
    {
        switch ($player1Score) {
            case self::ZERO:
                $this->scoreString = "Love-All";
                break;
            case self::ONE:
                $this->scoreString = "Fifteen-All";
                break;
            case self::TWO:
                $this->scoreString = "Thirty-All";
                break;
            case self::THREE:
                $this->scoreString = "Forty-All";
                break;
            default:
                $this->scoreString = "Deuce";
                break;

        }
    }


    private function moreThan40Scores($player1Score, $player2Score): void
    {
        $result = $player1Score - $player2Score;
        if ($result == 1) $this->scoreString = "Advantage player1";
        else if ($result == -1) $this->scoreString = "Advantage player2";
        else if ($result >= 2) $this->scoreString = "Win for player1";
        else $this->scoreString = "Win for player2";
    }
}