jQuery(document).ready(function($) {
    $( "#fecha_inicio_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});
    $( "#fecha_fin_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});

    $(document).on('submit', '#busqueda_form', function(event) {
        event.preventDefault();
    });
});

jQuery("#fecha_inicio_dp").on( 'change', function(){
    let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
    let date = new Date(fechaInicio);
    date.setDate(date.getDate() + 30);

    
    var dateString = date.toISOString().split('T')[0]; 
   
    dateString.replaceAll('-', '/');
    
    jQuery('#fecha_fin_dp').datepicker('option', 'maxDate', dateString);
});

function validateSearch()
{
    let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
    let fechaFin = jQuery( "#fecha_fin_dp" ).val();
    let dateInicio = new Date(fechaInicio);
    let dateFin = new Date(fechaFin);
    if (dateFin < dateInicio) {
        jQuery('.alert_box_msg').html('Fecha fin no puede ser menor que fecha inicio');
    }
}