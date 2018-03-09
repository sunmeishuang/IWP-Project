var number=0;
var remember="yes";  // yes(remember)  no(forget) easy(so easy)
var clicked=0;   // 1(remember)  2(forget) 3(so easy)
var rem=0;
var left=0;

		
function init() {
	
	var obj2=document.getElementsByClassName("cd-item-wrapper")[0].getElementsByClassName("words"); 
	var action_set=document.getElementsByClassName("cd-filter")[0];
	var action=action_set.getElementsByTagName("a");
	word_back(number,remember);	
	countDown(); // time counter
}
function word_back(number,remember){
	new SimpleAjax('recite_handle.php','GET','number='+number+"&remember="+remember,on_success,on_failure);
}
function on_success(request) {
	var word_obj=document.getElementsByClassName("cd-item-wrapper")[0].getElementsByClassName("words"); 
	var str=request.responseText;
	var strs= new Array(); 
	strs=str.split('~'); 
	word_obj[0].innerHTML=strs[0];
	word_obj[1].innerHTML=strs[0]+" ";
	if(number==0){
		//if(strs.length>=4){
		for(var i=1;i<strs.length-2;i++)
		word_obj[1].innerHTML=word_obj[1].innerHTML+strs[i];
		
		//var process=document.getElementsByClassName("progress-bar"); 
		// process[0].innerHTML="Remembered: "+strs[strs.length-2];
		// process[1].innerHTML="Not remember: "+strs[strs.length-1];	
		rem=parseInt(strs[strs.length-2]);
		left=parseInt(strs[strs.length-1]);
		pencentage(rem,left);	
		//}		
	}else{
		for(var i=1;i<strs.length;i++)
		word_obj[1].innerHTML=word_obj[1].innerHTML+strs[i];
	}
	
}
function on_failure(request) {
	alert("an error occured");
}
function pencentage(rem,left){
	var process=document.getElementsByClassName("progress-bar"); 
		process[0].innerHTML="Remembered: "+rem;
		process[1].innerHTML="Not remember: "+left;

	var	rem_percent=Math.round(rem/(rem+left)*100);
	var	left_percent=Math.round(left/(rem+left)*100);
		process[0].style.width=rem_percent+"%";
		process[1].style.width=left_percent+"%";	
}
function Next(){
	if(clicked!==0){
		number++;
		if(clicked===1){		
			word_back(number,remember);
		}
		if(clicked===2){		
			word_back(number,remember);
		}
		if(clicked===3){		
			word_back(number,remember);
		}
		clicked=0;
		countDownNew(); // time counter
	}
}
function Remember(){
	remember="yes";
	if(clicked==0){
		clicked=1;
		rem++;
		left--;
		pencentage(rem,left);	
	}
	
}
function Forget(){
	remember="no";
	if(clicked==0){
		clicked=2;
	rem++;
	left--;
	pencentage(rem,left);
	}
	
}
function So_easy(){
	remember="easy";
	
	if(clicked==0){
		clicked=3;
		rem++;
		left--;
		pencentage(rem,left);
	}
}


function getByClassName(className){    
   	if(document.getElementByClassName){    
    return document.getElementByClassName(className) //FF下因为有此方法，所以可以直接获取到；    
    }    
    var nodes=document.getElementsByTagName("*");//获取页面里所有元素，因为他会匹配全页面元素，所以性能上有缺陷，但是可以约束他的搜索范围；    
    var arr=[];//用来保存符合的className；    
    for(var i=0;i<nodes.length;i++){    
    	if(hasClass(nodes[i],className)) arr.push(nodes[i]);    
    }    
    return arr;    
}   

function hasClass(node,className){    
    var cNames=node.className.split(/\s+/);//根据空格来分割node里的元素；    
    for(var i=0;i<cNames.length;i++){    
    	if(cNames[i]==className) return true;    
    }    
    return false;    
}   

window.onload = init;