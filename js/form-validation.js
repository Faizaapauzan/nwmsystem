// check Employee ID in database (staff)

function EmployeeIDlAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "staffindex.php",
    data: "employee_id=" + $("#employee_id").val(),
    type: "POST",
    success: function (data) {
      $("#employeeID-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

// verify phone number (staff,customer)

// var re = /^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/;
// function testInfo(phoneInput) {
//   var OK = re.exec(phoneInput.value);
//   var out = document.querySelector("#out");
//   if (!OK) {
//     out.textContent = `Please enter a correct number`;
//     document.getElementById("submit").disabled = true;
//   } else {
//     out.textContent = ``;
//     document.getElementById("submit").disabled = false;
//   }
// }

// verify email (staff)

function ValidateEmail(staff_email) {
  var mailformat =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
  if (staff_email.value.match(mailformat)) {
    document.getElementById("alert").innerHTML = "";
    return true;
  } else {
    document.getElementById("alert").innerHTML = "Please Enter a Valid Email";
    return false;
  }
}

// verify password (staff)

function validatepassword() {
  //collect form data in JavaScript variables
  var password = document.getElementById("password").value;

  //check empty password field
  if (password == "") {
    document.getElementById("message1").innerHTML = "Please Fill in Password";
    return false;
  }

  //minimum password length validation
  if (password.length < 8) {
    document.getElementById("message1").innerHTML =
      "Must be atleast 8 characters";
    return false;
  }

  if (password.length >= 8) {
    document.getElementById("message1").innerHTML = "";
    return true;
  }

  //maximum length of password validation
  if (password.length > 15) {
    document.getElementById("message1").innerHTML =
      "Password must not exceed 15 characters";
    return false;
  }
}

// check customer code in database (customer)

function checkcustomer_codelAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "customerindex.php",
    data: "customer_code=" + $("#customer_code").val(),
    type: "POST",
    success: function (data) {
      $("#customer_code-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check machine code in database (machine)

function checkMachineCodelAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "machineindex.php",
    data: "machine_code=" + $("#machine_code").val(),
    type: "POST",
    success: function (data) {
      $("#machine_code-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check accessories code in database (accessories)

function checkAccessoriesCodelAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "accessoriesindex.php",
    data: "accessories_code=" + $("#accessories_code").val(),
    type: "POST",
    success: function (data) {
      $("#accessories_code-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

//check job code in database (job)

function checkJobCodelAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "jobtypeindex.php",
    data: "job_code=" + $("#job_code").val(),
    type: "POST",
    success: function (data) {
      $("#job_code-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}
