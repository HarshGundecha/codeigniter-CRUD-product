<?php
class Login_m extends MY_Model
{
  public function get_login_data($where)
  {
    return $this->db
      ->where($where)
      ->get('user')
      ->result();
  }
}
