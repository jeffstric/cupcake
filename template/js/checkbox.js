$(document).ready(function(){
    $('input.form_checkbox').click(function(){
        addCheckboxValue()
    });
    function addCheckboxValue(){
        var CBvalue = [];
        $('input.form_checkbox').each(function(){
            if(this.checked)
                CBvalue.push($(this).val());
        });
        $('#checkboxValue').val(CBvalue.join(','));
    }
    function clearCBValue(){
        $('#checkboxValue').val('');
    }
});  