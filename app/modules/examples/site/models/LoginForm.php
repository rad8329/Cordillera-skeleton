<?php

namespace modules\examples\site\models;

use cordillera\base\Application;
use cordillera\middlewares\db\Model;

class LoginForm
{
    use Model;

    public $username;
    public $password;

    protected $_users = [
        'admin' => [
            'id' => 1,
            'password' => 'admin',
            'username' => 'admin',
        ],
        'rdiaz' => [
            'id' => 2,
            'password' => 'rdiaz',
            'username' => 'rdiaz',
        ],
    ];

    public function validate()
    {
        if (empty($this->username)) {
            $this->addError('username', Application::getLang()->translate('The username is requiered.'));
        }
        if (!$this->hasError('username') && !isset($this->_users[$this->username])) {
            $this->addError('username', Application::getLang()->translate('The user does not exist.'));
        }

        if (empty($this->password)) {
            $this->addError('password', Application::getLang()->translate('The password is requiered.'));
        }
        if (!$this->hasError('password') && isset($this->_users[$this->username]) && $this->_users[$this->username]['password'] != $this->password) {
            $this->addError('password', Application::getLang()->translate('The password does not match.'));
        }

        return empty($this->_errors);
    }

    /**
     * @return bool|array
     */
    public function login()
    {
        if ($this->validate()) {
            return $this->_users[$this->username];
        }

        return false;
    }
}
