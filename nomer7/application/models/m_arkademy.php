<?php
class M_arkademy extends CI_Model{

  	function m_get_data(){
		$data = $this->db->query("select n.id, n.name, n.id_hobby, h.name as hobby, n.id_category, k.name as category from nama n JOIN hobi h ON n.id_hobby = h.id JOIN kategori k ON k.id=h.id_category");
		return $data;
    }
    function m_get_hobby(){
		$data = $this->db->query("select * from hobi");
		return $data;
    }
    function m_get_category(){
		$data = $this->db->query("select * from kategori");
		return $data;
    }
    function m_add_data($data){
		$this->db->insert('nama', $data);
    }
    function m_edit_data($id, $data){
		$this->db->where('id', $id);
		$this->db->update('nama', $data);
    }
    function m_hapus_data($id){
		$this->db->query("delete from nama where id = $id");
	}
}
?>
