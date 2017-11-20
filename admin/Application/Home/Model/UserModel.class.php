<?php
namespace Home\Model;
use Think\Model;
class UserModel extends model{
	public function deleteUserById($user_id){
		$query = $this->delete($user_id);
		return $query;
	}
	
}
?>