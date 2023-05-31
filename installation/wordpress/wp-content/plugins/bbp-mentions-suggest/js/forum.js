jQuery(document).ready(function($) {
	/* necessary to get @ mentions working in the tinyMCE on the forums */
	window.onload = function() { 
	      my_timing = setInterval(function(){myTimer();},1000);
	      function myTimer() {
	        if (typeof window.tinyMCE !== 'undefined' && window.tinyMCE.activeEditor !== null && typeof window.tinyMCE.activeEditor !== 'undefined') {  
		        $( window.tinyMCE.activeEditor.contentDocument.activeElement )
					.atwho( 'setIframe', $( '.wp-editor-wrap iframe' )[0] )
					.bp_mentions( bp.mentions.users );
				 window.clearInterval(my_timing);
		    }
	      }
	      myTimer();
	};
})