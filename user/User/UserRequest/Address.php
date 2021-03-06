<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: userrpc.proto

namespace User\UserRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>user.UserRequest.Address</code>
 */
class Address extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string province = 1;</code>
     */
    private $province = '';
    /**
     * Generated from protobuf field <code>string city = 2;</code>
     */
    private $city = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $province
     *     @type string $city
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Userrpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string province = 1;</code>
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Generated from protobuf field <code>string province = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setProvince($var)
    {
        GPBUtil::checkString($var, True);
        $this->province = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string city = 2;</code>
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>string city = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkString($var, True);
        $this->city = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Address::class, \User\UserRequest_Address::class);

