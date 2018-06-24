<script>
	$('.btn.btn-outline-light.btn-sm').click(function () {
		var rankingType = $(this).data('rankingtype');

		$.ajax({
			method: "POST",
			url: "<?=site_url(main_uri . '/ajax_gets_by_ranking')?>",
			data: {rankingType: rankingType},
			beforeSend: function () {
			},
			success: function (data) {
				$("#section5").html(data);
			}
		});

	});
</script>
