// check customer code in database (customer)

function checkcustomer_code_registerlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobregisterindex.php",
    data: "customer_code=" + $("#customer_code").val(),
    type: "POST",
    success: function (data) {
      $("#customer_code_register-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

// verify phone number (customer)

// var re = /^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/;
// function testInfo(phoneInput) {
//   var OK = re.exec(phoneInput.value);
//   var out = document.querySelector("#out");
//   if (!OK) {
//     out.textContent = `Please enter a correct number`;
//     document.getElementById("btnNext1").disabled = true;
//   } else {
//     out.textContent = ``;
//     document.getElementById("btnNext1").disabled = false;
//   }
// }

// check Job order number in database (job)

function job_order_number_registerlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobregisterindex.php",
    data: "job_order_number=" + $("#job_order_number").val(),
    type: "POST",
    success: function (data) {
      $("#job_order_number_register-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check job code in database (job)

function checkJobCode_registerlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobregisterindex.php",
    data: "job_code=" + $("#job_code").val(),
    type: "POST",
    success: function (data) {
      $("#job_code_register-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check machine code in database (machine)

function checkMachineCode_registerlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobregisterindex.php",
    data: "machine_code=" + $("#machine_code").val(),
    type: "POST",
    success: function (data) {
      $("#machine_code_register-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check accessories code in database (accessories)

function checkAccessoriesCode_registerlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobregisterindex.php",
    data: "accessories_code=" + $("#accessories_code").val(),
    type: "POST",
    success: function (data) {
      $("#accessories_code_register-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//for jobInfo1

// function btnActivation() {
//   if (document.getElementById("customer_address").value === "") {
//     document.getElementById("btnNext1").disabled = true;
//   } else {
//     document.getElementById("btnNext1").disabled = false;
//   }
// }

//for jobInfo 2

// function success() {
//   if (document.getElementById("compulsary").value === "") {
//     document.getElementById("btnNext2").disabled = true;
//   } else {
//     document.getElementById("btnNext2").disabled = false;
//   }
// }

//radio button

// $(function () {
//   $("input[type='radio']").change(function () {
//     $("input[type='submit']").prop("disabled", false);
//   });
// });
