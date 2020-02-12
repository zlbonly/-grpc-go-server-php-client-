package main

import (
	"io"
	"log"

	"golang.org/x/net/context"
	"google.golang.org/grpc"
	pb "grpc-go-server-php-client/grpc/user"
)

const (
	address = "localhost:50051"
)

// createUser calls the RPC method CreateUser of UserServer
func createUser(client pb.UserClient, user *pb.UserRequest) {
	resp, err := client.CreateUser(context.Background(), user)
	if err != nil {
		log.Fatalf("Could not create User: %v", err)
	}
	if resp.Success {
		log.Printf("A new User has been added with id: %d", resp.Id)
	}
}

// getUsers calls the RPC method GetUsers of UserServer
func getUsers(client pb.UserClient, id *pb.UserFilter) {
	// calling the streaming API
	stream, err := client.GetUsers(context.Background(), id)
	if err != nil {
		log.Fatalf("Error on get users: %v", err)
	}
	for {
		user, err := stream.Recv()
		if err == io.EOF {
			break
		}
		if err != nil {
			log.Fatalf("%v.GetUsers(_) = _, %v", client, err)
		}
		log.Printf("User: %v", user)
	}
}
func main() {
	// Set up a connection to the gRPC server.
	conn, err := grpc.Dial(address, grpc.WithInsecure())
	if err != nil {
		log.Fatalf("did not connect: %v", err)
	}
	defer conn.Close()
	// Creates a new UserClient
	client := pb.NewUserClient(conn)

	user := &pb.UserRequest{
		Id:    1,
		Name:  "test",
		Email: "fasd@163.com",
		Phone: "132222222",
		Addresses: []*pb.UserRequest_Address{
			&pb.UserRequest_Address{
				Province: "hebei",
				City:     "shijiazhuang",
			},
		},
	}

	// Create a new user
	createUser(client, user)
	// Filter with an  id
	filter := &pb.UserFilter{Id: 1}
	getUsers(client, filter)
}