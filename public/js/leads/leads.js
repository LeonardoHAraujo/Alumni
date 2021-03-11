$(document).ready(e => {

    // CSRF TOKEN
    let csrf = $('input[type=hidden]')[0].value

    // SHOW MODAL CREATE
    $('#create').click(e => {
        $('#id-title-modal').text('Novo Lead')
        $('#name').val('')
        $('#lastName').val('')
        $('#company').val('')
        $('#linkedin').val('')
        $('#formation').val('')
        $('#contactPoint').val('')
        $('#dataFirstContact').val('')
        $('#cell').val('')
        $('#telephone').val('')
        $('#email').val('')
        $('#emailSecondary').val('')
        $('#city').val('')
        $('#state').val('')
        $('#country').val('')

        $('#modal').modal('show')
    })

    // SHOW MODAL EDIT
    $table = $('#datatable-buttons')
    $table.on('click', '[btn-edit]', $.proxy(onBtnEditClick))

    function onBtnEditClick(e) {
        $('#id-title-modal').text('Editar Usuário')
        $('#id').val($(e.currentTarget).attr("data-id"))

        let name = $(e.currentTarget).attr("data-name")
        let lastName = $(e.currentTarget).attr("data-lastName")
        let company = $(e.currentTarget).attr("data-company")
        let linkedin = $(e.currentTarget).attr("data-linkedin")
        let formation = $(e.currentTarget).attr("data-formation")
        let contactPoint = $(e.currentTarget).attr("data-contactPoint")
        let dateFirstContact = $(e.currentTarget).attr("data-dateFirstContact")
        let cell = $(e.currentTarget).attr("data-cell")
        let telephone = $(e.currentTarget).attr("data-telephone")
        let email = $(e.currentTarget).attr("data-email")
        let emailSecondary = $(e.currentTarget).attr("data-emailSecondary")
        let city = $(e.currentTarget).attr("data-city")
        let state = $(e.currentTarget).attr("data-state")
        let country = $(e.currentTarget).attr("data-country")

        $('#name').val(name)
        $('#lastName').val(lastName)
        $('#company').val(company)
        $('#linkedin').val(linkedin)
        $('#formation').val(formation)
        $('#contactPoint').val(contactPoint)
        $('#dataFirstContact').val(dateFirstContact)
        $('#cell').val(cell)
        $('#telephone').val(telephone)
        $('#email').val(email)
        $('#emailSecondary').val(emailSecondary)
        $('#city').val(city)
        $('#state').val(state)
        $('#country').val(country)

        $('#modal').modal('show')
    }

    // SHOW MODAL VIEW
    $table.on('click', '[btn-view]', $.proxy(onBtnViewClick))

    function onBtnViewClick(e) {
        console.log('viu...')
    }

    // DELETE USER
    $table.on('click', '[btn-delete]', $.proxy(onBtnDeleteClick))

    function onBtnDeleteClick(e) {
        let btnDelete = $(e.currentTarget)

        swal({
            title: "Tem certeza?",
            text: "Uma vez deletado, este lead não poderá ser recuperado!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) { 
                console.log('deletou...')   
              /*$.ajax({
                    type: 'POST',
                    url: "",
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
                })*/
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
        const lastName          = $('#lastName')
        const company           = $('#company')
        const linkedin          = $('#linkedin')
        const formation         = $('#formation')
        const contactPoint      = $('#contactPoint')
        const dataFirstContact  = $('#dataFirstContact')
        const cell              = $('#cell')
        const telephone         = $('#telephone')
		const email             = $('#email')
		const emailSecondary    = $('#emailSecondary')
		const city              = $('#city')
        const state             = $('#state')
        const country           = $('#country')
        
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
			lastName.val('')
			company.val('')
			linkedin.val('')
			formation.val('')
			contactPoint.val('')
			dataFirstContact.val('')
			cell.val('')
			telephone.val('')
			email.val('')
			emailSecondary.val('')
			city.val('')
			state.val('')
			country.val('')
		}

        if (
			name.val() === '' ||
			lastName.val() === '' ||
			company.val() === '' ||
			linkedin.val() === '' ||
			formation.val() === '' ||
			contactPoint.val() === '' ||
			dataFirstContact.val() === '' ||
			cell.val() === '' ||
			telephone.val() === '' ||
            email.val() === '' ||
			emailSecondary.val() === '' ||
			city.val() === '' ||
			state.val() === '' ||
			country.val() === ''
		) {
			alert.addClass('alert-primary')
			alert.text('Preencha todos os dados corretamente.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearAlert(alert)

		} else {

            if(id.val() === '') {
                console.log('criou...')
                /*$.ajax({
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
                })*/
            } else {
                console.log('editou...')
                /*$.ajax({
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
                })*/
            }
        }
    })
})