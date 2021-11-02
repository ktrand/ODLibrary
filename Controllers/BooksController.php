<?php
include_once('./db/db.php');

class BooksController{
    
    public static function selectBooks(){
        $db = DB::getInstance();
        $st= "select * from books";
        $sqlst= $db ->prepare($st);
        $sqlst->execute();  
        $rows=$sqlst->fetchAll(); 
        //print_r($rows);
        foreach($rows as $row){
            echo $row['name'] . ' | ' . $row['author'] .' | ' . $row['num_of_books'] . '<br/>'; 
        }
    }
    
    public static function insertbook($book){
        $db = DB::getInstance();
        $st = "insert into books(name, author, quantity) 
        values(:name, :author, :quantity)";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($book);
        $row = $sqlst->fetch();
    }

    public static function deletebook($id){
        $db = DB::getInstance();
        $st = 'delete from books where id=' . $id;
        $sqlst = $db->prepare($st);
        $sqlst->execute();

    }

    public static function updatebook($book){
        $db = DB::getInstance();
        $st = "update books 
        set name = :name, author= :author, quantity = :quantity 
        where id = :id";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($book);
    }
}