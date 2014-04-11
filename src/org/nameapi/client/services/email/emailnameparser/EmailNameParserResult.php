<?php

namespace org\nameapi\client\services\email\emailnameparser;

require_once('EmailAddressParsingResultType.php');
require_once('EmailNameParserMatch.php');

class EmailNameParserResult {

    /**
     * @var EmailAddressParsingResultType
     */
    private $resultType = null;

    /**
     * @var EmailNameParserMatch[] $matches
     */
    private $matches = null;


    /**
     * @param EmailAddressParsingResultType $resultType
     * @param EmailNameParserMatch[] $matches
     */
    public function __construct(EmailAddressParsingResultType $resultType, $matches) {
        $this->resultType = $resultType;
        $this->matches = $matches;
    }

    /**
     * @return EmailAddressParsingResultType
     */
    public function getResultType() {
        return $this->resultType;
    }

    /**
     * @return EmailNameParserMatch[]
     */
    public function getMatches() {
        return $this->matches;
    }

} 