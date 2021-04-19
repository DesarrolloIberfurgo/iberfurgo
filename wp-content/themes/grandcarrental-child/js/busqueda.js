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
    //falta validar la hora

    jQuery('#busqueda_form').submit();
}