<?php 

class ConnexionRepository extends AbstractRepository 
{
    public function __construct() 
    {
        $this->table = 'user';
        $this->connect();
    }

    public function getUserByUsername(array $data): bool
    {
        $sql = 'SELECT * FROM'.$this->table.'WHERE username = :username';

        try{
            /** @var PDOStatement */
            $q = $this->pdo->prepare($sql);
            $q->bindParam(':username', $data['username'], PDO::PARAM_STR);

            return $q->execute();

        }catch(\Throwable $th){
            echo $th->getMessage();
        }
    }
    
}