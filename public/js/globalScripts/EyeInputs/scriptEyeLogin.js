$(document).ready(e => {

	$('#userpassword').keyup(e => {
		if($('#userpassword').val() != '') {
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

	$('#changeTypeInputPass').click(e => {
		if($('#changeTypeInputPass > i').hasClass('fa-eye')) {
			if($('#userpassword').prop('type') == 'password') {
				$('#userpassword').prop('type', 'text')
			} else {
				$('#userpassword').prop('type', 'password')
			}
		}
	})
})

