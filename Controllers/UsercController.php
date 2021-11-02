<?php
include_once('./db/db.php');

class UserController{
    
    public static function select_users(){
        $db = DB::getInstance();
        $st= "select * from users";
        $sqlst= $db ->prepare($st);
        $sqlst->execute();  
        $rows=$sqlst->fetchAll(); 
    }
    
    public static function insert_user($user){
        $db = DB::getInstance();
        $st = "insert into users(name, email) 
        values(:name, :email)";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($user);
    }

    public static function delete_user($id){
        $db = DB::getInstance();
        $st = 'delete from users where id=' . $id;
        $sqlst = $db->prepare($st);
        $sqlst->execute();
    }

    public static function update_user($user){
        $db = DB::getInstance();
        $st = "update users 
        set name = :name, email = :email 
        where id = :id";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($user);
    }
}