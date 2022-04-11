$(function () {
  var sPositions = localStorage.positions || "{}",
    positions = JSON.parse(sPositions);
  $.each(positions, function (id, pos) {
    $("#" + id).css(pos);
  });
  $("#todo").draggable({
    scroll: false,
    stop: function (event, ui) {
      positions[this.id] = ui.position;
      localStorage.positions = JSON.stringify(positions);
    },
  });
});
