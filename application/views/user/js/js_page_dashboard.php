<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#dtSiswa").DataTable({
			"processing": true,
			// "ajax": {
			// 	"url": "<?= base_url('user/dashboard/list_data/') ?>",
			// 	"type": "POST"
			// }
		});
		$("#dtPengajar").DataTable({
			"processing": true,
			// "ajax": {
			// 	"url": "<?= base_url('user/dashboard/list_data/') ?>",
			// 	"type": "POST"
			// }
		});
		// $.ajax({
		// 	url: "<?= base_url('user/dashboard/get_total_bug_reported/') ?>",
		// 	type: "GET",
		// 	dataType: "json",
		// 	success:function(data) {
		// 		$("#bug_reported").text(data);
		// 	}
		// });
		// $.ajax({
		// 	url: "<?= base_url('user/dashboard/get_total_bug_unresolved/') ?>",
		// 	type: "GET",
		// 	dataType: "json",
		// 	success:function(data) {
		// 		$("#bug_unresolved").text(data);
		// 	}
		// });
		// $.ajax({
		// 	url: "<?= base_url('user/dashboard/get_total_bug_resolved/') ?>",
		// 	type: "GET",
		// 	dataType: "json",
		// 	success:function(data) {
		// 		$("#bug_resolved").text(data);
		// 	}
		// });
		// $.ajax({
		// 	url: "<?= base_url('user/dashboard/get_total_bug_percentage/') ?>",
		// 	type: "GET",
		// 	dataType: "json",
		// 	success:function(data) {
		// 		$("#work_percentage").text(data);
		// 	}
		// });
	});
</script>