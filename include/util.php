
<?php
function users_date($name){
	return "data/user/$name/date.txt";
}
// data path
function data_path(){
	return "data/user";
}

function users_path(){
	return "data/user/*";
}
function users_info($name){
	return "data/user/$name/info.txt";
}

function _isFindDir($dir) {
    $ls = scandir(dirname(__FILE__));
    foreach ($ls as $val) {
        if ($val == $dir) return TRUE;
    }
    return FALSE;
}
function user_book($name,$book){
	$dir="data/user/$name/$book";
	if (_isFindDir($dir) === FALSE) {
        @mkdir($dir);
    }
	return "data/user/$name/$book/$book.txt";
}
function user_books_path($name,$book){
	return "data/user/$name/$book/*";
}
// book information 
function book_path(){
	return "data/books/*.txt";
}
// book name find the book
function book_path_detail($name){
	return "data/books/$name.txt";
}

function find_user($User_Name){
	$flag=0;
	$path=users_path();
 	$users_path=glob($path);
 	foreach ($users_path as $users_path) {
		$user=basename($users_path);
		if($user===$User_Name){
			$flag=1;	
			break;
		}
	}
	if($flag===1){
		return true;
	}else{
		return false;
	}
}



?>