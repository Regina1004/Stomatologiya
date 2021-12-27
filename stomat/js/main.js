document.addEventListener("DOMContentLoaded", function() {

	let 
		overlay = document.querySelector('.overlay'),     //всплывающее окно 
		formLog = document.querySelector('.popup .log'),
		formReg = document.querySelector('.popup .reg'),
		openPopup = document.querySelector('.login-block'),
		closePopup = document.querySelector('.popup__close'),


		numberItems = document.querySelectorAll('.number__value');



	if(openPopup != undefined)                                       /*если он нашел, то мы выполняем*/

	{               
		openPopup.addEventListener('click', function(event){         /*event- то на что мы кликнули*/

			event.preventDefault();                                  /*сбрасываем стандартные его действия*/

			let attr = event.target.getAttribute('data-auth');

			if( attr == "login" ) 
			{
				formLog.style.display = "block";
				formReg.style.display = "none";
			}
			else if ( attr == "register" )
			{
				formLog.style.display = "none";
				formReg.style.display = "block";
			}
			else return;                                             /*нажали на пустоту*/

			overlay.classList.add('overlay_active');
		});
	}

	closePopup.addEventListener('click', function(){

		overlay.classList.remove('overlay_active');

	});






function startTests()
{
	describe("Проверка на существование", function() 
	{
	  it("переменная overlay объявлена и ей присвоено значение", function() 
	  {
	    assert(overlay);
	  });
	});



	describe("Все ли номерки имеют атрибут data-id", function() 
	{
	  numberItems.forEach(function(elem, index)
	  {
	  	it(`Номерок ${index} имеет атрибут data-id`, function() 
	  	{
	  	  assert(elem.hasAttribute('data-id'));
	  	});
	  });
	});



	let loginBlock = document.querySelector('.login-block');

	describe("Авторизован ли пользователь?", function() 
	{
	  it("Авторизация", function() 
	  {
	    assert(!loginBlock);
	  });
	});


	let profileNumbers = document.querySelectorAll('.day');

	describe("Есть ли записи?", function() 
	{
	  it("Записи есть", function() 
	  {
	    assert(profileNumbers.length);
	  });
	});

	mocha.run();
}

startTests();









});