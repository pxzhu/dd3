function checkAll() {
  if($("#checkAll").is(':checked')) {
    $("input[name=checkRow]").prop("checked", true);
  } else {
    $("input[name=checkRow]").prop("checked", false);
  }
  $("input:checkbox[name=checkRow]").length
  $("input:checkbox[name=checkRow]:checked").length
  $("input:checkbox[name=checkRow]").each(function() {
    this.checked = true;
  });
}
function checked() {
  $("input:checkbox[name=checkRow]:checked").length
}