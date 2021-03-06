<?php

namespace Inspetor\Exception\ModelException;

use Inspetor\Exception\ExceptionAbstract;

class InspetorEventException extends ExceptionAbstract {

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
    const HEADER = "INSPETOR EXCEPTION - EVENT";

    /**
     * @var array
     */
    protected static $messages = array(
        1  => "id is a required property. It cannot be null.",
        2  => "name is a required property. It cannot be null on creation.",
        3  => "timestamp is a required property. It cannot be null.",
        4  => "creator_id is a required property. It cannot be null on creation.",
        5  => "address is a required property when the event has physical place.  It cannot be null on creation.",
        6  => "sessions is a required property. It must be an array of one or more sessions.",
        7  => "seating_options must be null or an array of strings.",
        8  => "categories must be null or an array of strings.",
        9  => "status is invalid.",
        10 => "sessions must be an array of one or more sessions.",
        11 => "id and timestamp are required properties of a session.",
        12 => "admins_id must be an array of one or more users.",
        13 => "is_physical must be a boolean. It's true by default."
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
