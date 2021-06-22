jQuery(document).ready(function($) {
    $( "#fecha_inicio_dp" ).datepicker({ minDate: '0', dateFormat: 'dd/mm/yy'});
    $( "#fecha_fin_dp" ).datepicker({ minDate: '0', dateFormat: 'dd/mm/yy'});

    jQuery("#fecha_inicio_dp").on( 'change', function(){
        let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();

        let date = new Date(changeEnglishFormat(fechaInicio));
        date.setDate(date.getDate() + 30);
    
        
        var dateString = date.toISOString().split('T')[0]; 
    var dateString = date.toISOString().split('T')[0]; 
        var dateString = date.toISOString().split('T')[0]; 
       
        // dateString.replaceAll('-', '/');
        dateString = changeSpanishFormat(dateString);

        jQuery('#fecha_fin_dp').datepicker('option', 'maxDate', dateString);
    });
});


function changeEnglishFormat(date)
{
    var arr = date.split('/');
    return arr[2]+'/'+arr[1]+'/'+arr[0];
}

function changeSpanishFormat(date)
{
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [day, month, year].join('/');
}


function validateSearch(event)
{
    event.preventDefault();
    jQuery('.alert_box.error').addClass('hide');
    let delegacionId = jQuery('#brand').val();
    let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
    let fechaFin = jQuery( "#fecha_fin_dp" ).val();
    let horaInicio = jQuery( "#hora_inicio_dp" ).val();
    let horaFin = jQuery( "#hora_fin_dp" ).val();
    let dateInicio = new Date(changeEnglishFormat(fechaInicio));
    let dateFin = new Date(changeEnglishFormat(fechaFin));
    let dt = new Date();
    dt.getHours; 
    
    if (isNaN(dateInicio.getTime())) {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('La fecha de inicio no es válida.');
        return;
    }

    if (isNaN(dateFin.getTime())) {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('La fecha de fin no es válida.');
        return;
    }

    if (delegacionId == '' || fechaInicio == '' || fechaFin == '' || horaInicio == '' || horaFin == '') {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('Por favor rellena todos los campos.');
        return;
    }
    if (dateFin < dateInicio) {
        jQuery('.alert_box.error').removeClass('hide');
        jQuery('.alert_box_msg').html('La fecha de fin no puede ser menor que la fecha de inicio');
        return;
    }
    if (fechaInicio == fechaFin) {
        if (horaInicio == horaFin) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('La hora de inicio no puede ser la misma que la hora de fin.');
            return;
        }
        hora1 = horaInicio.split(':');
        hora2 = horaFin.split(':');
        
        if (parseInt(hora1[0]) > parseInt(hora2[0])) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('La hora de inicio no puede ser mayor que hora de fin.');
            return;
        }

        if (parseInt(hora2[0]) - parseInt(hora1[0]) == 1 || parseInt(hora2[0]) - parseInt(hora1[0]) == 0) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('La hora de fin tiene que ser mínimo 2 horas mayor que la hora de inicio.');
            return;
        }

        if ((parseInt(hora2[0]) - parseInt(hora1[0])) == 2) {
            if ((hora1[1] != 0 && hora2[1] == 0)) {
                jQuery('.alert_box.error').removeClass('hide');
                jQuery('.alert_box_msg').html('La hora de fin tiene que ser 2 horas mayor que la hora de inicio.');
                return;
            }
        }
        
        let day = dt.getDate();
        let month = dt.getMonth() + 1;
        let year = dt.getFullYear();
        let hoy = '';
        if(month < 10){
            hoy = day+'/0'+month+'/'+year;
        } else {
            hoy = day+'/'+month+'/'+year;
        }

        if (dt.getHours() > parseInt(hora1[0]) && fechaInicio == hoy) {
            jQuery('.alert_box.error').removeClass('hide');
            jQuery('.alert_box_msg').html('La hora de inicio tiene que ser mayor a la hora actual.');
            return;
        }
    }
    

    jQuery('#busqueda_form').submit();
}