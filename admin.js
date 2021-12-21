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


//Убрать все
btnUncheckAllNumbers.addEventListener('click', function(event)
{
for (let i=0; i<timeNumbers.length; i++)
{
timeNumbers[i].removeAttribute('checked');
}
});


//Создать
submit.addEventListener('click', function(event)
{
let
doctors = doctorsSelect.querySelectorAll('option'),
doctorId = 0,
date,
dateFrom,
dateTo,
numderItems = $('.time'), /* == document.querySelectorAll('time')*/
numbers = [];

doctors.forEach(function(elem, index) /*foreach (var elem in doctors)*/
{
if (elem.value == doctorsSelect.value) /*doctorsSelect.value - тот доктор, которого выбрали на сайте, elem.value - все доктора в списке*/
{
doctorId = elem.getAttribute("data-id");
return;
}
});

if(isDateRange)
{
dateFrom = $(".date__range[data-range='from']").val();
dateTo = $(".date__range[data-range='to']").val();

if (dateFrom == "" || dateTo == "") return;

date =
{
from: dateFrom,
to: dateTo
}
}

else
{
date = $(".date__one").val();
}

if (date == "" || date == undefined || date == null) return;

numderItems.each(function() /*foreach (var this in numbersItems)*/
{
if($(this).prop("checked")) /*this-каждый*/
numbers.push($(this).val());
});

if (numbers.length == 0) return;
});
