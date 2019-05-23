$(document).ready(function() {

	$(".deleteImage").on('click',  function(e) {
		console.log("HERE I AM");
		e.preventDefault();
		var id = $(this).attr('id');

		$(this).remove();
		document.getElementById(id).remove();
		var data = document.getElementsByClassName("imagePreview").innerHTML;
		document.getElementsByClassName("imagePreview").innerHTML = data;

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax(
		{
			url: 'edit/removeImage',
			method: "post",
			data: {id:id},
			success: function(data) {
				console.log(data);
				$("#id").remove();
			}
		})


	});

	$(".btn-like").on('click',  function(e) {
		console.log("like btn pressed");
		e.preventDefault();
		var id = $(this).attr('id');
		console.log(id);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax(
		{
			url: id+'/like',
			method: "post",
			data: {id:id},
			success: function(data) {
				console.log(data);
				document.getElementById('heartImg').src = '/images/'+data+'.png';
			}
		})

	});
});