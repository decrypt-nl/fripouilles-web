<?php

class ScoreRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->table = 'score';
        $this->connect();
    }
}
