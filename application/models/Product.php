<?php 

class Product extends CI_Model{
    
    function tampil_data(){
		return $this->db->get('product');
    }

    function product_detail($id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        return $this->db->get();
    }
    
    public function help_checkid($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('product');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function insertProduct($data)
    {
        $val = array(
          'id' => '',
          'name' => $data['name'],
          'description' => $data['description'],
          'price' => $data['price'],
          'create_at' => date("Y-m-d h:i:s"),
          'update_at' => '',
        );
        return $this->db->insert('product', $val);
    }
    public function updateProduct($data, $id)
    {
        //print_r($data);
        $val = array(
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'update_at' => date("Y-m-d h:i:s"),
        );
        $this->db->where('id', $id);
        return $this->db->update('product', $val);
    }

    public function deleteProduct($id)
    {
        $val = array(
            'id' => $id
          );
        return $this->db->delete('product', $val);
    }
}

?>