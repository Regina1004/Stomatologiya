// DOMContentLoaded - ждет пока вся html страница прогрузится
document.addEventListener("DOMContentLoaded", function()
{
let
doctorsSelect = document.querySelector('.doctors'),
dateRadio = document.querySelector('.date-radio'),
dateOne = document.querySelector('.date-block-one'),
dateRange = document.querySelector('.date-block-range'),
btnCheckAllNumbers = document.querySelector('.btn__all[data-action="check"]'),
btnUncheckAllNumbers = document.querySelector('.btn__all[data-action="uncheck"]'),
timeNumbers = document.querySelectorAll('.time'),
submit = document.querySelector('.submit'), /*Кнопка созздать*/
isDateRange = false;


// addEventListener - остлеживание клика
dateRadio.addEventListener('click', function(event)
{
// event.target - то, на что мы кликаем
//console.log(event.target);
// F12 - просмотреть код, открыть консоль

if (event.target.getAttribute('type') == 'radio')
{
if(event.target.value == 'one')
{
isDateRange = false;
dateOne.style.display = 'block';
dateRange.style.display = 'none';
}
else
{
isDateRange = true;
dateOne.style.display = 'none';
dateRange.style.display = 'block';
}
}
});


//Выбрать все
btnCheckAllNumbers.addEventListener('click', function(event)
{
for (let i=0; i<timeNumbers.length; i++)
{
timeNumbers[i].setAttribute('checked', 'checked');
}
});
});

