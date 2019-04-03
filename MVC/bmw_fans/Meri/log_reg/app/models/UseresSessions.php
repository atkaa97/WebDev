<?php
    class UserSessions extends  Model{
        public function __construct(){
            $table = 'user_session';
            parent::__construct($table);
        }

        public static function getFromCookie(){
            if(COOKIE::exists(REMEMBER_ME_COOKIE_NAME)){
                $a= new self();
                $userSession = $a->findFirst([
                'condition' => "user_agent = ? AND session = ?",
                    'bind' => [Session::uagent_no_version(), COOKIE::get(REMEMBER_ME_COOKIE_NAME)]
                ]);
            }
            if(!$userSession) return false;
            return $userSession;

        }
    }