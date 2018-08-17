<?php

class Product_m extends MY_Model{

  public function get_product_data($where=false)
  {
    if($where)
      $this->db->where($where);
    $data = $this->db
      ->select('P.Name PName, P.ProductSlug, P.Description, P.Price, C.Name CName')
      ->from('product P')
      ->join('category C', 'P.CategorySlug=C.CategorySlug')
      ->where(['Status'=>1])
      ->get()
      ->result();
    return $data;
  }

  public function add_product_d($data)
  {
    $this->db
      ->insert('product', $data);
  }

  public function delete_product_d($condition)
  {
    $this->db
      ->set(['Status'=>0])
      ->where($condition)
      ->update('product');
  }

  public function delete_multiple_product_d($condition)
  {
    $this->db
      ->set(['Status'=>0])
      ->where_in('ProductSlug',$condition)
      ->update('product');
  }

  public function get_category_d()
  {
    return $this->db
      ->get('category')
      ->result();
  }
}
