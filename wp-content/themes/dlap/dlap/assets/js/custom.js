/* eslint-disable no-unused-vars */
const donutPercentage = ( value ) => {
	return '<div class="numbers-small">' + value + '<span class="symbols-small">%</span></div>';
}
function toggleDropdown( e ) {
	const parent = e.target.closest( '.tile-dropdown' )
	if ( parent.classList.contains( 'closed' ) ) {
		parent.classList.remove( 'closed' )
		parent.classList.add( 'opened' )
	} else {
		parent.classList.remove( 'opened' )
		parent.classList.add( 'closed' )
	}
}
