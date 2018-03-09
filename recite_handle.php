<meta charset="utf-8">
<?php

	include 'include/util.php';
	session_start();
	if(isset($_SESSION["User_Name"])){
    	$User_Name=$_SESSION["User_Name"];
  	}else{
      header("Location:signIn.php");
    }
  	//$User_Name="xie";
    $user_date_path=users_date($User_Name);
  	$user_info_path=users_info($User_Name);
  	$user_info=file($user_info_path,FILE_IGNORE_NEW_LINES);

if(count($user_info)<=3){ // not selected book,goto select book
      header("Location:setting.php");
  }else{
    $book_name=$user_info[3];
    $total_number_words=$user_info[4];
    $per_day_words=$user_info[5];
    $words_left=$user_info[6];
  
    if(isset($_GET['number'])&&isset($_GET['remember'])){
      //$word = $_GET['word'];  //isset($_GET['word'])&&
      $number=$_GET['number'];
      $remember=$_GET['remember'];

    }else{  
      $number=0;
      $remember="yes";
    }
    //"data/user/$name/$book/$book.txt"
    $user_book_path=user_book($User_Name,$book_name);
    for($i=0;$i<=3;$i++){
      if(remmember_data_exists($User_Name,$book_name,$i)===false){
        file_put_contents(to_remmember_path($User_Name,$book_name,$i),'');
      }
    }
    if(remmember_data_exists($User_Name,$book_name,"temp")===false){
      file_put_contents(to_remmember_path($User_Name,$book_name,"temp"),'');
    }
    // FILE from 0txt
    // set temp file , to learn file

  if($number==0){
    
    $word_array=file(to_remmember_path($User_Name,$book_name,"temp"),FILE_IGNORE_NEW_LINES);
    if(count($word_array)<$per_day_words/2){
      set_to_learn_file($User_Name,$book_name,0,$per_day_words);
      set_to_learn_file($User_Name,$book_name,1,$per_day_words);
      set_to_learn_file($User_Name,$book_name,2,$per_day_words);
    }
    // number of recited words and not recited words  to js display
    $today_words=count($word_array);
    //$receited_words_number=receited_words($User_Name,$book_name);
    echo first_txt_word($User_Name,$book_name,"temp")."~0~$today_words";
  }elseif($number>0&&count(file(to_remmember_path($User_Name,$book_name,"temp")))>0){
    // word to remember,send to front
    $word_array=file(to_remmember_path($User_Name,$book_name,"temp"),FILE_IGNORE_NEW_LINES);
    $word_line=explode("|", array_shift($word_array));

    if($remember==="no"){ 
      transfer_word($User_Name,$book_name,0,$word_line[0]);
    }
    if($remember==="yes"){
      for($i=0;$i<3;$i++){      
        if($word_line[1]==$i) transfer_word($User_Name,$book_name,$i+1,$word_line[0]);
      }
    }
    if($remember==="easy"){
      transfer_word($User_Name,$book_name,3,$word_line[0]);  // 3 is finshed txt
    }
    // rebuild the temp file
    array_to_txt($User_Name,$book_name,"temp",$word_array);
    // output information
    //$receited_words_number=receited_words($User_Name,$book_name);
    //$word_left=count(file(to_remmember_path($User_Name,$book_name,"temp"),FILE_IGNORE_NEW_LINES));
    //$recited_number=$per_day_words-$word_left;
    echo first_txt_word($User_Name,$book_name,"temp");
           
    }else{
      $learned=count(file(to_remmember_path($User_Name,$book_name,3)));
      if($total_number_words===$learned){
        echo "This book is all recited!";
        
      }else{
        $todaydate=date("d");
        file_put_contents($user_date_path, $todaydate);
        echo "Today's task is finished!";
      }   
  }
  
  $learned=count(file(to_remmember_path($User_Name,$book_name,3)));
  $learned_one_time=count(file(to_remmember_path($User_Name,$book_name,1)));
  $not_learned=$total_number_words-$learned;
  $not_recite=count(file(to_remmember_path($User_Name,$book_name,"")));
  /// 6 is row of the txt
  array_to_info($user_info_path,6,$not_learned);
}
// info.txt  replace the row of txt using $con
function array_to_info($file_path,$row,$con){
  $content = file_get_contents($file_path);
  $con_array = explode("\n", $content);    
  $con_array[$row]=$con;
  $cons_new= implode("\n", $con_array); //组合回字符串
  file_put_contents($file_path,$cons_new);
}

