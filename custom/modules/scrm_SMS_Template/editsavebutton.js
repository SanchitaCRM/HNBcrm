function check_custom_data()
{
    var _form = document.getElementById('EditView');
    _form.action.value = 'Save';
    if (check_form('EditView'))
    {
        if (SUGAR.ajaxUI.submitForm(_form) == false) {
            setTimeout(function () {
                window.close();
            }, 500);
        }
        ;
    } else {
        return false;
    }
}

