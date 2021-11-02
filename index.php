<?php

include('./Routes/Route.php');
include('./Controllers/BooksController.php');
include('./Controllers/UsercController.php');
include('./Controllers/RentalsController.php');


Route::add('/', function() {
    return BooksController::selectBooks();
}, 'get');

Route::add('/book', function() {
    $book = [
        'name' => $_POST['name'],
        'author' => $_POST['author'],
        'num_of_books' => $_POST['num_of_books']
    ];
    echo $_POST['id'];
    return BooksController::insertbook($book);
},'post');

Route::add('/delete_book', function() {
    $id = $_POST['id'];
    return BooksController::deletebook($id);
},'post');

Route::add('/update_book', function() {
    $book = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'author' => $_POST['author'],
        'num_of_books' => $_POST['num_of_books']
    ];
    echo $_POST['id'];
    return BooksController::updatebook($book);
},'post');

Route::add('/users', function() {
    return UserController::select_users();
}, 'get');

Route::add('/insert_user', function() {
    $user = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ];
    echo $_POST['id'];
    return UserController::insert_user($user);
},'post');

Route::add('/delete_user', function() {
    $id = $_POST['id'];
    return UserController::delete_user($id);
},'post');

Route::add('/update_user', function() {
    $user = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ];
    echo $_POST['id'];
    return UserController::update_user($user);
},'post');

Route::add('/update_user', function() {
    $user = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ];
    echo $_POST['id'];
    return UserController::update_user($user);
},'post');

Route::add('/rent_book', function() {
    $ids = [
        'user_id' => $_POST['user_id'],
        'book_id' => $_POST['book_id'],
    ];
    //echo $_POST['user_id'];
    return RentalsController::rent_book($ids);
},'post');

Route::add('/delete_rent', function() {
    $ids = [
        'user_id' => $_POST['user_id'],
        'book_id' => $_POST['book_id'],
    ];
    echo $_POST['user_id'];
    return RentalsController::delete_rent($ids);
},'post');

Route::run();