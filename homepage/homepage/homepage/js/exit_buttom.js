var content = document.getElementsByClassName('testecon')[0];
document.getElementsByClassName('btn')[0].addEventListener('click',function(){
	content.style.display = "block";
});
document.getElementsByClassName('x')[0].addEventListener('click',function(){
	content.style.display = "none";
});