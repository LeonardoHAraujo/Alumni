$(document).ready(e => {

	$('#pass').keyup(e => {
		if($('#pass').val() != '') {
			$('#changeTypeInputPass > i').removeClass('fa-eye-slash')
			$('#changeTypeInputPass > i').removeClass('cursor-not-eye')
			$('#changeTypeInputPass > i').addClass('fa-eye')
			$('#changeTypeInputPass > i').addClass('cursor-eye')
		} else {
			$('#changeTypeInputPass > i').removeClass('cursor-eye')
			$('#changeTypeInputPass > i').removeClass('fa-eye')
			$('#changeTypeInputPass > i').addClass('fa-eye-slash')
			$('#changeTypeInputPass > i').addClass('cursor-not-eye')
		}
	})

	$('#confirmPass').keyup(e => {
		if($('#confirmPass').val() != '') {
			$('#changeTypeInputCPass > i').removeClass('fa-eye-slash')
			$('#changeTypeInputCPass > i').removeClass('cursor-not-eye')
			$('#changeTypeInputCPass > i').addClass('fa-eye')
			$('#changeTypeInputCPass > i').addClass('cursor-eye')
		} else {
			$('#changeTypeInputCPass > i').removeClass('cursor-eye')
			$('#changeTypeInputCPass > i').removeClass('fa-eye')
			$('#changeTypeInputCPass > i').addClass('fa-eye-slash')
			$('#changeTypeInputCPass > i').addClass('cursor-not-eye')
		}
	})

	$('#changeTypeInputPass').click(e => {
		if($('#changeTypeInputPass > i').hasClass('fa-eye')) {
			if($('#pass').prop('type') == 'password') {
				$('#pass').prop('type', 'text')
			} else {
				$('#pass').prop('type', 'password')
			}
		}
	})

	$('#changeTypeInputCPass').click(e => {
		if($('#changeTypeInputCPass > i').hasClass('fa-eye')) {
			if($('#confirmPass').prop('type') == 'password') {
				$('#confirmPass').prop('type', 'text')
			} else {
				$('#confirmPass').prop('type', 'password')
			}
		}
	})
})

