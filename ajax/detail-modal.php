<?php  
require_once '../koneksi.php';



if (isset($_POST["id"]))	{

	$output = '';

	
	$result = $mysqli->query("SELECT id,nama,no_hp,ok FROM tbl_kontak WHERE id LIKE'".$_POST["id"]."' order by id");
	// var_dump($result);
	//var_dump($query);
	if(mysqli_num_rows($result) > 0) {
	$output .= '<h3 style="color:blue;text-align:center;font-style:italic;">&nbsp;</h3>
				<div class="table-responsive">
				<table class="table table-bordered" style="width:100%">
				<tr>
				<td style="width:20%"><label>Nama Barang</label></td>
				<td style="width:20%"><label>Ket Barang</label></td>
				<td style="width:20%"><label>Keterangan</label></td>
				<td style="width:20%"><label>Hasil</label></td>
				</tr>';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["nama"].'</td>
				<td>'.$row["no_hp"].'</td>
				<td>
				<div class="checkbox">
				<input type="checkbox" class="preference" value="'.$row["ok"].'" onclick="return false;">
				</div>
				</td>
				</tr>';
				}
	$output .= '</table></div>';
	echo $output;
	} else {
	echo '<h3 style="color:red;text-align:center;font-style:italic;">Tidak ada Data</h3>';
	}

}
?>

<script type="text/javascript">
$(function(){
$('.preference').each(function(e){
	if($(this).val() == 1){
		$(this).attr("checked", "checked");
	}
});
});
</script>