package main

import (
	"log"
	"net"
	"golang.org/x/net/context"
	"google.golang.org/grpc"
	pb "grpc-go-server-php-client/grpc/user"
)

const(
	port = ":50051"
)

type server struct {
	savedUsers []*pb.UserRequest
}

// CreateUser creates a new User
func (s *server) CreateUser(ctx context.Context, in *pb.UserRequest) (*pb.UserResponse, error) {

	s.savedUsers = append(s.savedUsers, in)
	return &pb.UserResponse{Id: in.Id, Success: true}, nil
}

// GetUsers returns all users by given id
func (s *server) GetUsers(filter *pb.UserFilter, stream pb.User_GetUsersServer) error {
	for _, user := range s.savedUsers {
		if filter.Id == 0 {
			continue
		}
		if err := stream.Send(user); err != nil {
			return err
		}
	}
	return nil
}

func main() {
	lis, err := net.Listen("tcp", port)
	if err != nil {
		log.Fatalf("failed to listen: %v", err)
	}

	// Creates a new gRPC server
	s := grpc.NewServer()
	pb.RegisterUserServer(s, &server{})
	s.Serve(lis)
}