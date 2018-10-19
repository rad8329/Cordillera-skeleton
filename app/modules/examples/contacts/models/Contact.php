<?php

namespace modules\examples\contacts\models;

use cordillera\middlewares\db\adapters\sql\ActiveRecord;

class Contact extends ActiveRecord
{
    protected $_table_name = 'contact';
    protected $_pk_name = 'id';

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $phone;
    public $gender;
    public $created_at;
    public $updated_at;

    /**
     * @return bool
     */
    public function validate()
    {
        if (empty($this->firstname)) {
            $this->addError('firstname', translate('First name is requiered'));
        }

        if (empty($this->lastname)) {
            $this->addError('lastname', translate('Last name is requiered'));
        }

        if (empty($this->email)) {
            $this->addError('email', translate('Email is requiered'));
        }

        if (empty($this->phone)) {
            $this->addError('phone', translate('Phone is requiered'));
        }

        if (empty($this->gender)) {
            $this->addError('gender', translate('Gender is requiered'));
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->firstname.' '.$this->lastname;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        $avatar_id = (int) substr($this->id, -1); //No more than 10 differents avatars

        return sprintf(
            'https://api.randomuser.me/portraits/%s/%d.jpg',
            ($this->gender == 'male' ? 'men' : 'women'),
            $avatar_id == 0 ? $avatar_id + 1 : $avatar_id
        );
    }
}
