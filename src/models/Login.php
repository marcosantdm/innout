<?php
loadModel('User');

class Login extends Model {

    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors['email'] = 'Email é um campo obrigatório!';
        }

        if(!$this->password) {
            $errors['password'] = 'Por favor, informe a senha!';
        } 
        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
    
    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);

        if($user && $user->end_date) {
            throw new AppException('Usuário desligado da empresa');
        }

        if($user) {
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }

        throw new AppException('Usuário ou senha inválidos');
    }
}
