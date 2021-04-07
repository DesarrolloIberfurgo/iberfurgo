function addExtras()
{
    let precio_extras = 0;
    let texto = '';

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
        texto = texto + km+'km adicionales,';
    }
    else {
        precio_extras += 0;
    }

    let adicional = document.getElementById("conductor_adicional");
    if (adicional.checked == true){
        precio_extras += parseFloat(6.99*dias);
        texto = texto + ' conductor adicional,';
    }

    let menor = document.getElementById("conductor_menor");
    if (menor.checked == true){
        precio_extras += parseFloat(6.99*dias);
        texto = texto + ' conductor menor,';
    }

    let franquicia = document.getElementById("reduccion_franquicia");
    if (franquicia.checked == true){
        precio_extras += parseFloat(6.99*dias);
        texto = texto + ' reducción franquicia,';
    }

    let precio_total = precio_car + precio_extras;

    document.getElementById("texto_extras_res").value = texto;
    document.getElementById("precio_extra_res").value = precio_extras;
    document.getElementById("precio_final_con_extras_res").value = precio_total.toFixed(2);
    document.getElementById("single_car_price").innerHTML = '<span class="single_car_price">'+precio_total.toFixed(2)+'</span><span class="single_car_currency ifb_color_black">€</span>';
    document.getElementById("single_car_price_scroll").innerHTML = '<span class="single_car_price">'+precio_total.toFixed(2)+'</span><span class="single_car_currency ifb_color_black">€</span>';
}