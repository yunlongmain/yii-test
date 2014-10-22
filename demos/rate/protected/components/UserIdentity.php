<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    const ERROR_USER_NO_AUTH=3;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $user = Rater::model()->find('LOWER(username)=?',array(strtolower($this->username)));
        if($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }else if(!$user->validatePassword($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else if(!$user->validateAuth()){
            $this->errorCode=self::ERROR_USER_NO_AUTH;
        }else {
            $this->_id=$user->id;
            $this->username=$user->username;
            $this->errorCode=self::ERROR_NONE;
            $this->setState('role',$user->role);
        }

        return $this->errorCode==self::ERROR_NONE;

	}

    public function getId()
    {
        return $this->_id;
    }
}