<?php

class UserRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->table = 'user';
        $this->connect();
    }

    public function insertUser(array $data)
    {
        var_dump($data);
        die();
    }
}
