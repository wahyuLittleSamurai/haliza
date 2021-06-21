<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

	function getPusatCluster()
	{
		$this->db->select("*");
		$this->db->from("tblpusatclsuter");
		$query = $this->db->get();
		return $query->result();
	}
	function addTenagaKesehatan($data)
	{
		$this->db->insert('tblTngKesehatan',$data);
	}  
	function getSetting()
	{
		 $this->db->select("*"); 
		 $this->db->from('tblsetting');
		 $query = $this->db->get();
		 return $query->result();
	}
	function editSetting($data)
	{
		$this->db->set('jmlCluster', $data["jmlCluster"]);
	   $this->db->set('pangkat', $data["pangkat"]);
	   $this->db->set('maxIterasi', $data['maxIterasi']);
	   $this->db->set('errorTerkecil', $data['errorTerkecil']);
	   $this->db->update('tblsetting');
	}
	function getTenagaKesehatan()
	{
		 $this->db->select("*"); 
		 $this->db->from('tbltngkesehatan');
		 $query = $this->db->get();
		 return $query->result();
	}

	function deleteTenagaKesehatan($data)
	{
	   $this->db->where('id', $data);
		$this->db->delete('tbltngkesehatan');
	}

	function editTenagaKesehatan($data)
	{
	   $this->db->set('username', $data["username"]);
	   $this->db->set('password', $data["password"]);
	   $this->db->where('id', $data['id']);
	   $this->db->update('tbltngkesehatan');
	}
	function addDataAnak($data)
	{
		$this->db->insert('tblAnak',$data);
	}
	function getDataAnak()
	{
		 $this->db->select("*"); 
		 $this->db->from('tblanak');
		 $query = $this->db->get();
		 return $query->result();
	}
	function editDataAnak($data)
	{
	   $this->db->set('nama', $data["nama"]);
	   $this->db->set('umur', $data["umur"]);
	   $this->db->set('gender', $data["gender"]);
	   $this->db->set('tb', $data["tb"]);
	   $this->db->set('bb', $data["bb"]);
	   $this->db->where('id', $data['id']);
	   $this->db->update('tblAnak');
	}
	function deleteDataAnak($data)
	{
	   $this->db->where('id', $data);
		$this->db->delete('tblAnak');
	}
	function login($data)
	{
	   $this->db->select('*');
		$this->db->from('tbladmin');
		$this->db->where('username',$data["username"]);
		$this->db->where('password',$data["password"]);
		$query=$this->db->get();
		$dataAdmin = $query->num_rows();
		if($dataAdmin > 0)
		{
			return $dataAdmin;
		}
		else
		{
			$this->db->select('*');
			$this->db->from('tbltngkesehatan');
			$this->db->where('username',$data["username"]);
			$this->db->where('password',$data["password"]);
			$query=$this->db->get();
			$dataTngKesehatan = $query->num_rows();
			return $dataTngKesehatan;
		}
	}

  }