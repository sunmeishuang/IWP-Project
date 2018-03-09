
function init() {
	var book_obj = document.getElementById("book_value"); //定位id
	var words_obj = document.getElementById("words_value");

	//var index = obj.selectedIndex; // 选中索引
	//var text = obj.options[index].text; // 选中文本
	//var value = obj.options[index].value; // 选中值
	book_value_text= book_obj.options[book_obj.selectedIndex].text;
	words_obj_text= words_obj.options[words_obj.selectedIndex].text;
	count_word_day(book_value_text,words_obj_text);
}
function count_word_day(book,word){
	new SimpleAjax('setting_handle.php','GET','book='+book+"&words="+word,on_success,on_failure);
}
function on_success(request) {
	var total_number_obj = document.getElementById("total_number"); 
	var days_finish_obj=document.getElementById("days_finish");
	//total_number_obj.innerHTML = request.responseText;
	var str=request.responseText;
	var strs= new Array(); 
	strs=str.split(","); 
	total_number_obj.value=strs[0];
	days_finish_obj.value=strs[1];
	// total_number_obj.innerHTML=strs[0];
	// days_finish_obj.innerHTML=strs[1];

}
function on_failure(request) {
	alert("an error occured");
}
window.onload = init;