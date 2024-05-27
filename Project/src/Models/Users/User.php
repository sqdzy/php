<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity{
        protected $nickname;
        protected $email;
        protected $isConfirmed;
        protected $role;
        protected $passwordHash;
        protected $authToken;
        protected $createdAt;

        public function getNickname(){
            return $this->nickname;
        }
        public function getEmail(){
            return $this->email;
        }
        protected static function getTableName(){
            return 'users';
        }
    }