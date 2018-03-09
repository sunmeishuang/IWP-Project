
<?php
/// username password email:bookname total_number words_everyday words_left
	include 'include/util.php';
	
	
	session_start();
	if(isset($_SESSION["User_Name"])){
    	$User_Name=$_SESSION["User_Name"];
  	}else{
      header("Location:signIn.php");
      //$User_Name="xie";
    }
  	//$User_Name="xie";
  if(isset($_POST["book_select"])&&isset($_POST["word_num_select"])){

      $info_path=users_info($User_Name);
      $user_info=file($info_path);
    /// select information
    $book_select=trim(htmlspecialchars($_POST["book_select"]));
    $path=book_path_detail($book_select);
    $total_words_number=count(file($path));
    //print($total_words_number);
    print($book_select);
    $word_num_select=trim(htmlspecialchars($_POST["word_num_select"]));
  
    // modify the information
    $flag=0;
    for($i=3;$i<count($user_info);$i=$i+4){
      if($book_select."\n"==$user_info[$i]){
        $flag=1;
        $user_info[$i+2]=$word_num_select."\n";
        break;
      }
    }

    if($flag==0){
      $add_info=$book_select."\n".$total_words_number."\n".$word_num_select."\n".$total_words_number."\n";
      file_put_contents($info_path,$add_info,FILE_APPEND);
      // copy file
      copy(book_path_detail($book_select),user_book($User_Name,$book_select));
    }else{
      file_put_contents($info_path,$user_info);
    }
    header("Location:recite.php");
  }
  
// this part is bacground for js , return js data
   if(isset($_GET['book'])&& isset($_GET['words'])){
    $book_name=$_GET['book'];
    $words_number=$_GET['words'];

    $info_path=users_info($User_Name);
      $user_info=file($info_path);
      // =0 not in plan 
      $words_left=book_in_plan($User_Name,$book_name);
      $total_number=count(file(book_path_detail($book_name)));
      if($words_left===0){          
        $day_finish=ceil($total_number/$words_number);
      }else{
        $day_finish=ceil($words_left/$words_number);
      }
      echo $total_number.",".$day_finish;
  }
  

function book_in_plan($User_Name,$book_name){
  $info_path=users_info($User_Name);
    $user_info=file($info_path,FILE_IGNORE_NEW_LINES);
    $flag=0;
    for($i=3;$i<count($user_info);$i=$i+4){
      if($book_name==$user_info[$i]){
        $flag=$user_info[$i+3];
        break;
      }
    }
    return $flag;
} 
    
?>