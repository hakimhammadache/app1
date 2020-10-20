 
$('#type').on('show.bs.modal', function (event) {
 	var button = $(event.relatedTarget) // Button that triggered the modal
	var title =button.data('title')
	var libelle = button.data('libelle')
	var url = button.data('url')



	var modal = $(this)
	modal.find("#libelle").val(libelle)
	modal.find('#typeform').attr('action',url)
	modal.find('.modal-title').text(title)

})


