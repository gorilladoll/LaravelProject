$(document).ready(function(){
  $(window).scroll(function(){
    if($(document).scrollTop() > 80){
      console.log("들어옴");
      $('.mylab_navbar').css('position', 'fixed');
      $('.mylab_navbar').css('top', '0');
    } else {
      $('.mylab_navbar').css('position', 'relative');
      $('.mylab_navbar').css('top', '0');
    }
  });


// 2017.06.13 화요일 추가됨------------------------------------
  // 물품등록 시 이미지 미리보기
  $("#goods_img_file").on('change', function(){
      readURL(this);
  });

  var image_data;
  // 이미지 미리보기
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#img_preview').attr('src', e.target.result);
              image_data = e.target.result;
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
});
