<?php
namespace app\rbac;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use app\models\User;

class UserRoleRule extends Rule
{
	public $name = 'userRole';

	public function execute($user, $item, $params)
	{
		$user = ArrayHelper::getValue($params, 'user', User::findOne($user));
		if ($user) {
			$role = $user->userstatus;
			if ($item->name === 'admin') {
				return $role == User::ROLE_ADMIN;
			} elseif ($item->name === 'user') {
				return $role == User::ROLE_ADMIN || $role == User::ROLE_USER;
			}
		}
		return false;
	}
}