<?php

class Product_m extends MY_Model{

  public function get_product_data($where=false)
  {
    if($where)
      $this->db->where($where);
    $data = $this->db
      ->select('P.Name PName, P.Description, P.Price, C.Name CName')
      ->from('product P')
      ->join('category C', 'P.CategorySlug=C.CategorySlug')
      ->get()
      ->result();
    return $data;
  }

  public function add_product_d($data)
  {
    $this->db
      ->insert('product', $data);
  }

  public function get_category_d()
  {
    return $this->db
      ->get('category')
      ->result();
  }
}
