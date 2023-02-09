<?php

class RegistrationRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->table = 'user';
        $this->connect();
    }

    public function insertUser(array $data): bool
    {
        $sql = 'INSERT INTO '.$this->table.'(username, mdp) VALUES(:username, :mdp)';

        try{
            /** @var PDOStatement */
            $q = $this->pdo->prepare($sql);
            $q->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $q->bindParam(':mdp', $data['mdp'], PDO::PARAM_STR);

            return $q->execute();

        }catch(\Throwable $th){
            echo $th->getMessage();
        }
    }
}
