;(function( $, window, document, undefined ){
	'use strict';

	var elSelector		= '.navigator',
		$element		= $( elSelector );

	if(!$element.length) return true;

	var elHeight		= 0,
		elTop			= 0,
		$document		= $( document ),
		dHeight			= 0,
		$window			= $( window ),
		wHeight			= 0,
		wScrollCurrent	= 0,
		wScrollBefore	= 0,
		wScrollDiff		= 0;

	$window.on( 'scroll', function(){
		elHeight		= $element.outerHeight();
		dHeight			= $document.height();
		wHeight			= $window.height();
		wScrollCurrent	= $window.scrollTop();
		wScrollDiff		= wScrollBefore - wScrollCurrent;
		elTop			= parseInt( $element.css( 'top' ) ) + wScrollDiff;

		if( wScrollCurrent <= 0 ) // scrolled to the very top; element sticks to the top
			$element.css( 'top', 0 );

		else if( wScrollDiff > 0 ) // scrolled up; element slides in
			$element.css( 'top', elTop > 0 ? 0 : elTop );

		else if( wScrollDiff < 0 ){
			if( wScrollCurrent + wHeight >= dHeight - elHeight )  // scrolled to the very bottom; element slides in
				$element.css( 'top', ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 );

			else // scrolled down; element slides out
				$element.css( 'top', Math.abs( elTop ) > elHeight ? -elHeight : elTop );
		}

		wScrollBefore = wScrollCurrent;
	});
})( jQuery, window, document );

function getDocHeight(){
	var D = document;

	return Math.max(
		D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}