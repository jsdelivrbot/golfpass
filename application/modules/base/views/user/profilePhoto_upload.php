<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">


<!-- <div class="ui middle aligned center aligned grid"> -->
<!-- <div class="ui aligned aligned grid"> -->
<div class="ui centered grid ">
<div class="column">
<div class="ui small image">
<img id="img_profilePhoto" src="<?=$profilePhoto?>" style="height:110px;">
                
</div>


<form  method="POST" action="<?=my_site_url(user_uri."/profilePhoto_upload")?>" enctype='multipart/form-data'>
<div style="margin-top:2px;">
<label for="fileInput" class="ui icon button basic gray"style="font-size:13.3px;" >
    <i class="upload  icon"></i>
    프로필 사진 업로드</label>
<input id="fileInput"  name='profilePhoto' type="file" style="display:none">
</div>   
<!-- <input id="fileInput"type='file' name='profilePhoto' /> -->
    <input  id="fileSubmit"type="submit" style="display:none;">
</form>
</div>
</div>




<script>
    window.onload= function(){
        var doc=parent.document;
        var profilePhoto =doc.querySelector('input[name=profilePhoto]');
        if("<?=$profilePhoto?>" === "" && profilePhoto.value === "")
        {
           
            document.getElementById('img_profilePhoto').setAttribute('src'," https://semantic-ui.com/images/wireframe/image.png");
        }
        else if("<?=$profilePhoto?>" === "")
        {
            document.getElementById('img_profilePhoto').setAttribute('src',profilePhoto.value);
        }
        else
        {
            profilePhoto.value ="<?=$profilePhoto?>";
        }

        var inputFile =document.querySelector('input[name=profilePhoto]');
        inputFile.onchange = function(){
            document.getElementsByTagName('form')[0].submit();
        }
    }
</script>