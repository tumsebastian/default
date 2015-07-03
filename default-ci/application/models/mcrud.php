<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Controller {

	//Menampilkan data dari sebuah table dengan pagination
	public function getList($tables,$limit,$page,$by,$sort)
	{
		$this->db->order_by($by,$sort);
		$this->db->limit($limit,$page);
		return $this->db->get($tables);
	}
	//Menampilkan semua data dari sebuah table
	public function getAll($tables)
	{
		return $this->db->get($tables);
	}
	//Menghitung jumlah record dari sebuah table
	public function countAll($tables)
	{
		return $this->db->get($tables)->num_rows();
	}
	//Menghitung jumlah record dari sebuah table
	public function countQuery($tables)
	{
		return $this->db->get($tables)->num_rows();
	}
	//Menampilkan sebuah record berdasarkan parameter
	public function kondisi($tables, $where)
	{
		$this->db->where($where);
		return $this->db->get($tables);
	}
	//Menampilkan satu record berdasarkan parameter
	public function getByID($tables, $pk, $id)
	{
		$this->db->where($pk, $id);
		return $this->db->get($tables);
	}
	// Menampilkan data dari sebuah query dengan pagination.
	public function queryList($query,$limit,$page)
	{
		return $this->db->query($query."limit".$page.",".$limit."");
	}
	public function queryBiasa($query,$by,$sort)
	{
		// $this->db->order_by($by,$sort);
		return $this->db->query($query);
	}
	public function insert($tables,$data)
	{
		$this->db->insert($tables, $data);
	}
	public function update($tables,$data,$pk,$id)
	{
		$this->db->where($pk,$id);
		$this->db->update($tables, $data);
	}
	public function delete($tables,$pk,$id)
	{
		$this->db->where($pk,$id);
		$this->db->delete($tables);
	}
	public function login($username,$password)
	{
		$this->db->get_where('users',array());
	}
}

/* End of file mcrud.php */
/* Location: ./application/models/mcrud.php */