$(document).ready(e => {
    $table = $('#datatable')
    let csrf = $('input[type=hidden]')[0].value

    // REACTIVATE USER
    $table.on('click', '[btn-reactivate]', $.proxy(onBtnReactivateClick))

    function onBtnReactivateClick(e) {
        let btnReactivate = $(e.currentTarget)

        swal({
            title: "Tem certeza?",
            text: "Uma vez reativado, o usuário poderá acessar o sistema!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willReactivate) => {
            if (willReactivate) {    
              $.ajax({
                type: 'POST',
                url: "/reactivateUsers",
                data: {
                    _token : csrf,
                    id : btnReactivate.attr("data-id")
                },
                success: function (data) {
                    location.reload()
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus)
                }
            })
            } else {
              swal("Você escolheu cancelar a reativação!");
            }
          });
    }
})