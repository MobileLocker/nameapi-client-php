<?php

namespace org\nameapi\client\services\email\disposableemailaddressdetector;

use org\nameapi\ontology\input\context\Context;

require_once('wsdl/SoapDisposableEmailAddressDetectorService.php');
require_once('DisposableEmailAddressDetectorResult.php');
require_once('Maybe.php');

/**
 * This is the service class for the web service offered at
 * http://api.nameapi.org/soap/v4.0/email/disposableemailaddressdetector?wsdl
 *
 * HOW TO USE:
 * $deaDetector = $myServiceFactory->emailServices()->disposableEmailAddressDetector();
 * $result = $deaDetector->isDisposable("abcdefgh@10minutemail.com");
 * echo $result->getDisposable()->toString()); //will print 'YES'
 */
class DisposableEmailAddressDetectorService {

    private $context;
    private $soapDisposableEmailAddressDetectorService;

    public function __construct(Context $context) {
        $this->context = $context;
        $this->soapDisposableEmailAddressDetectorService = new wsdl\SoapDisposableEmailAddressDetectorService();
    }

    /**
     * @param string $emailAddress
     * @return DisposableEmailAddressDetectorResult
     */
    public function isDisposable($emailAddress) {
        $parameters = new wsdl\DisposableEmailAddressDetectorArguments($this->context, $emailAddress);
        $result = $this->soapDisposableEmailAddressDetectorService->isDisposable($parameters);
        return new DisposableEmailAddressDetectorResult($result->return->disposable);
    }

} 