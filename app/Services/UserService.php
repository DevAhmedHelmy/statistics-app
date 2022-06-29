<?php
namespace App\Services;

use App\Models\User;

class UserService
{

    public function all(){
        return User::latest()->paginate();
    }

    public function find($id){
        return User::findOrFail($id);
    }

    public function create($data){
        return User::create($data);
    }

    public function update($id, $data){
        $user = User::findOrFail($id);
        $data['password'] = $data['password'] !== null ? $data['password'] : $user->password;
        $user->update($data);
        return $user;
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return ;
    }

}
