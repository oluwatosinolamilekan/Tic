<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\API\ResponseTrait;


class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('welcome_message');
    }

    public function welcome()
    {
        $validation =  \Config\Services::validation();
        $errors = [];
        return view('form',compact('errors','validation'));
    }

    public function form()
    {
        helper(['form', 'url']);
        $errors = [];
        $rules = [
            'first_player_name' => 'required',
            'second_player_name' => 'required',
        ];
        if($this->validate($rules)){
            $names = [
                $this->request->getPost('first_player_name'),
                $this->request->getPost('second_player_name'),
            ];
            $session = session();
            $session->set('players', [
                'first_player_name' => $names[0],
                'second_player_name' => $names[1],
            ]);
            //return to game view...
            return redirect()->to(base_url('game-view'));
        }else{
            // redirect back to page to enter first player and second player..
            $errors['validation'] = $this->validator;
            return redirect()->back();
        }
    }

    public function game_view()
    {
        $session = session();
        if($session->has('players')){
            $players = $session->get('players');
        }else{
            return redirect()->to(base_url('/'));
        }
        return view('welcome',compact('players'));
    }

   

    public function store_game_data()
    {
        try {
            helper(['form', 'url']);
            $session = session();
            $players = $session->get('players');
            $user = new User(); //save users that play game..
            $data = [
                'first_player_name' => $players['first_player_name'],
                'second_player_name' => $players['last_player_name'],
                'winner' => $this->request->getPost('winner')
            ];
            $user->insert($data);
            //destroy session 
            $session->destroy();
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Employee created successfully'
                ]
            ];
            return $this->respondCreated($response);
        echo json_encode( $data );
        } catch (\Exception $e) {
           return $e->getMessage();
        }
    }

    public function results()
    {
        $userModel = new User();
        $users = $userModel->findAll();
        return view('results',compact('users'));
    }
}
