$(document).ready(function () {
  $(".register-buttton").click(function (e) {
    e.preventDefault();
    $(".registred").slideDown(600);
    $(".wrapper").slideUp(600);
  });

  $(".reset").click(function (e) {
    e.preventDefault();
    $(".registred").slideUp(600);
    $(".wrapper").slideDown(600);
    // $(".register--content").show();
    // $(".registred").show();
  });

  $(".btn").click(function (e) {
    e.preventDefault();
    $(".text-login").hide();
    $(".text-register").show();

    $(".login--content").slideDown(600);
    $(".register--content").slideUp(600);
  });

  $(".btn-reg").click(function (e) {
    e.preventDefault();
    $(".text-register").hide();
    $(".text-login").show();
    $(".login--content").slideUp(600);
    $(".register--content").slideDown(600);
  });
  if ($("#dangnhap").length) {
    $(".login--content").slideDown(600);
    $(".register--content").slideUp(600);
  }
  if ($("#dangky").length) {
    $(".login--content").slideUp(600);
    $(".register--content").slideDown(600);
  }
  if ($("#laylaimatkhau").length) {
    $(".registred").slideDown(600);
    $(".wrapper").slideUp(600);
    // $("registred").show();
    // $("register--content").show();
  }
  $.validator.addMethod("alpha", function (value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
  });
  $("#id-register").validate({
    onfocusout: true,
    onkeyup: true,
    onclick: true,
    rules: {
      ma_kh: {
        required: true,
        maxlength: 15,
      },
      email: {
        required: true,
        email: true,
      },
      mat_khau: {
        required: true,
        minlength: 6,
      },
      ho_ten: {
        alpha: true,
        required: true,
        maxlength: 15,
      },
      xac_nhan_mat_khau: {
        equalTo: "#mat_khau",
        minlength: 6,
      },
    },
    messages: {
      ma_kh: {
        required: "Bắt buộc nhập ",
        maxlength: "Hãy nhập tối đa 15 ký tự",
      },
      ho_ten: {
        alpha: "Chỉ chứa alphabet và ký tự trắng",
        required: "Bắt buộc nhập họ tên",
        maxlength: "Hãy nhập tối đa 15 ký tự",
      },
      email: {
        required: "Bắt buộc nhập email",
        email: "Hay nhập đung email",
      },
      mat_khau: {
        required: "Bắt buộc nhập mật khẩu",
        ninlenhth: "ít nhất 6 kí tự",
      },
      xac_nhan_mat_khau: {
        required: "Bắt buộc nhập lại mật khẩu",
        equalTo: "Hai mat_khau phải giống nhau",
        minlength: "Hãy nhập ít nhất 6 ký tự",
      },
    },
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
