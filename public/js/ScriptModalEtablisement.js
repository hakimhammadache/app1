
$('#formmodale').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) // Button that triggered the modal
	var nom = button.data('nom')
	var title =button.data('title')
	var commune = button.data('commune') // Extract info from data-* attributes
	var natur = button.data('natur') 
	var etatph = button.data('etatph')
	var localisationlat = button.data('localisationlat')
	var localisationlng = button.data('localisationlng');
	var url = button.data('url')
	console.log(localisationlat)
	console.log(nom)
	console.log(commune)
	console.log(natur)
	console.log(etatph)
	console.log(url)
	var modal = $(this)
	modal.find("#nom_etab").val(nom)
	modal.find("#localisation_lng").val(localisationlng)
	modal.find("#localisation_lat").val(localisationlat)
	modal.find('select[name=id_commune] option[value="'+commune+'"]').prop('selected',true)
	modal.find('#formidE').attr('action',url)
	modal.find('.modal-title').text(title)
})
