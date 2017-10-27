<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>
  
<form  method="POST" action="<?=my_site_url(user_uri."/profilePhoto_upload")?>" enctype='multipart/form-data'>
    <input id="fileInput"type='file' name='profilePhoto'/>
    <input id="fileSubmit"type="submit" style="display:none;">
</form>

<img id="img_profilePhoto" src="<?=$profilePhoto?>">




<script>
    window.onload= function(){
        var doc=parent.document;
        var profilePhoto =doc.querySelector('input[name=profilePhoto]');
        if("<?=$profilePhoto?>" == ""){
            document.getElementById('img_profilePhoto').setAttribute('src',profilePhoto.value);
            
        }else{
            profilePhoto.value ="<?=$profilePhoto?>";
        }

        var inputFile =document.querySelector('input[name=profilePhoto]');
        inputFile.onchange = function(){
            document.getElementsByTagName('form')[0].submit();
        }
    }
</script>