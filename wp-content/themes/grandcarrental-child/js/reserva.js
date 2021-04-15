function addExtras()
{
    let precio_extras = 0;
    let texto = '';
    let texto_hidden = '';

    //precio 
    let precio_car = parseFloat(document.getElementById("precio_res").value);
    //dias
    let dias = document.getElementById("dias_res").value; 

    let km = document.getElementById("kilometraje").value;
    if (km != ''){
        if (km == 100) {
            precio_extras += dias * 10;
        }
        if (km == 200) {
            precio_extras += dias * 20;
        }
        if (km == 300) {
            precio_extras += dias * 30;
        }
        texto_hidden = texto_hidden + km + 'km adicionales,';
        texto = '<span class="ti-check ibf_color_orange"></span> <span class="ibf_color_black">' + texto + km+ ' Km. adicionales </span><span class="ibf_color_orange">' + precio_extras + '€</span><br>';
    }
    else {
        precio_extras += 0;
    }

    let adicional = document.getElementById("conductor_adicional");
    if (adicional.checked == true){
        precio_extras += parseFloat(5.00*dias);
        texto_hidden = texto_hidden + 'conductor adicional,';
        texto = texto + '<span class="ti-check ibf_color_orange"></span> <span class="ibf_color_black">Conductor adicional:</span> <span class="ibf_color_orange">' + parseFloat(5.00*dias) + '€</span><br>';
    }

    let menor = document.getElementById("conductor_menor");
    if (menor.checked == true){
        precio_extras += parseFloat(7.00*dias);
        texto_hidden = texto_hidden + 'conductor menor,';
        texto = texto + '<span class="ti-check ibf_color_orange"></span> <span class="ibf_color_black">conductor menor 23 años: </span> <span class="ibf_color_orange">' + parseFloat(7.00*dias) + '€</span><br>';
    }

    let franquicia = document.getElementById("reduccion_franquicia");
    if (franquicia.checked == true){
        precio_extras += parseFloat(6.99*dias);
        texto_hidden = texto_hidden + 'reduccion franquicia,';
        texto = texto + '<span class="ti-check ibf_color_orange"></span> <span class="ibf_color_black">Reducción franquicia: </span> <span class="ibf_color_orange">' + parseFloat(6.99*dias) + '€</span><br>';
    }

    let precio_total = precio_car + precio_extras;

    if(precio_extras != 0){
        document.getElementById("mostrar_titulo_extras").innerHTML = '<h4 class="ibf_mb_10"> Extras contratados </h4>';
    } else {
        document.getElementById("mostrar_titulo_extras").innerHTML = '';
    }

    document.getElementById("texto_extras_res").value = texto_hidden;
    document.getElementById("mostrar_texto_extras").innerHTML = '<span class="ibf_font_18">' + texto + '</span>';
    document.getElementById("precio_extra_res").value = precio_extras.toFixed(2);
    document.getElementById("precio_final_con_extras_res").value = precio_total.toFixed(2);
    document.getElementById("single_car_price").innerHTML = '<span class="single_car_price">'+precio_total.toFixed(2)+'</span><span class="single_car_currency">€</span>';
    document.getElementById("single_car_price_scroll").innerHTML = '<span class="single_car_price">'+precio_total.toFixed(2)+'</span><span class="single_car_currency">€</span>';
}