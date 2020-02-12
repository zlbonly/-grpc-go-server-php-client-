<?php
// GENERATED CODE -- DO NOT EDIT!

namespace User;

/**
 * The User service definition.
 */
class UserClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Get all Users with id - A server-to-client streaming RPC.
     * @param \User\UserFilter $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetUsers(\User\UserFilter $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/user.User/GetUsers',
        $argument,
        ['\User\UserRequest', 'decode'],
        $metadata, $options);
    }

    /**
     * Create a new User - A simple RPC 
     * @param \User\UserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateUser(\User\UserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.User/CreateUser',
        $argument,
        ['\User\UserResponse', 'decode'],
        $metadata, $options);
    }

}
