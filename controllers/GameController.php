<?php

class GameController extends AbstractController 
{
    public function index(): void
    {
        $this->render('game/index');
    }
}