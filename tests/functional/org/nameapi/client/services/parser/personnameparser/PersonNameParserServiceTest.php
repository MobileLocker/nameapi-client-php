<?php

namespace org\nameapi\client\services\parser\personnameparser;

require_once(__DIR__.'/../../BaseServiceTest.php');

use org\nameapi\client\services\BaseServiceTest;
use org\nameapi\ontology\input\entities\person\NaturalInputPerson;
use org\nameapi\ontology\input\entities\person\name\InputPersonName;

class PersonNameParserServiceTest extends BaseServiceTest {

    public function testPing() {
        $personNameParser = $this->makeServiceFactory()->parserServices()->personNameParser();
        $inputPerson = NaturalInputPerson::builder()
            ->name(InputPersonName::westernBuilder()
                ->fullname( "John Doe" )
                ->build())
            ->build();
        $parseResult = $personNameParser->parse($inputPerson);
        $this->assertEquals($parseResult->getParsingStatus()->toString(), 'SUCCESS');
    }

}