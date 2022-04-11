const todos = document.querySelectorAll(".todo");
const all_status = document.querySelectorAll(".box");
const all_status3 = document.querySelectorAll(".staff_form1");
let draggableTodo = null;

// admin page drag and drop

var getPos = JSON.parse(localStorage.getItem("getPos")) ?? [];

getPos.forEach(function (dropped) {
  this.appendChild(draggableTodo);
  console.log("dropped");
});

todos.forEach((todo) => {
  todo.addEventListener("dragstart", dragStart);
  todo.addEventListener("dragend", dragEnd);
});

function dragStart() {
  draggableTodo = this;
  setTimeout(() => {
    this.style.display = "none";
  }, 0);
  console.log("dragStart");
}

function dragEnd() {
  draggableTodo = null;
  setTimeout(() => {
    this.style.display = "block";
  }, 0);
  console.log("dragEnd");
}

all_status.forEach((box) => {
  box.addEventListener("dragover", dragOver);
  box.addEventListener("dragenter", dragEnter);
  box.addEventListener("draleave", dragLeave);
  box.addEventListener("drop", dragDrop);
});

function dragOver(e) {
  e.preventDefault();
  //console.log("dragOver");
}

function dragEnter() {
  console.log("dragEnter");
}

function dragLeave() {
  console.log("dragLeave");
}

function dragDrop() {
  var getPos = JSON.parse(localStorage.getItem("dropped"));
  getPos = $(this).position();
  this.appendChild(draggableTodo);
  localStorage.setItem("dropped", JSON.stringify(getPos));
  console.log("dropped");
}

//Staff page drag and drop
all_status3.forEach((staff_form1) => {
  staff_form1.addEventListener("dragover", dragOver);
  staff_form1.addEventListener("dragenter", dragEnter);
  staff_form1.addEventListener("draleave", dragLeave);
  staff_form1.addEventListener("drop", dragDrop);
});

/* create savebtn*/
const todo_submit = document.getElementById("savebtn");

todo_submit.addEventListener("click", createTodo);

function createTodo() {
  const todo_div = document.createElement("div");
  const input_val = document.getElementById("customer_Name").value;
  const txt = document.createTextNode(input_val);

  todo_div.appendChild(txt);
  todo_div.classList("todo");
  todo_div.setAttribute("draggable", "true");

  /*create span*/
  const span = document.createElement("span");
  const span_txt = document.createTextNode("\u00D7");
  span.classList.add("toDoClose");
  span.appendChild(span_txt);

  todo_div.appendChild(span);

  no_status.appendChild(todo_div);

  span.addEventListener("click", () => {
    span.parentElement.display = "none";
  });
  // console.log(todo_div);

  todo.div.addEventListener("dragstart", dragStart);
  todo.div.addEventListener("dragend", dragEnd);

  document.getElementById("customer_Name").value = "";
  todo_form.classList.remove("active");
  overlay.classList.remove("active");
}

const close_btns = document.querySelectorAll(".close");

close_btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.parentElement.style.display = "none";
  });
});
