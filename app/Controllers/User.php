<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class user extends BaseController
{
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('users',[
            'users' => $this->userModel->paginate(10),
            'pager' => $this->userModel->pager
        ]);
    }
    public function delete($id){
        if($this->userModel->delete($id)){
            echo view('messages', [
                'message' => 'Usuário Excluido com Sucesso'
            ]);
        }else{
            echo "Erro ao excluir";
        }
    }
}
