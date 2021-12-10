$(document).ready(function () {
  $(".check-all").each(function () {
    $(this).click(function (e) {
      e.preventDefault();
      $("tbody input[type=checkbox]").each(function () {
        $(this).attr("checked", true);
      });
    });
  });
  $(".uncheck-all").each(function () {
    $(this).click(function (e) {
      e.preventDefault();
      $("tbody input[type=checkbox]").each(function () {
        $(this).attr("checked", false);
      });
    });
  });
  $(".xoa-n-loai").click(function (e) {
    e.preventDefault();
    $("tbody input[type=checkbox]").each(function () {
      if ($(this).is(":checked")) {
        let parent = $(this).parent().parent();
        parent.remove();
        let value = parent.children(".ma_loai").text();
        $.ajax({
          url: "/xshop/admin/xoaloai/" + value,
          type: "post",
        });
      }
    });
  });
  $(".xoa-n-khach-hang").click(function (e) {
    e.preventDefault();
    $("tbody input[type=checkbox]").each(function () {
      if ($(this).is(":checked")) {
        let parent = $(this).parent().parent();
        parent.remove();
        let value = parent.children(".ma_kh").text();
        $.ajax({
          url: "/xshop/admin/xoakhachhang/" + value,
          type: "post",
        });
      }
    });
  });
  $(".xoa-n-hang-hoa").click(function (e) {
    e.preventDefault();
    $("tbody input[type=checkbox]").each(function () {
      if ($(this).is(":checked")) {
        let parent = $(this).parent().parent();
        parent.remove();
        let value = parent.children(".ma_hang_hoa").text();
        console.log(value);
        $.ajax({
          url: "/xshop/admin/xoahanghoa/" + value,
          type: "post",
        });
      }
    });
  });
  $(".xoa-n-binh_luan").click(function (e) {
    e.preventDefault();
    $("tbody input[type=checkbox]").each(function () {
      if ($(this).is(":checked")) {
        let parent = $(this).parent().parent();
        parent.remove();
        let value = parent.children(".ma_binh_luan").text();
        console.log(value);
        $.ajax({
          url: "/xshop/admin/xoabinhluan/" + value,
          type: "post",
        });
      }
    });
  });
});
