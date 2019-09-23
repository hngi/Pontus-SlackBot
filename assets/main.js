var logincontainer = document.querySelector('#logincontainer'); 
var registercontainer = document.querySelector('#registercontainer'); 
var registertab = document.querySelector('#register-tab');
var logintab = document.querySelector('#login-tab'); 
document.querySelector('#register-tab').addEventListener('click',function(){
	registeractive();
});

document.querySelector('#login-tab').addEventListener('click',function(){
	loginactive();
});

function loginactive(){
	logincontainer.style.display = "block";
	registercontainer.style.display = "none";
	registertab.classList.remove('active');
	logintab.classList.add('active');
}

function registeractive(){
	logincontainer.style.display = "none";
	registercontainer.style.display = "block";
	registertab.classList.add('active');
	logintab.classList.remove('active');
	
}
