$(document).ready(function () {
  var left = document.querySelector(".btn-left");
  var right = document.querySelector(".btn-right");
  var count = 0;

  $("#btn-ok").click(function () {
    $("#alert").hide();
  });
  let background = $(".hinh-tren").data("background");

  $(".hinh-tren").css("background-image", "url(" + background + ")");
  if (typeof right != "undefined" && right != null) {
    left.addEventListener("click", function () {
      var banner2 = document.querySelector("#slider .img");
      count += 100 / 3;
      if (count == 100 / 3) {
        count = (-100 / 3) * 2;
      }
      banner2.style.transform = `translateX(${count}%)`;
    });

    right.click(nextClick());
    function nextClick() {
      var banner2 = document.querySelector("#slider .img");
      count -= 100 / 3;
      if (count == -100) {
        count = 0;
      }
      banner2.style.transform = `translateX(${count}%)`;
    }

    setInterval(() => {
      nextClick();
    }, 3000);
  }
  $("#dk-btn").click(function () {
    $("#form-dn").hide();
    $("#form-dk").show();
    $(this).addClass("active");
    $("#dn-btn").removeClass("active");
  });
  $("#dn-btn").click(function () {
    $("#form-dk").hide();
    $("#form-dn").show();
    $(this).addClass("active");
    $("#dk-btn").removeClass("active");
  });
  $("#mo-ta").click(function () {
    $("#noi-dung-danh-gia").hide();
    $("#noi-dung-mo-ta").show();
    $(this).addClass("active");
    $("#danh-gia").removeClass("active");
  });
  $("#danh-gia").click(function () {
    $("#noi-dung-mo-ta").hide();
    $("#noi-dung-danh-gia").show();
    $(this).addClass("active");
    $("#mo-ta").removeClass("active");
  });
  $("#id-login").validate({
    onfocusout: true,
    onkeyup: true,
    onclick: true,
    rules: {
      ma_kh: {
        required: true,
        maxlength: 15,
      },
      mat_khau: {
        required: true,
        minlength: 6,
      },
    },
    messages: {
      ma_kh: {
        required: "Bắt buộc nhập ",
        maxlength: "Hãy nhập tối đa 15 ký tự",
      },
      mat_khau: {
        required: "Bắt buộc nhập mật khẩu",
        ninlenhth: "ít nhất 6 kí tự",
      },
    },
  });
});
