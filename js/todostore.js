const all_status3 = document.querySelectorAll(".staff_form1");

// Tech page drag and drop
const all_status4 = document.querySelectorAll(".column");
const card = document.querySelectorAll(".card");

let draggableTodo = null;

// Tech page drag and drop
card.forEach((cards) => {
  cards.addEventListener("dragstart", dragStart);
  cards.addEventListener("dragend", dragEnd);
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

// Tech page drag and drop
all_status4.forEach((all_status4) => {
  all_status4.addEventListener("dragover", dragOver);
  all_status4.addEventListener("dragenter", dragEnter);
  all_status4.addEventListener("draleave", dragLeave);
  all_status4.addEventListener("drop", dragDrop);
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
  this.prepend(draggableTodo);
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

function createTodo() {
  const todo_div = document.createElement("div");
  const input_val = document.getElementById("customer_Name").value;
  const txt = document.createTextNode(input_val);

  todo_div.prepend(txt);
  todo_div.classList("todo");
  todo_div.setAttribute("draggable", "true");

  /*create span*/
  const span = document.createElement("span");
  const span_txt = document.createTextNode("\u00D7");
  span.classList.add("toDoClose");
  span.prepend(span_txt);

  todo_div.prepend(span);

  no_status.prepend(todo_div);

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
