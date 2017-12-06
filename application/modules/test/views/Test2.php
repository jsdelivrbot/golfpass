
<div id="wapper">
<div class="test1">1</div>
<div class="test2">2</div>
<div class="test3">3</div>
</div>
<div id="sw">btn</div>

<div id="test1" class="test1">1</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script>
var $wapper = $("#wapper");  
var $test1 = $(".test1");
var $test = $("#test1");
$("#sw").click(function(){
    
    //   $test1.attr("id","test2");
    // $(".test1").attr("id","test2");
});
t();
function t(){

  $test1.click(function(){
    var $clone = $test.clone();
    $wapper.append($clone);
        var text =$(this).text();
      
        // $test1 = $(".test1");
        reset();
        console.log($test1);
        $test1.off();
        t();
  });
}
function reset()
{
    $test1 = $(".test1");
}
  $(".test2").click(function(){
    var text =$(this).text();
      console.log(text+"/2");
  });
  $(".test3").click(function(){
    var text =$(this).text();
      console.log(text+"/3");
  });
  </script>
