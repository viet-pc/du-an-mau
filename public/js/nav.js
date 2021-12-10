$().ready(function () {
  let btn_close = $(".btn-close");
  let block_update = $("#update");
  let block_phu = $("#phu");

  $("#btn-update-tt").click(function () {
    $("#update-tt").show();
    $("#change_pass").hide();
    $("#btn-doi-pass").removeClass("active");
    $(this).addClass("active");
  });
  $("#btn-doi-pass").click(function () {
    $("#update-tt").hide();
    $("#change_pass").show();
    $("#btn-update-tt").removeClass("active");
    $(this).addClass("active");
  });

  function hide_all() {
    block_update.hide();
    block_phu.hide();
  }
  function show_all() {
    block_update.css("display", "flex");
    block_phu.css("display", "flex");
  }
  btn_close.click(function () {
    hide_all();
  });
  block_phu.click(function () {
    hide_all();
  });

  $(".btn_cap_nhat_tai_khoan").each(function () {
    $(this).click(function (e) {
      e.preventDefault();
      show_all();
    });
  });

  $.validator.addMethod("alpha", function (value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
  });
  $("#update-tt").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
      ho_ten: {
        alpha: true,
        required: true,
        maxlength: 15,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      "re-password": {
        equalTo: "#password",
        minlength: 6,
      },
    },
    messages: {
      ho_ten: {
        alpha: "Chỉ chứa alphabet và ký tự trắng",
        required: "Bắt buộc nhập họ tên",
        maxlength: "Hãy nhập tối đa 15 ký tự",
      },
      email: {
        required: "Bắt buộc nhập email",
        email: "Hay nhập đung email",
      },
      password: {
        required: "Bắt buộc nhập password",
        minlength: "Hãy nhập ít nhất 6 ký tự",
      },
      "re-password": {
        equalTo: "Hai password phải giống nhau",
        minlength: "Hãy nhập ít nhất 6 ký tự",
      },
    },
  });
  $("#change_pass").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
      mat_khau_cu: {
        required: true,
      },
      mat_khau_moi: {
        required: true,
        minlength: 6,
      },
      mat_khau_xn: {
        equalTo: "#mat_khau_moi",
        minlength: 6,
      },
    },
    messages: {
      mat_khau_cu: {
        required: "Bắt buộc nhập ",
      },
      mat_khau_moi: {
        required: "Bắt buộc nhập password",
        minlength: "Hãy nhập ít nhất 6 ký tự",
      },
      mat_khau_xn: {
        equalTo: "Hai password phải giống nhau",
        minlength: "Hãy nhập ít nhất 6 ký tự",
      },
    },
  });
});
