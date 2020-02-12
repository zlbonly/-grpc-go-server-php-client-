<?php

require_once __DIR__ . '/vendor/autoload.php';

use User\UserClient;

// 创建客户端实例
$userClient = new UserClient('127.0.0.1:50051', [
    'credentials' => Grpc\ChannelCredentials::createInsecure()
]);


//处理添加用户 rpc CreateUser (UserRequest) returns (UserResponse) {}
$address = new User\UserRequest\Address();
$address->setCity("xian");
$address->setProvince("shanxi");

$userRequest = new User\UserRequest();
$userRequest->setId(3);
$userRequest->setEmail("demo@163.com");
$userRequest->setName("demo");
$userRequest->setPhone("13000000000");
$userRequest->setAddresses([$address]);
$request = $userClient->CreateUser($userRequest)->wait();


//返回数组
//$response 是 UserResponse 对象
//$status 是数组
list($response, $status) = $request;



//处理获取用户  rpc GetUsers(UserFilter) returns (stream UserRequest) {}
//设置请求参数UserFilter
$userFilter = new User\UserFilter();
$userFilter->setId(1);

$call = $userClient->GetUsers($userFilter);

$features = $call->responses();


echo var_dump($features);


foreach ($features as $feature) {
   echo "<pre>";
   var_dump(  $feature->getName());
   var_dump(  $feature->getId());
   foreach ($feature->getAddresses() as $v)
   {
       var_dump($v->getProvince());
       var_dump($v->getCity());
   }
   echo "</pre>";

    // process each feature
} // the loop will end when the server indicates there is no more responses to be sent.