<?php
Route::get('/bienes-servicios', function () {
    try {
        $opts = array(
            'http' => array(
                'user_agent' => 'PHPSoapClient'
            )
        );
        $context = stream_context_create($opts);

        $wsdlUrl = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';
        $soapClientOptions = array(
            'stream_context' => $context,
            'cache_wsdl' => WSDL_CACHE_NONE
        );

        $client = new SoapClient($wsdlUrl, $soapClientOptions);

        dd($client->__getTypes());
    }
    catch(\Exception $e) {
        echo $e->getMessage();
    }

});

Route::get('/servicios/checkVat', function () {
    try {
        $opts = array(
            'http' => array(
                'user_agent' => 'PHPSoapClient'
            )
        );
        $context = stream_context_create($opts);

        $wsdlUrl = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';
        $soapClientOptions = array(
            'stream_context' => $context,
            'cache_wsdl' => WSDL_CACHE_NONE
        );

        $client = new SoapClient($wsdlUrl, $soapClientOptions);

        $checkVatParameters = array(
            'countryCode' => 'DK',
            'vatNumber' => '47458714'
        );

        dd($client->checkVat($checkVatParameters));

    }
    catch(\Exception $e) {
        echo $e->getMessage();
    }

});

