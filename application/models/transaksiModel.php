<?php
	class TransaksiModel extends CI_Model{	
		public function __construct(){
			parent::__construct();
	}

	   function transaksi_sementara($daerah_antar_transaksi = false){

		   $this->db->select('id_alamat');
   		$data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
   		//$dataku[$dataalamat] = $row['nama_alamat'];
         $this->db->select('id_transaksi');
		   $this->db->select('pemesan_transaksi');
   		$this->db->select('date_transaksi');
   		$this->db->select('tujuan_transaksi');
         $this->db->select('daerah_antar_transaksi');
         $this->db->select('jumlah_transaksi');
   		$this->db->join('alamat_pemesan_ksd','alamat_pemesan_ksd.id_alamat=transaksi_ksd.daerah_antar_transaksi');
         if ($daerah_antar_transaksi !== false)
            $this->db->where('transaksi_ksd.daerah_antar_transaksi', $daerah_antar_transaksi);
   		   $this->db->where('status_transaksi', 1);
            $this->db->order_by('date_transaksi', 'ASC');
   		   $data1 = $this->db->get('transaksi_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
   		//return $data1->result();
   	}

      function transaksi_dibuat($daerah_antar_transaksi = false){

         $this->db->select('id_alamat');
         $data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
         //$dataku[$dataalamat] = $row['nama_alamat'];
         $this->db->select('id_transaksi');
         $this->db->select('pemesan_transaksi');
         $this->db->select('date_transaksi');
         $this->db->select('tujuan_transaksi');
         $this->db->select('daerah_antar_transaksi');
         $this->db->select('jumlah_transaksi');
         $this->db->join('alamat_pemesan_ksd','alamat_pemesan_ksd.id_alamat=transaksi_ksd.daerah_antar_transaksi');
         if ($daerah_antar_transaksi !== false)
            $this->db->where('transaksi_ksd.daerah_antar_transaksi', $daerah_antar_transaksi);
            $this->db->where('status_transaksi', 6);
            $this->db->order_by('date_transaksi', 'ASC');
            $data1 = $this->db->get('transaksi_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
         //return $data1->result();
      }

      function transaksi_sedang($daerah_antar_transaksi = false){

         $this->db->select('id_alamat');
         $data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
         //$dataku[$dataalamat] = $row['nama_alamat'];
         $this->db->select('id_transaksi');
         $this->db->select('pemesan_transaksi');
         $this->db->select('date_transaksi');
         $this->db->select('tujuan_transaksi');
         $this->db->select('daerah_antar_transaksi');
         $this->db->join('alamat_pemesan_ksd','alamat_pemesan_ksd.id_alamat=transaksi_ksd.daerah_antar_transaksi');
         if ($daerah_antar_transaksi !== false)
            $this->db->where('transaksi_ksd.daerah_antar_transaksi', $daerah_antar_transaksi);
         $this->db->order_by('date_transaksi', 'ASC');
         $this->db->where('status_transaksi', 2);
         $data1 = $this->db->get('transaksi_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
         //return $data1->result();
      }

      function transaksi_ditempat($id_transaksi = false){

         $this->db->select('id_alamat');
         $data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
         $this->db->select('menu_transaksi');
         $this->db->select('transaksi_ksd.id_transaksi');
         $this->db->select('jumlah_menu');
         $this->db->join('transaksi_ksd','transaksi_ksd.id_transaksi=transaksi_menu_ksd.id_transaksi');
         if ($id_transaksi !== false)
            $this->db->where('transaksi_menu_ksd.id_transaksi', $id_transaksi);
            $this->db->order_by('transaksi_menu_ksd.id_transaksi', 'ASC');
         $this->db->where('transaksi_ksd.status_transaksi',4);
         $data1 = $this->db->get('transaksi_menu_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
         //return $data1->result();
      }

      function transaksi_sementara_tampilmenu($id_transaksi = false){

         $this->db->select('id_alamat');
         $data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
         $this->db->select('menu_transaksi');
         $this->db->select('transaksi_ksd.id_transaksi');
         $this->db->select('jumlah_menu');
         $this->db->join('transaksi_ksd','transaksi_ksd.id_transaksi=transaksi_menu_ksd.id_transaksi');
         if ($id_transaksi !== false)
            $this->db->where('transaksi_menu_ksd.id_transaksi', $id_transaksi);
            $this->db->order_by('transaksi_menu_ksd.id_transaksi', 'ASC');
         $this->db->where('transaksi_ksd.status_transaksi',1);
         $data1 = $this->db->get('transaksi_menu_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
         //return $data1->result();
      }

      function transaksi_dibuat_tampilmenu($id_transaksi = false){

         $this->db->select('id_alamat');
         $data = $this->db->get('alamat_pemesan_ksd');
         foreach($data->result_array() as $row){
            $daerah[] = $row['id_alamat'];
         }
         $this->db->select('menu_transaksi');
         $this->db->select('transaksi_ksd.id_transaksi');
         $this->db->select('jumlah_menu');
         $this->db->join('transaksi_ksd','transaksi_ksd.id_transaksi=transaksi_menu_ksd.id_transaksi');
         if ($id_transaksi !== false)
            $this->db->where('transaksi_menu_ksd.id_transaksi', $id_transaksi);
            $this->db->order_by('transaksi_menu_ksd.id_transaksi', 'ASC');
         $this->db->where('transaksi_ksd.status_transaksi',6);
         $data1 = $this->db->get('transaksi_menu_ksd');

         if($data1->result()==TRUE){
            foreach($data1->result_array() as $row){
               $result[] = $row;
            }
            return $result;
         }
         //return $data1->result();
      }
	

   function transaksi_ksd(){

      $this->db->select('id_transaksi');
      $this->db->select('pemesan_transaksi');
      $this->db->select('jumlah_transaksi');
      $this->db->where('status_transaksi',4);
      $this->db->order_by('id_transaksi','ASC');
      $data = $this->db->get('transaksi_ksd');
      if($data->result()==TRUE){
         foreach($data->result_array() as $row){
            $result[] = $row;
         }
         return $result;
      }   
         //return $data->result();
   }

	function daerah_pemesan(){

		$this->db->select('id_alamat');
      $this->db->select('nama_alamat');
      $this->db->order_by('id_alamat','ASC');
   	$data = $this->db->get('alamat_pemesan_ksd');
      if($data->result()==TRUE){
         foreach($data->result_array() as $row){
            $result[] = $row;
         }
         return $result;
      }   
   		//return $data->result();
	}

   function transaksi_set_sukses($data){
      $status_transaksi = $data['status_transaksi'];
      $id_transaksi = $data['id_transaksi'];
      $this->db->query("UPDATE transaksi_ksd SET status_transaksi ='5' WHERE id_transaksi = '$id_transaksi'");
   }

   function transaksi_set_all($data){
      $status_transaksi = $data['status_transaksi'];
      $this->db->query("UPDATE transaksi_ksd SET status_transaksi =$status_transaksi WHERE status_transaksi = '1'");
   }

   function transaksi_set_sukses_diantar($data){
      $id_alamat = $data['id_alamat'];
      $status_transaksi = $data['status_transaksi'];
      $this->db->query("UPDATE transaksi_ksd SET status_transaksi =$status_transaksi WHERE daerah_antar_transaksi = $id_alamat");
   }
}
?>
