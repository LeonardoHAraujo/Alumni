$(document).ready(e => {

    // CSRF TOKEN
    let csrf = $('input[type=hidden]')[0].value

    // SHOW MODAL CREATE
    $('#create').click(e => {
        $('#id-title-modal').text('Criar Lead')
        $('#name').val('')
        $('#lastName').val('')
        $('#company').val('')
        $('#linkedin').val('')
        $('#formation').val('')
        $('#contactPoint').val('')
        $('#dateFirstContact').val('')
        $('#cell').val('')
        $('#telephone').val('')
        $('#email').val('')
        $('#emailSecondary').val('')
        $('#street').val('')
        $('#number').val('')
        $('#city').val('')
        $('#state').val('')
        $('#country').val('')

        $('#modal').modal('show')
    })

    // SHOW MODAL EDIT
    $table = $('#datatable-buttons')
    $table.on('click', '[btn-edit]', $.proxy(onBtnEditClick))

    function onBtnEditClick(e) {
        $('#id-title-modal').text('Editar Lead')
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
        let street = $(e.currentTarget).attr("data-street")
        let number = $(e.currentTarget).attr("data-number")
        let city = $(e.currentTarget).attr("data-city")
        let state = $(e.currentTarget).attr("data-state")
        let country = $(e.currentTarget).attr("data-country")

        $('#name').val(name)
        $('#lastName').val(lastName)
        $('#company').val(company)
        $('#linkedin').val(linkedin)
        $('#formation').val(formation)
        $('#contactPoint').val(contactPoint)
        $('#dateFirstContact').val(dateFirstContact)
        $('#cell').val(cell)
        $('#telephone').val(telephone)
        $('#email').val(email)
        $('#emailSecondary').val(emailSecondary)
        $('#street').val(street)
        $('#number').val(number)
        $('#city').val(city)
        $('#state').val(state)
        $('#country').val(country)

        $('#modal').modal('show')
    }

    // DISABLED INPUTS VIEW
    $('[data-disabled]').prop("disabled", true)

    // SHOW MODAL VIEW
    $table.on('click', '[btn-view]', $.proxy(onBtnViewClick))

    function onBtnViewClick(e) {
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
        let street = $(e.currentTarget).attr("data-street")
        let number = $(e.currentTarget).attr("data-number")
        let city = $(e.currentTarget).attr("data-city")
        let state = $(e.currentTarget).attr("data-state")
        let country = $(e.currentTarget).attr("data-country")

        $('#nameLead').text(name)

        $('#nameView').val(name)
        $('#lastNameView').val(lastName)
        $('#companyView').val(company)
        $('#linkedinView').val(linkedin)
        $('#formationView').val(formation)
        $('#contactPointView').val(contactPoint)
        $('#dateFirstContactView').val(dateFirstContact)
        $('#cellView').val(cell)
        $('#telephoneView').val(telephone)
        $('#emailView').val(email)
        $('#emailSecondaryView').val(emailSecondary)
        $('#streetView').val(street)
        $('#numberView').val(number)
        $('#cityView').val(city)
        $('#stateView').val(state)
        $('#countryView').val(country)

        $('#modal-view').modal('show')
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
              $.ajax({
                    type: 'POST',
                    url: "/deleteLeads",
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
        const lastName          = $('#lastName')
        const company           = $('#company')
        const linkedin          = $('#linkedin')
        const formation         = $('#formation')
        const contactPoint      = $('#contactPoint')
        const dateFirstContact  = $('#dateFirstContact')
        const cell              = $('#cell')
        const telephone         = $('#telephone')
		const email             = $('#email')
		const emailSecondary    = $('#emailSecondary')
        const street            = $('#street')
        const number            = $('#number')
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
			dateFirstContact.val('')
			cell.val('')
			telephone.val('')
			email.val('')
			emailSecondary.val('')
			street.val('')
			number.val('')
			city.val('')
			state.val('')
			country.val('')
		}

        if (
			name.val() === '' ||
			lastName.val() === '' ||
			cell.val() === '' ||
            email.val() === ''
		) {
			alert.addClass('alert-primary')
			alert.text('Os campos: Nome, Sobrenome, Celular e E-mail são obrigatórios.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearAlert(alert)

		} else {

            if(id.val() === '') {

                $.ajax({
                    type: 'POST',
                    url: "/createLeads",
                    data: {
                        _token : csrf,
                        name : name.val(),
                        lastName : lastName.val(),
                        company : company.val(),
                        linkedin : linkedin.val(),
                        formation : formation.val(),
                        contactPoint : contactPoint.val(),
                        dateFirstContact : dateFirstContact.val(),
                        cell : cell.val(),
                        telephone : telephone.val(),
                        email : email.val(),
                        emailSecondary : emailSecondary.val(),
                        street : street.val(),
                        number : number.val(),
                        city : city.val(),
                        state : state.val(),
                        country : country.val()
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
                    url: "/updateLeads",
                    data: {
                        _token : csrf,
                        id : id.val(),
                        name : name.val(),
                        lastName : lastName.val(),
                        company : company.val(),
                        linkedin : linkedin.val(),
                        formation : formation.val(),
                        contactPoint : contactPoint.val(),
                        dateFirstContact : dateFirstContact.val(),
                        cell : cell.val(),
                        telephone : telephone.val(),
                        email : email.val(),
                        emailSecondary : emailSecondary.val(),
                        street : street.val(),
                        number : number.val(),
                        city : city.val(),
                        state : state.val(),
                        country : country.val()
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
        }
    })
})