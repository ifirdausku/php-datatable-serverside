<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
		<!-- tambahan -->
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.bootstrap5.min.css">
		<!-- tambahan -->
		<title>Kontak</title>
	</head>
	<body>
		
	<div class="container">
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





<!-- Modal -->
<div class="modal fade" id="dataModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Item</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="Detail1">>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

		<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
		<!-- tambahan -->
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
		<!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script> -->
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>



		


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.0/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.0/vfs_fonts.min.js"></script>
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
		"colReorder": true,
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