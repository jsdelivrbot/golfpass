<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="<?=domain_url("/public/lib/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js")?>"></script>
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/ion.rangeSlider.css")?>" />
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/normalize.css")?>" />
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/ion.rangeSlider.skinHTML5.css")?>" />

<form action="">
<input type="text" id="example_id" name="example_name" value="" />
<input type="submit">
</form>

<script>
$("#example_id").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 40,
    from: 1,
    to: 1
});

// $("#example_id").ionRangeSlider();
</script>