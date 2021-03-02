<?php

function getProvincias() 
{
    return getApi(URL_API . 'maestro-provincia');
}

function getDelegaciones()
{
    return getApi(URL_API . 'maestro-delegacion');
}

function getTiposVehiculo($dataApi)
{
    return getDataApi(URL_API . 'flota-tipo', $dataApi);
}