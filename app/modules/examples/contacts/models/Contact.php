<?php
namespace modules\examples\contacts\models;

use cordillera\base\Application;
use cordillera\middlewares\db\ActiveRecord;

class Contact extends ActiveRecord
{
    protected $_table_name = "contact";
    protected $_pk_name = "id";

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $phone;
    public $created_at;
    public $updated_at;

    /**
     * @return bool
     */
    public function validate()
    {
        if (empty($this->firstname)) {
            $this->addError("firstname", Application::getLang()->translate("First name is requiered."));
        }

        if (empty($this->lastname)) {
            $this->addError("lastname", Application::getLang()->translate("Last name is requiered."));
        }

        if (empty($this->email)) {
            $this->addError("email", Application::getLang()->translate("Email is requiered."));
        }

        if (empty($this->phone)) {
            $this->addError("phone", Application::getLang()->translate("Phone is requiered."));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }
}