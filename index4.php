<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

		<!-- tambahan -->
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
		<!-- tambahan -->
		<title>Kontak</title>
	</head>
	<body>
		
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-12">
				<h1>Data Kontak</h1>
			</div>	
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Nomor HP</th>
								<th scope="col">aksi</th>
							</tr>
						</thead>
						<tbody>
							<!-- List Data Menggunakan DataTable -->							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
	</div>



	<!-- modal detail-->
	<div id="dataModal1" class="modal fade">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" style="color:blue;text-align:center;font-style:bold;">Detail Item</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body" id="Detail1">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
					</div>
				</div>
		</div>
	</div> 
	<!-- modal detail -->










		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
		<!-- tambahan -->
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>



		


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<!-- tambahan -->
<script>
$(function(){
	$('.table').DataTable({
		"dom": 'Blfrtip',
		"buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
		"pagingType": "numbers",
		"lengthMenu": [ [10, 25, 50, 1000, -1], [10, 25, 50, 1000, "All"] ],
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"bAutoWidth": false,
		"ajax":{
					 "url": "ajax/ajax_kontak.php?action=table_data",
					 "dataType": "json",
					 "type": "POST"
				 },
		"columns": [
			{ "data": "no" },
			{ "data": "nama" },
			{ "data": "no_hp" },
			{ "data": "aksi" },
		]	
	});
});
</script>
<script type="text/javascript">
		$(document).on('click', '.view_data1', function(){
		var row_id = $(this).attr("id");
			if(row_id != '')
			{
				$.ajax({
					url:"ajax/detail-modal.php",
					method:"POST",
					data:{id:row_id},
					success:function(data){
						$('#Detail1').html(data);
						$('#dataModal1').modal('show');
						}
					});
			}
		});
</script>
</body>
</html>