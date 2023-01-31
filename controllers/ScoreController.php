<?php

class ScoreController extends AbstractController
{
    public function index(): void
    {
        $scoreRepo = $this->getRepository(ScoreRepository::class);
        $scores = $scoreRepo->findAll();
        
        $this->render('score/index', [
            'scores' => $scores,
        ]);
    }

    public function addScore(): void
    {
        
    }
}
