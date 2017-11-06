<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>
  
<form  method="POST" action="<?=my_site_url(common_uri."/upload_photo")?>" enctype='multipart/form-data'>
    <input id="fileInput"type='file' name='photo'/>
    <input id="fileSubmit"type="submit" style="display:none;">
</form>

<img id="img_photo" src="<?=$photo?>">


<script>
    window.onload= function(){
        var doc=parent.document;
        var photo =doc.querySelector('input[name=photo]');
        if("<?=$photo?>" == ""){
            document.getElementById('img_photo').setAttribute('src',photo.value);
            
        }else{
            photo.value ="<?=$photo?>";
        }

        var inputFile =document.querySelector('input[name=photo]');
        inputFile.onchange = function(){
            document.getElementsByTagName('form')[0].submit();
        }
    }
</script>