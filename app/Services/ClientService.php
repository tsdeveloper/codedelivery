<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ClientRepository;

class ClientService
{

      /**
     * @var ClientRepository
     */
    private $clientRespository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRespository, UserRepository $userRepository)
    {

        $this->clientRespository = $clientRespository;
        $this->userRepository = $userRepository;
    }
    public function update(array $data, $id)
    {
            $this->clientRespository->update($data,$id);
            $userId = $this->clientRespository->find($id, ['user_id'])->user_id;
            // dd($userId);
            
             $this->userRepository->update($data['user'],$userId);
    }

    public function store(array $data)
    {
        $data['user']['password'] =bcrypt(123456);        
        $user = $this->userRepository->create($data['user']);
        // dd($userId);
        // exit;        
        $data['user_id'] = $user->id;
        // dd($data);
        $this->clientRespository->create($data);
                         // dd($userId);
            
    }
}