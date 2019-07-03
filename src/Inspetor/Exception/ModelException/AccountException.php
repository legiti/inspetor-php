<?php

namespace Inspetor\Exception\ModelException;

use Inspetor\Exception\ExceptionAbstract;

class AccountException extends ExceptionAbstract {

    /**
     * Category of Exception
     */
    const CATEGORY = 7000;

    /**
     * Description of Exception
     */
    const DESCRIPTION = "Missing parameters and wrong variable values will throw this category of error.";

    /**
     * Header of message
     */
    const HEADER = "INSPETOR EXCEPTION - ACCOUNT";

    /**
     * @var array
     */
    protected static $messages = array(
        1 => "id is a required property. It can't be null.",
        2 => "email is a required property. It can't be null.",
        3 => "update_timestamp is a required property. It can't be null.",
    );

    /**
     * Construct with fields, to call superclass constructor
     *
     * @param string      $code
     * @param null|string $field
     * @param null        $httpStatus
     */
    function __construct($code, $field = null, $httpStatus = null)
    {

        $fullMessage = $this->getMessageByCode($code, $field, self::HEADER);

        parent::__construct($fullMessage, $httpStatus);
    }
}
