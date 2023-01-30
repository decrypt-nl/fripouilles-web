<?php

class UserController extends AbstractController
{
    public function index(): void
    {
        $userRepo = $this->getRepository(UserRepository::class);
        $users = $userRepo->findAll();
        
        $this->render('user/index', [
            'users' => $users,
        ]);
    }

    public function view(int $id): void
    {
        $userRepo  = $this->getRepository(UserRepository::class);
        $user = $userRepo->findOne($id);

        $this->render('user/view', [
            'user' => $user,
        ]);
    }
}
