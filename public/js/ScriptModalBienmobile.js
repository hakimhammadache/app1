
$('#bmform').on('show.bs.modal', function (event) {
 	var button = $(event.relatedTarget) // Button that triggered the modal
	var nom = button.data('nom')
	var title =button.data('title')
	var numero = button.data('numero')
	var typebm = button.data('typebm') // Extract info from data-* attributes
	var etab = button.data('etab') 
	var etatph = button.data('etatph')
	var pci = button.data('pci')
	var amm = button.data('amm')
	var url = button.data('url')



	var modal = $(this)
	modal.find("#nom_bien").val(nom)
	modal.find ("#numero").val(numero)
	modal.find('select[name=id_type_mob] option[value="'+typebm+'"]').prop('selected',true)
	modal.find('select[name=id_etat_ph] option[value="'+etatph+'"]').prop('selected',true)
	modal.find('select[name=id_etab] option[value="'+etab+'"]').prop('selected',true)
	modal.find('select[name=id_pci] option[value="'+pci+'"]').prop('selected',true)
	modal.find('select[name=id_type_amm] option[value="'+amm+'"]').prop('selected',true)
	modal.find('#formbm').attr('action',url)
	modal.find('.modal-title').text(title)

})


