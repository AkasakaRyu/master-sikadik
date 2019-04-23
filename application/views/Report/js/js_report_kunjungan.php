<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		fetch_data();
		function fetch_data(is_date_search, tgl_awal='', tgl_akhir='') {
			var dtTable = $('#dtTable').DataTable({
				"processing": true,
				"ajax": {
					"url": "<?= base_url('report/kunjungan/list_data') ?>",
					"type": "POST",
					"data" : {is_date_search:is_date_search, tgl_awal:tgl_awal, tgl_akhir:tgl_akhir}
				},
				"autoWidth": false,
				"info": true,
				"ordering": true,
				"paging": true,
				"pageLength": 5,
				"lengthChange": false,
				"searching": true,
				"dom": "Bfrtip",
				"buttons": [
					'copy', 'excel', 'pdf', 'print'
				]
			});
		}
		$('#filter').click(function(){
			var tgl_awal = $('#tgl_awal').val();
			var tgl_akhir = $('#tgl_akhir').val();
			if(tgl_awal != '' && tgl_akhir !='') {
				$('#dtTable').DataTable().destroy();
				$('#dtTable tbody').empty();
				fetch_data('yes', tgl_awal, tgl_akhir);
			} else {
				alert("Both Date is Required");
			}
		}); 
	});
</script>