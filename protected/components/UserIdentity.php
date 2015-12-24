<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	public $user;
	private $_id;
	public $username;

	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('username' => $this->username));

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif ($this->password !== $user->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			// insert into the table sesion.
			$timestamp = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
			Yii::app()->user->setState('pid', $timestamp);
			$start_sesion = date('Y:m:d H:i:s');
			// insert into the table sesion.
			$sql = "insert into sesion(id_sesion, pid, user_id_user, start_sesion) "
					. "values(DEFAULT, '$timestamp', '$user->id_user', '$start_sesion')";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$command->execute();
			$this->username = $user->username;
			$this->_id = $user->id_user;
			$this->errorCode = self::ERROR_NONE;
		}

		if ($this->errorCode === self::ERROR_UNKNOWN_IDENTITY) {
			if (!$this->user->validatePassword($this->password))
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			else {
				$this->beforeAuthentication();
				$this->errorCode = self::ERROR_NONE;
			}
		}

		return $this->errorCode == self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record.
	 */
	public function getId() {
		$res = 0;
		if (!is_null($this->_id))
			$res = $this->_id;
		return $res;
	}
}