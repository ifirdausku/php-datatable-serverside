<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data"){


		$columns = array( 
								0 =>'id', 
								1 =>'nama',
								2=> 'no_hp',
								3=> 'id',
							);

		$querycount = $mysqli->query("SELECT count(id) as jumlah FROM tbl_kontak");
		$datacount = $querycount->fetch_array();
	
  
		$totalData = $datacount['jumlah'];
			
		$totalFiltered = $totalData; 

		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order = $columns[$_POST['order']['0']['column']];
		$dir = $_POST['order']['0']['dir'];
			
		if(empty($_POST['search']['value']))
		{			
			$query = $mysqli->query("SELECT id,nama,no_hp FROM tbl_kontak order by $order $dir 
																		LIMIT $limit 
																		OFFSET $start");
		}
		else {
			$search = $_POST['search']['value']; 
			$query = $mysqli->query("SELECT id,nama,no_hp FROM tbl_kontak WHERE nama LIKE '%$search%' 
																		or no_hp LIKE '%$search%' 
																		order by $order $dir 
																		LIMIT $limit 
																		OFFSET $start");


		   $querycount = $mysqli->query("SELECT count(id) as jumlah FROM tbl_kontak WHERE nama LIKE '%$search%' 
	   																						or no_hp LIKE '%$search%'");
		   $datacount = $querycount->fetch_array();
		   $totalFiltered = $datacount['jumlah'];
		}

		$data = array();
		if(!empty($query))
		{
			$no = $start + 1;
			while ($r = $query->fetch_array())
			{
				$nestedData['no'] = $no;
				$nestedData['nama'] = $r['nama'];
				$nestedData['no_hp'] = $r['no_hp'];
				$nestedData['aksi'] = "
				<a href='#view".$r['id']."' class='btn btn-info view_data1' name='view1' value='".$r['id']."' id='".$r['id']."'>Cek Data</a>
				<a href='#ubah".$r['id']."' id='".$r['id']."' class='btn btn-warning'>Ubah</a>
				<a href='#hapus".$r['id']."' id='".$r['id']."' class='btn btn-danger'>Hapus</a>
				";
				$data[] = $nestedData;
				$no++;
			}
		}
		  
		$json_data = array(
					"draw"			=> intval($_POST['draw']),  
					"recordsTotal"	=> intval($totalData),  
					"recordsFiltered" => intval($totalFiltered), 
					"data"			=> $data   
					);
			
		echo json_encode($json_data); 

}