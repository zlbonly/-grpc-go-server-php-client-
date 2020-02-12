## grpc-go-server-php-client
### grpc的Go服务端和PHP客户端实现
[参考链接](https://studygolang.com/articles/21667?fr=sidebar)

#### 补充说明
#### 1、安装 grpc_php_plugin  
```
$ git clone -b $(curl -L https://grpc.io/release) https://github.com/grpc/grpc   
$ cd grpc   
$ git pull --recurse-submodules && git submodule update --init --recursive   
$ make  
$ sudo make install  
````
#### 1、golang如果使用protobuf，需要引入google.golang.org/grpc库。使用 go mod管理.
