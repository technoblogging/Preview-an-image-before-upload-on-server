<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    $("#imagefile").change(function (){
         $("#img").show();
         $("#img").attr("src",'test.gif');
         if (typeof(FileReader)!="undefined"){
           
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png)$/;
            $($(this)[0].files).each(function () {
                 var getfile = $(this);
                 if (regex.test(getfile[0].name.toLowerCase())) {
                     var reader = new FileReader();
                     reader.onload = function (e) {
                         $("#img").attr("src",e.target.result);
                     }
                     reader.readAsDataURL(getfile[0]);
                 } else {
                     alert(getfile[0].name + " is not image file.");
                     return false;
                 }
            });
         }
         else {
             alert("Browser does not supportFileReader.");
         }
    });
});
</script>
<div>
      <input id="imagefile" type="file" multiple="multiple" />
      <div id="showfile"><img src="" width="200" height="200" id="img" style="display: none;"></div>
</div>