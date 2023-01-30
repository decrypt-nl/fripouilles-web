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
        if(empty($_POST)){
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode(0);
            exit();
        }

        try {
            // TO DO : Plus de sécu
            $username = htmlspecialchars($_POST['username']);
            $score    = intval($_POST['score']);
            $time     = intval($_POST['time']);
        
            $userRepo = new UserRepository();
            $userRepo->insertUser([
                'username' => $username,
                'score'    => $score,
                'time'     => $time,
            ]);
        
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode(1);
            exit();
        
        } catch (\Throwable $th) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode($th->getMessage());
            exit();
        }
    }
}
