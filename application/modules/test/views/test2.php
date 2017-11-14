<!DOCTYPE html>
<html>
<body>
  <!-- <form  action="<?=site_url("/test/gets_geocode_name")?>" method="post"> -->
  <form onsubmit="ajax_submit(this); return false;" action="<?=site_url("/test/get_marker")?>" method="post">
    <input type="text" name="search">
    <input type="submit" value="주소검색">
  </form>
<div id="map" style="width:100%;height:500px;"></div>

<form action="">
<input type="text" name="address">
<input type="text" name="lat">
<input type="text" name="lng">
<input type="submit" value="위치저장">
</form>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

<script src="<?=domain_url('/public/js/common.js')?>"></script>
<script src="<?=domain_url('/public/js/google_map.js')?>"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<?=$this->map_api->create_script()?>

