
$('#docform').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var nom = button.data('nom') 
	var title =button.data('title')
	var typedoc = button.data('typedoc') // Extract info from data-* attributes
	var etab = button.data('etab')
	var bien=button.data('bien')
	var url = button.data('url')
	var enctype = button.data('enctype')
	var value = button.data('value')
	console.log(nom)
	console.log(typedoc)
	console.log(etab)
	console.log(enctype)
	console.log(value)
	var modal = $(this)
	modal.find("#nom_doc").val(nom)
	modal.find("#id_bien").val(bien)
	modal.find("#id_bien_mob").prop('disabled', bien)
	modal.find('select[name=id_type_doc] option[value="'+typedoc+'"]').prop('selected',true)
	modal.find('select[name=id_etab] option[value="'+etab+'"]').prop('selected',true)
	modal.find('#focrmdoc').attr('action',url)
	modal.find('#focrmdoc').attr('enctype',enctype)
	modal.find("#doc_in").prop('disabled', value)
	modal.find('.modal-title').text(title)
})

