<?php
 require_once '../model/select.class.php';
 /**
 *  This class select rate users (comment, rate, add books)
 */
 class TopUsers extends Select
 {
 	
 	function __construct(){
 	}

 	public function Top($count, $left_join){
 		 return $top = parent::selectAll("SELECT count($count) AS count, users.user_login AS user FROM users LEFT JOIN $left_join USING (user_id) GROUP BY users.user_login ORDER BY count($count) DESC LIMIT 5");
 	}

 	public function TopComment(){
 		return $top = parent::selectAll("SELECT count(comment_text) AS count, comment_username AS user FROM comment GROUP BY comment_username ORDER BY count(comment_text) DESC LIMIT 5");
 	}
 }

 $top = new TopUsers();
 $top_rate = $top->Top('rate.rate', 'rate');
 $top_books = $top->Top('books.book_name', 'books');
 $top_comment = $top->TopComment();