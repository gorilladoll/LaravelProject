$(function(){
  $(".Child").hide();
  setInterval(function(){
    var form_control = $(".Parent").val();
    if(form_control == "made"){
      $(".Child").show();
    } else {
      $(".Child").hide();
    }
  },1000);
});
