document.addEventListener("DOMContentLoaded", function() 
{

	let numbers_block = document.querySelector('.numbers');

	numbers_block.addEventListener('click', function(event) 
	{

		let target = event.target;

		if (target.getAttribute('data-type') == 'number')
		{
			let num_id = target.getAttribute('data-id');

			$.ajax({
				type: 'POST',
				data: 'number_id='+ num_id,
				url: '../actions/register_numbers.php',
				success: function(res) 
				{
					alert("Успешно");
					location.href = location.href;           // перезагрузка страницы, для того чтобы исчезали номерки при записи
				},
				error: function() 
				{
					alert("Ошибка");
				}
			});

		}

	});

});