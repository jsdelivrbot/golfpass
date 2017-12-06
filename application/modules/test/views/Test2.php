<div id="test1">1</div>
<div id="test2">2</div>
<div id="test3">3</div>

<div id="sw">btn</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script>
      
      var $test1 = $("#test1");
      $("#sw").click(function(){
        //   $test1.attr("id","test2");
        $("#test1").attr("id","test2");
      });
      t();
function t(){

  $test1.click(function(){
        var text =$(this).text();
        console.log(text+"/1");
        console.log($test1);
        $test1 = $("#test1");
        $(this).off();
        t();
  });
}
  $("#test2").click(function(){
    var text =$(this).text();
      console.log(text+"/2");
  });
  $("#test3").click(function(){
    var text =$(this).text();
      console.log(text+"/3");
  });
  </script>