// transfer word from temp to txt
function transfer_word($User_Name,$book_name,$to,$word){
  file_put_contents(to_remmember_path($User_Name,$book_name,$to),$word."\n",FILE_APPEND);
}

//function to set to learn file
// $num from 0 1 2 to set learn file
function set_to_learn_file($User_Name,$book_name,$num,$per_day_words){
    
    $content=file(to_remmember_path($User_Name,$book_name,$num),FILE_IGNORE_NEW_LINES);
    if(count($content)<limit($per_day_words,$num)){      
      for($i=0;$i<count($content);$i++){
        $content[$i]=$content[$i]."|$num\n"; 
        file_put_contents(to_remmember_path($User_Name,$book_name,"temp"), $content[$i],FILE_APPEND); 
      }
      //if content is not enough, delete the content of the txt 
      empty_txt($User_Name,$book_name,$num);
      // file word from not remember file
      $not_rem_cons=file(to_remmember_path($User_Name,$book_name,""),FILE_IGNORE_NEW_LINES);
      $not_rem_cons_j=0;
      foreach ($not_rem_cons as $not_rem ) {
        if($not_rem_cons_j>=limit($per_day_words,$num)-count($content)) break;
        $not_rem=$not_rem."|0\n";     
        file_put_contents(to_remmember_path($User_Name,$book_name,"temp"), $not_rem,FILE_APPEND); 
        $not_rem_cons_j++;
        array_shift($not_rem_cons); 
      }
    
      array_to_txt($User_Name,$book_name,"",$not_rem_cons);
      
    }else{
      for($i=0;$i<limit($per_day_words,$num);$i++){
        file_put_contents(to_remmember_path($User_Name,$book_name,"temp"), array_shift($content)."|$num\n",FILE_APPEND); 
      }
      array_to_txt($User_Name,$book_name,$num,$content);  
    }

}

//empty the txt (delete the content of the txt)
function empty_txt($User_Name,$book_name,$num){
  file_put_contents(to_remmember_path($User_Name,$book_name,$num),"");
}
//array write to txt
function array_to_txt($User_Name,$book_name,$num,$array){
  empty_txt($User_Name,$book_name,$num);
  //file_put_contents(to_remmember_path($User_Name,$book_name,$num),"");
  foreach($array as $array_value){
    $array_value=$array_value."\n";
    file_put_contents(to_remmember_path($User_Name,$book_name,$num),$array_value,FILE_APPEND);
  }
}

// file is empty or not
function txt_is_empty($txt){
    $str=file($txt);
    if(empty($str)){
      return true;
    }else return false;
}



// file is existed or not (user recited book)
  function remmember_data_exists($User_Name,$book_name,$file_name){
    $file=to_remmember_path($User_Name,$book_name,$file_name);
    if(file_exists($file)){
      return true;
    }else return false;
  }
  // remember book's path
  function to_remmember_path($User_Name,$book_name,$file_name){
    return "data/user/$User_Name/$book_name/$book_name$file_name.txt";
  }
  // the number of word need to be learned from different txt
  function limit($per_day_words,$i){
    if($i==0){return $per_day_words-ceil($per_day_words/2);}
    if($i==1){return ceil($per_day_words/2)-ceil(ceil($per_day_words/2)/3);}
    if($i==2){return ceil(ceil($per_day_words/2)/3);}
  }
// return the first word of the txt
  function first_txt_word($User_Name,$book_name,$file){
    if(txt_is_empty(to_remmember_path($User_Name,$book_name,$file))){
        
      return "Today's task is finished!";
    }else{
      $word_array=file(to_remmember_path($User_Name,$book_name,$file),FILE_IGNORE_NEW_LINES);
      $word_line=explode("|", $word_array[0]);
      
      $word_line_new = preg_replace("/\s+/",'~',$word_line[0]);
      return $word_line_new;
      //$word_line_new=explode("/\s+/",$word_line[0]);
      //return $word_line_new[0].",".$word_line[1];
    } 
  }

  
  
 // return recited words number to js display (how many times )
   function receited_words($User_Name,$book_name){
    if(txt_is_empty(to_remmember_path($User_Name,$book_name,"temp"))){
        return "~0~0";
    }else{
     
      $user_info_path=users_info($User_Name);
      $user_info=file($user_info_path,FILE_IGNORE_NEW_LINES);
      $today_words=$user_info[5];

      $word_left=count(file(to_remmember_path($User_Name,$book_name,"temp"),FILE_IGNORE_NEW_LINES));
      $recited_number=$today_words-$word_left;

      return "~$recited_number~$word_left";
    }
   }
?>