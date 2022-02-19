window.addEventListener( 'DOMContentLoaded', function ( event ) {
	// Show Company Dropdown
	let select_company = document.querySelector( '#invoiceCompany' );
	companies.forEach( function ( company ) {
		select_company.insertAdjacentHTML( 'beforeend', `<option value="${company.id}">${company.company}</option>` );
	} );
	
	// Change Company
	function change_company( company_id ) {
		let current_company = companies.filter( company => company.id == company_id );
		if ( current_company.length == 0 ) {
			alert( 'No Company Found!' );
			return;
		}
		
		document.querySelector( '#company' ).value = current_company[0].company ?? '';
		document.querySelector( '#website' ).value = current_company[0].website ?? '';
		document.querySelector( '#name' ).value = current_company[0].name ?? '';
		document.querySelector( '#email' ).value = current_company[0].email ?? '';
		document.querySelector( '#phone' ).value = current_company[0].phone ?? '';
		document.querySelector( '#address' ).value = current_company[0].address ?? '';
		document.querySelector( '#logo' ).value = current_company[0].logo ?? '';
	}
	
	select_company.addEventListener( 'change', function ( event ) {
		change_company( event.currentTarget.value );
	} );
	
	// Show Client Dropdown
	let select_client = document.querySelector( '#invoiceClient' );
	clients.forEach( function ( client ) {
		select_client.insertAdjacentHTML( 'beforeend', `<option value="${client.id}">${client.company}</option>` );
	} );
	
	// Change Clients
	function change_client( client_id ) {
		let current_client = clients.filter( client => client.id == client_id );
		if ( current_client.length == 0 ) {
			alert( 'No Client Found!' );
			return;
		}
		
		console.log();
		
		document.querySelector( '#clientCompany' ).value = current_client[0].company ?? '';
		document.querySelector( '#clientName' ).value = current_client[0].name ?? '';
//		document.querySelector( '#clientWebsite' ).value = current_client[0].website ?? '';
		document.querySelector( '#clientEmail' ).value = current_client[0].email ?? '';
		document.querySelector( '#clientPhone' ).value = current_client[0].phone ?? '';
		document.querySelector( '#clientAddress' ).value = current_client[0].address ?? '';
		document.querySelector( '#clientAddress_2' ).value = current_client[0].address_2 ?? '';
	}
	
	select_client.addEventListener( 'change', function ( event ) {
		change_client( event.currentTarget.value );
	} );
	
	// Load Default Company
	change_company( companies[0].id );
//	change_client( clients[0].id );
} );