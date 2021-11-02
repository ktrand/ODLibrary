<?php

use function PHPSTORM_META\type;

include_once('./db/db.php');

class RentalsController{

    public static function rent_book($ids){
        $db = DB::getInstance();
        $st = "insert into rentals(user_id, book_id) 
        values(:user_id, :book_id)";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($ids);
        //echo $ids['book_id'];
        self::change_book_quantity($ids['book_id'], "sub");
    }

    private static function change_book_quantity($id, $str){
        $data['book_id'] = $id;
        $db = DB::getInstance();
        $st = "select quantity from books 
        where id=:book_id";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($data);
        $q = $sqlst->fetchAll();
        //print_r($q);
        $data['quantity'] = $q[0]['quantity'];
        if($str == 'sub')$data['quantity']--;
        else $data['quantity']++;
        $st = "update books 
        set quantity=:quantity
        where id=:book_id ";
        $sqlst = $db ->prepare($st);
        $sqlst->execute($data);
    }
    public static function delete_rent($ids){
         $db = DB::getInstance();
         $st = "delete from rentals where user_id=:user_id ";
         $sqlst = $db ->prepare($st);
         $sqlst->execute($ids);
        self::change_book_quantity($ids['book_id'], '');
    }
}