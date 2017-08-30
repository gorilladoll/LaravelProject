$(function(){
  $(".seller_add").click(function(){
    var user_id = $(".seller_add").val();
    location.replace('/mylab/seller/add/'+user_id);
  });
});
