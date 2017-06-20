
function send(page) {
	var data   = $('#filter').serialize();

	data = data+'&search_button='+$("#search_button").val()+'&page='+page;
	$.ajax({
		type: 'POST',
		url: '../../ajax.php',
		data: data,
		success: function(data) {
			$('#results').html(data);
		}	
	});
}

function ajax_page(page) {
	send(page);
}

function redir_home() { 
    setTimeout(function() {
        window.location.href = 'http://n988692e.bget.ru/';
    }, 100);
}