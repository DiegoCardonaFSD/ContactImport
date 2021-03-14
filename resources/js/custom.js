$(document).ready(function(){

    var initialize = []
    $('.options').each(function(){
        initialize.push("");
    });
    $('.options').on('change', function(){
        $selected = $(this).attr('id');
        $value = $(this).val()
        initialize[$(this).data('id')] = $value;

        $('.options').each(function () {
           $(this).find('option').each(function () {
                if ($.inArray($(this).val(), initialize) >= 0) {
                    $(this).css('display', 'none');
                }else{
                    $(this).css('display', '');
                }
            });
        })

    })

})
