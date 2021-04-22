jQuery(document).ready(function($) {
    $( "#fecha_inicio_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});
    $( "#fecha_fin_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});
});

jQuery("#fecha_inicio_dp").on( 'change', function(){
    let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
    let date = new Date(fechaInicio);
    date.setDate(date.getDate() + 30);

    
    var dateString = date.toISOString().split('T')[0]; 
   
    dateString.replaceAll('-', '/');
    
    jQuery('#fecha_fin_dp').datepicker('option', 'maxDate', dateString);
});



function validateSearch(event)
{
    event.preventDefault();
    jQuery('.alert_box.error').addClass('hide');
    let delegacionId = jQuery('#brand').val();
    let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
    let fechaFin = jQuery( "#fecha_fin_dp" ).val();
    let horaInicio = jQuery( "#hora_inicio_dp" ).val();
    let horaFin = jQuery( "#hora_fin_dp" ).val();
    let dateInicio = new Date(fechaInicio);
    let dateFin = new Date(fechaFin);

    if (delegacionId == '' || fechaInicio == '' || fechaFin == '' || horaInicio == '' || horaFin == '') {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('Por favor rellena todos los campos.');
        return;
    }
    if (dateFin < dateInicio) {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('Fecha fin no puede ser menor que fecha inicio');
        return;
    }
    if (fechaInicio == fechaFin) {
        if (horaInicio == horaFin) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('Hora inicio no puede ser la misma que hora fin.');
            return;
        }
        hora1 = horaInicio.split(':');
        hora2 = horaFin.split(':');
        
        if (parseInt(hora1[0]) > parseInt(hora2[0])) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('Hora inicio no puede ser mayor que hora fin.');
            return;
        }

        if (parseInt(hora2[0]) - parseInt(hora1[0]) == 1 || parseInt(hora2[0]) - parseInt(hora1[0]) == 0) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('Hora fin tiene que ser mínimo 2 horas mayor que hora inicio.');
            return;
        }

        if ((parseInt(hora2[0]) - parseInt(hora1[0])) == 2) {
            if ((hora1[1] != 0 && hora2[1] == 0)) {
                jQuery('.alert_box.error').removeClass('hide');
                jQuery('.alert_box_msg').html('Hora fin tiene que ser 2 horas mayor que hora inicio.');
                return;
            }
        }
    }
    

    jQuery('#busqueda_form').submit();
}