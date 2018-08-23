<?php
class Register_m extends MY_Model
{
  public function add_user_data($data)
  {
    $this->db
      ->insert('user', $data);
  }
}
