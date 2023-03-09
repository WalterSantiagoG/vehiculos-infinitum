$(document).ready(function () {

	$('#personas-table tbody').on('click', 'tr', function () {

		var id = $(this).attr('id');

		$(this).each(function () {
			$(this).children("td").each(function (index2) {
				switch (index2) {
					case 0:
						nombres = $(this).text();
						break;
				}
			});
		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var dataString = { id: id };

		$('#vehiculos-table tbody').html('');

		//Envia y recibe por medio de ajax controlador (funcion listarvehiculos)
		$.ajax({
			type: "POST",
			url: "listarvehiculos",
			data: dataString,
			success: function (data) {

				$personveh = data
				console.log($personveh)

				$.each($personveh, function (i, item) {
					//Se llena tabla vehiculos-table
					$('#vehiculos-table').append(
						'<tr id="' + $personveh[i].placa + '"><td>'
						+ $personveh[i].placa +
						'</td><td>'
						+ $personveh[i].marca +
						'</td><td>'
						+ $personveh[i].modelo +
						'</td><td>'
						+ $personveh[i].npuertas +
						'</td><td>'
						+ $personveh[i].tipovh +
						'</td><td>'
						+ $personveh[i].vhactual +
						'</td><td>'
						+ $personveh[i].created_at +
						'</td><td><div class="row"><div class="col-xs-12 col-sm-12 col-lg-12"><a href="personasvehiculos/' + $personveh[i].identificacion + '/' + $personveh[i].placa + '/edit" id="accion" class="btn btn-xs btn-info"><i class="fa fa-car"></i></a></div></div></td> </tr>'
					)
				});
			}
		});
	});

}); //fin