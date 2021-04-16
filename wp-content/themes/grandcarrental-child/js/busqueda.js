jQuery(document).ready(function($) {
    $( "#fecha_inicio_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});
    $( "#fecha_fin_dp" ).datepicker({ minDate: '0', dateFormat: 'yy-mm-dd'});

    jQuery("#fecha_inicio_dp").on( 'change', function(){
        let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
        let date = new Date(fechaInicio);
        date.setDate(date.getDate() + 30);
    
        // console.log(date);
        var dateString = date.toISOString().split('T')[0]; 
        //no funciona
        // console.log(dateString);
        dateString.replaceAll('-', '/');
        // console.log(dateString);
        // jQuery( "#fecha_fin_dp" ).datepicker({ minDate: '1d', dateFormat: 'yy-mm-dd'});
        jQuery('#fecha_fin_dp').datepicker('option', 'maxDate', dateString);
        // jQuery( '#fecha_fin_dp' ).datepicker( 'setDate', dateString );
        // $( "#fecha_fin_dp" ).datepicker({ minDate: '5d', dateFormat: 'yy-mm-dd'});
    });

    // jQuery('input.hasDatepicker').datepicker('option','onClose',function(){
    //     console.log('close');
    //   });
    //   jQuery('input.hasDatepicker').datepicker('option','onSelect',function(){
    //     console.log('select');
    //   });
    // changeDateIni();
});

//  jQuery("#fecha_inicio_dp").on( 'change', function(){
//         let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
//         let date = new Date(fechaInicio);
//         date.setDate(date.getDate() + 30);
    
//         console.log(date);
//         var dateString = date.toISOString().split('T')[0]; 
//         //no funciona
//         // console.log(dateString);
//         dateString.replaceAll('-', '/');
//         console.log(dateString);
//         jQuery( "#fecha_fin_dp" ).datepicker({ minDate: '1d', dateFormat: 'yy-mm-dd'});
//         jQuery( '#fecha_fin_dp' ).datepicker( 'setDate', dateString );
//         // $( "#fecha_fin_dp" ).datepicker({ minDate: '5d', dateFormat: 'yy-mm-dd'});
//     });
// //todo continuar
// function changeDateIni()
// {
//     // console.log('pepe');
//     // let fechaInicio = jQuery( "#fecha_inicio_dp" ).val();
//     // let date = new Date(fechaInicio);
//     // date.setDate(date.getDate() + 30);

//     // console.log(date);
//     // var dateString = date.toISOString().split('T')[0]; 
//     // //no funciona
//     // // console.log(dateString);
//     // dateString.replaceAll('-', '/');
//     // console.log(dateString);
//     // $( "#fecha_fin_dp" ).datepicker({ minDate: '5d', dateFormat: 'yy-mm-dd'});

// }