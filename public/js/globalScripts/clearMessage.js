$(document).ready(e => {
    function clearMessage(field) {
        setInterval(() => {
            if(field.text() !== '') {
                field.addClass('hide')
                field.text('')
            }
        }, 4000);
    }
    
    // CLEAR MESSAGE OF PROFILE PAGE
    clearMessage($('#messageError'))
    clearMessage($('#messageSuccess'))

    // CLEAR MESSAGE OF LOGIN PAGE
    clearMessage($('#messageErrorLogin'))
})