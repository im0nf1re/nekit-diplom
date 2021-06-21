let monuments = {
  run() {
    $(document).on('mouseenter', '.graits', function() {
      var  i = $(".graits").index(this);
      $(".name").stop().not($(".name").eq(i).show()).hide()
      $(".preview_img_path").stop().not($(".preview_img_path").eq(i).show()).hide()
    });
    $(document).on('mouseleave', '.graits', function() {
      var  i = $(".graits").index(this);
      $(".name").stop().not($(".name").eq(i).hide()).hide()
      $(".preview_img_path").stop().not($(".preview_img_path").eq(i).hide()).hide()
    });
  }
}


module.exports = monuments;
