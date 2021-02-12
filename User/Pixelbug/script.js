$("submit").click( function() {
	var data=$("#form_data :input").serializeArray();
	$.post( $("#form_data").attr("action") , data ,function(info){
$("#result").html(info); 
	clearInput();});
	$("#form_data").submit( function() {
		return false;
	}
} );
function clearInput()
{
		$("form_data :input").each(function() {
			$(this).val('');
		});
}