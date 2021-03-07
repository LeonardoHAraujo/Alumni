$(document).ready(e => {

    // CSRF TOKEN
    let csrf = $('input[type=hidden]')[0].value

    // SHOW MODAL CREATE
    $('#create').click(e => {
        $('#id-title-modal').text('Novo Usuário')
        $('#name').val('')
        $('#email').val('')
        $('#func').prop("checked", false)
        $('#pass').val('')
        $('#confirmPass').val('')

        $('#modal').modal('show')
    })

    // SHOW MODAL EDIT
    $table = $('#datatable')
    $table.on('click', '[btn-edit]', $.proxy(onBtnEditClick))

    function onBtnEditClick(e) {
        $('#id-title-modal').text('Editar Usuário')
        $('#id').val($(e.currentTarget).attr("data-id"))

        let name = $(e.currentTarget).attr("data-name")
        let email = $(e.currentTarget).attr("data-email")
        let func = $(e.currentTarget).attr("data-func")

        $('#name').val(name)
        $('#email').val(email)
        func == 1 ? $('#func').prop("checked", true) : $('#func').prop("checked", false)

        $('#modal').modal('show')
    }

    // DELETE CLIENT
    $table.on('click', '[btn-delete]', $.proxy(onBtnDeleteClick))

    function onBtnDeleteClick(e) {
        let btnDelete = $(e.currentTarget)

        swal({
            title: "Tem certeza?",
            text: "Uma vez deletado, não poderá recuperar o usuário!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {    
              $.ajax({
                type: 'POST',
                url: "/deleteUsers",
                data: {
                    _token : csrf,
                    id : btnDelete.attr("data-id")
                },
                success: function (data) {
                    location.reload()
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus)
                }
            })
            } else {
              swal("Você escolheu cancelar a exclusão!");
            }
          });
    }

    // SUBMIT MODAL
    $('#confirm').click(e => {
        e.preventDefault();

        const id                = $('#id')
        const name              = $('#name')
		const email             = $('#email')
		const func              = $('input:checkbox[name=func]:checked')
		const pass              = $('#pass')
        const confirmPass       = $('#confirmPass')
        
        let alert = $('#alert-message')

		function clearAlert(field) {
			if(field.text() !== '') {
				setTimeout(() => {
					field.removeClass('show')
					field.addClass('hide')
					field.removeClass('alert-primary')
					field.text('')
				}, 4000)
			}
		}

        function clearInputs() {
			name.val('')
			email.val('')
            func.prop("checked", false)
			pass.val('')
			confirmPass.val('')
		}

        if (
			name.val() === '' ||
			email.val() === '' ||
			pass.val() === '' ||
			confirmPass.val() === ''
		) {
			alert.addClass('alert-primary')
			alert.text('Preencha todos os dados corretamente.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearAlert(alert)

		} else if(pass.val() !== confirmPass.val()) {

            alert.addClass('alert-primary')
			alert.text('As senhas não correspondem.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearAlert(alert)

        } else if(id.val() === '') {

            $.ajax({
                type: 'POST',
                url: "/createUsers",
                data: {
                    _token : csrf,
                    name : name.val(),
                    email : email.val(),
                    func : func.val(),
                    pass : pass.val(),
                    confirmPass : confirmPass.val()
                },
                success: function (data) {
                    if(data.status === 200) {
                        alert.addClass('force-success-alert')
                        alert.text(data.message)
                        alert.removeClass('hide')
                        alert.addClass('show')

                        clearInputs()
                        clearAlert(alert)
                        setTimeout(() => {
                            location.reload()
                            $('#modal').modal('hide')
                        }, 3000)

                    } else if(data.status === 400) {
                        alert.addClass('alert-primary')
                        alert.text(data.message)
                        alert.removeClass('hide')
                        alert.addClass('show')

                        clearInputs()
                        clearAlert(alert)
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus)
                }
            })
		} else {

            $.ajax({
                type: 'POST',
                url: "/updateUsers",
                data: {
                    _token : csrf,
                    id : id.val(),
                    name : name.val(),
                    email : email.val(),
                    func : func.val(),
                    pass : pass.val(),
                    confirmPass : confirmPass.val()
                },
                success: function (data) {
                    if(data.status === 200) {
                        alert.addClass('force-success-alert')
                        alert.text(data.message)
                        alert.removeClass('hide')
                        alert.addClass('show')

                        clearInputs()
                        clearAlert(alert)
                        setTimeout(() => {
                            location.reload()
                            $('#modal').modal('hide')
                        }, 3000)

                    } else if(data.status === 400) {
                        alert.addClass('alert-primary')
                        alert.text(data.message)
                        alert.removeClass('hide')
                        alert.addClass('show')

                        clearAlert(alert)
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus)
                }
            })
        }
    })
})