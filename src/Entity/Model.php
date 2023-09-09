<?php

namespace hamza\poo\Entity;

use hamza\poo\Kernel\DataBase;

use PDO;
class Model  {

    public static $className;

    private static function getEntityName()
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab) - 1];
        return $entity;
    }

    private static function getClassName()
    {
        return static::class;
    }

    protected static function Execute($sql,  array $params = null)
    {
        $db = DataBase::getInstance();

        if (empty($params)) {
            $pdostatement = $db->query($sql);
            return $pdostatement;
        } else {
            $pdostatement = $db->prepare($sql);
            $pdostatement->execute($params);
            return $pdostatement;
        }
    }
    


    public static function getAll()
{
    
    $sql = "SELECT * FROM " . self::getEntityName();
    return self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
}

    public static function getProjectTask(int $idProjet)
    {
            $sql = "select * from " . self::getEntityName() . " where id_project=$idProjet" ;
            $result = self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
            return $result;
    }
    public static function getProjectUser(int $id_user)
{
    
    $sql = "SELECT * FROM " . self::getEntityName() . " where id_user=$id_user";
    // var_dump($sql);
    return self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
}

    public static function getById(int $id)
    {
        $sql = "select * from " . self::getEntityName() . " where id=$id";
        $result =  self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
        //Comme fetchAll [0] on récupère le premier élément sinon c'est $result
        return $result[0];
    }

    public static function getByEmail(string $email)
    {
        $sql = "select * from ". self::getEntityName() . " where email= ?";
        $result = self::Execute($sql, [$email])->fetchAll(PDO::FETCH_CLASS, self::getClassName());

        return $result[0];
    }
   
    public static function create($data)
    {

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO " . self::getEntityName() . " ($columns) VALUES ($placeholders)";
        var_dump($sql);
        return self::Execute($sql, $data);
    }




    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id=$id";
        return DataBase::getInstance()->exec($sql);
    }  



    
    
    public static function update(int $id, array $data)
    {
        $db = Database::getInstance();
        $sql="UPDATE ". self::getEntityName() ." SET title = :title, password = :password, email = :email WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
       
    
        return $stmt->execute();
    }
    
    
    
        
    }
        
    


