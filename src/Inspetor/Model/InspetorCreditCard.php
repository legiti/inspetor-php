<?php
/**
 * CreditCardInfo
 *
 * PHP version 5
 *
 * @category Class
 * @package  Inspetor\Client
 * @author   Inspetor Team
 * @link     ""
 */

/**
 * Inspetor Antifraud
 *
 * This is an antifraud product developed to analyzes transactions and identify frauds using trackers and analytics tools. This file must explain every request and parametes that a library must provide to a client.
 *
 * Contact: theo@useinspetor.com
 */

namespace Inspetor\Model;

use Inspetor\Exception\ModelException\InspetorCreditCardException;
use Inspetor\Model\InspetorAddress;
use Inspetor\Model\InspetorAbstractModel;
use JsonSerializable;

class InspetorCreditCard extends InspetorAbstractModel implements JsonSerializable {

    /**
     * PROPERTIES
     */

     /**
     * @param string
     */
    private $first_six_digits;

    /**
     * @param string
     */
    private $last_four_digits;

    /**
     * @param string
     */
    private $holder_name;

    /**
     * @param string
     */
    private $holder_cpf;

    /**
     * @param Inspetor\Model\InspetorAddress $billing_address
     */
    private $billing_address;

    /**
     * ISVALID
     */

    /**
     * Validate CreditCard instance
     *
     * @return void
     */
    public function isValid() {
        if (!$this->first_six_digits) {
            throw new InspetorCreditCardException(7001);
        }

        if (!$this->last_four_digits) {
            throw new InspetorCreditCardException(7002);
        }

        if (!$this->holder_name) {
            throw new InspetorCreditCardException(7003);
        }

        if (!$this->holder_cpf) {
            throw new InspetorCreditCardException(7004);
        }

        if (!$this->billing_address) {
            throw new InspetorCreditCardException(7005);
        }
    }

    /**
     * GETTERS AND SETTERS
     */


    /**
     * Get the value of first_six_digits
     *
     *
     * @return string
     */
    public function getFirstSixDigits() {
        return $this->first_six_digits;
    }

    /**
     * Set the value of first_six_digits
     *
     * @param string  $first_six_digits
     *
     * @return  self
     */
    public function setFirstSixDigits($first_six_digits) {
        $this->first_six_digits = $first_six_digits;
        return $this;
    }

    /**
     * Get the value of last_four_digits
     *
     * @return string
     */
    public function getLastFourDigits() {
        return $this->last_four_digits;
    }

    /**
     * Set the value of last_four_digits
     *
     * @param string  $last_four_digits
     *
     * @return  self
     */
    public function setLastFourDigits($last_four_digits) {
        $this->last_four_digits = $last_four_digits;
        return $this;
    }

    /**
     * Get the value of holder_name
     *
     * @return string
     */
    public function getHolderName() {
        return $this->holder_name;
    }

    /**
     * Set the value of holder_name
     *
     * @param string  $id
     *
     * @return self
     */
    public function setHolderName($holder_name) {
        $this->holder_name = $holder_name;
        return $this;
    }

    /**
     * Get the value of holder_cpf
     *
     * @return string
     */
    public function getHolderCpf() {
        return $this->holder_cpf;
    }

    /**
     * Set the value of holder_cpf
     *
     * @param string  $holder_cpf
     *
     * @return self
     */
    public function setHolderCpf($holder_cpf) {
        $this->holder_cpf = $holder_cpf;
        return $this;
    }

    /**
     * Get the value of billing_address
     *
     * @return Inspetor\Model\Address
     */
    public function getBillingAddress() {
        return $this->billing_address;
    }

    /**
     * Set the value of billing_address
     *
     * @param Inspetor\Model\InspetorAddress $billing_address
     *
     * @return self
     */
    public function setBillingAddress($billing_address) {
        if ($billing_address) {
            $billing_address->isValid();
        }
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * JSONSERIALIZE
    */

    /**
     * Create a json with the data from the object
     * @return array
    */
    public function jsonSerialize() {
        $array = [
            "cc_first_six"       => $this->encodeData($this->getFirstSixDigits()),
            "cc_last_four"       => $this->encodeData($this->getLastFourDigits()),
            "cc_holder_name"     => $this->encodeData($this->getHolderName()),
            "cc_holder_cpf"      => $this->encodeData($this->getHolderCpf()),
            "cc_billing_address" => $this->encodeObject($this->getBillingAddress())
        ];

        return $array;
    }

}


?>