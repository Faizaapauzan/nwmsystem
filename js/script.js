$(document).ready(function () {
  // form autocomplete off
  $(":input").attr("autocomplete", "off");

  // remove box shadow from all text input
  $(":input").css("box-shadow", "none");

  // save button click function
  $("#submit").click(function () {
    // calling validate function
    var response = validateForm();

    // if form validation fails
    if (response == 0) {
      return;
    }

    // getting all form data
    var customer_code = $("#customer_code").val();
    var customer_name = $("#customer_name").val();
    var customer_grade = $("#customer_grade").val();
    var customer_PIC = $("#customer_PIC").val();
    var customer_phone = $("#customer_phone").val();
    var customer_address = $("#customer_address").val();

    // sending ajax request
    $.ajax({
      url: "./add-customer.php",
      type: "post",
      data: {
        customer_code: customer_code,
        customer_name: customer_name,
        customer_grade: customer_grade,
        customer_PIC: customer_PIC,
        customer_phone: customer_phone,
        customer_address: customer_address,
        save: 1,
      },

      // before ajax request
      beforeSend: function () {
        $("#result").html("<p class='text-success'> Please wait.. </p>");
      },

      // on success response
      success: function (response) {
        $("#result").html(response);

        // reset form fields
        $("#regForm")[0].reset();
      },

      // error response
      error: function (e) {
        $("#result").html("Some error encountered.");
      },
    });
  });

  // ------------- form validation -----------------

  function validateForm() {
    // removing span text before message
    $("#error").remove();

    // validating input if empty
    if ($("#customer_code").val() == "") {
      $("#customer_code").after(
        "<span id='error' class='text-danger'> Enter customer code </span>"
      );
      return 0;
    }

    if ($("#customer_name").val() == "") {
      $("#customer_name").after(
        "<span id='error' class='text-danger'> Enter customer name </span>"
      );
      return 0;
    }

    if ($("#customer_grade").val() == "") {
      $("#customer_grade").after(
        "<span id='error' class='text-danger'> Enter customer grade </span>"
      );
      return 0;
    }

    if ($("#customer_PIC").val() == "") {
      $("#customer_PIC").after(
        "<span id='error' class='text-danger'> Enter customer PIC </span>"
      );
      return 0;
    }

    if ($("#customer_phone").val() !== $("#customer_phone").val()) {
      $("#customer_phone").after(
        "<span id='error' class='text-danger'> Enter Customer Phone </span>"
      );
      return 0;
    }
    if ($("#customer_address").val() == "") {
      $("#customer_address").after(
        "<span id='error' class='text-danger'> Enter customer address </span>"
      );
      return 0;
    }

    return 1;
  }

  // ------------------- [ Email blur function ] -----------------

  $("#customer_code").blur(function () {
    var customer_code = $("#customer_code").val();

    // if email is empty then return
    if (customer_code == "") {
      return;
    }

    // send ajax request if email is not empty
    $.ajax({
      url: "add-customer.php",
      type: "post",
      data: {
        customer_code: customer_code,
        customer_code_check: 1,
      },

      success: function (response) {
        // clear span before error message
        $("#customer_code_error").remove();

        // adding span after email textbox with error message
        $("#customer_code").after(
          "<span id='customer_code_error' class='text-danger'>" +
            response +
            "</span>"
        );
      },

      error: function (e) {
        $("#result").html("Something went wrong");
      },
    });
  });

  // -----------[ Clear span after clicking on inputs] -----------

  $("#customer_code").keyup(function () {
    $("#error").remove();
    $("span").remove();
  });

  $("#customer_name").keyup(function () {
    $("#error").remove();
  });

  $("#customer_grade").keyup(function () {
    $("#error").remove();
  });

  $("#customer_PIC").keyup(function () {
    $("#error").remove();
  });
  $("#customer_phone").keyup(function () {
    $("#error").remove();
  });
  $("#customer_address").keyup(function () {
    $("#error").remove();
  });
});
