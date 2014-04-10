<?php

namespace org\nameapi\client\services\formatter\personnameformatter;

use org\nameapi\ontology\input\context\Context;
use org\nameapi\ontology\input\entities\person\NaturalInputPerson;
use org\nameapi\client\services\formatter\FormatterProperties;
use org\nameapi\client\services\formatter\FormatterResult;

require_once('wsdl/SoapPersonNameFormatterService.php');
require_once(__DIR__.'/../FormatterResult.php');
require_once(__DIR__.'/../FormatterProperties.php');



/**
 * This is the service class for the web service offered at
 * http://api.nameapi.org/soap/v4.0/formatter/personnameformatter?wsdl
 *
 * HOW TO USE:
 * $personNameFormatter = $myServiceFactory->formatterServices()->personNameFormatter();
 * $formatterResult = $personNameFormatter->format($myInputPerson, $myParams);
 */
class PersonNameFormatterService {

    private $context;
    private $soapPersonNameFormatterService;

    public function __construct(Context $context) {
        $this->context = $context;
        $this->soapPersonNameFormatterService = new wsdl\SoapPersonNameFormatterService();
    }

    /**
     * @param NaturalInputPerson $person
     * @param FormatterProperties $properties
     * @return FormatterResult
     */
    public function format(NaturalInputPerson $person, FormatterProperties $properties) {
        $parameters = new wsdl\FormatPersonNameArguments($this->context, $person, $properties->toWsdl());
        $result = $this->soapPersonNameFormatterService->format($parameters)->return;
        return new FormatterResult($result->formatted, $result->unknown);
    }

} 