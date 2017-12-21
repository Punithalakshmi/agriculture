(function($){
  
   
  $(function(){
    
    console.log('Hi, My name is console :)');


    // Home Nav Button
    $('.button-collapse').sideNav();
    
    // Parallax BG Search Section
    $('.parallax').parallax();

    // Initialization
    $('select').material_select();

    $(".dropdown-button").dropdown();
	
	// tab
	
	$('ul.tabs').tabs('select_tab', 'tab_id');

  // $(selector).nextStep();

    // Feed wrap eQual Height
    $('.feed-wrap .feed-e-height').matchHeight();
    $('.top-footer .feed-e-height').matchHeight();
	  $('.c-info .e-height').matchHeight();

    // Step Form
     $('.toc-wrapper').pushpin({ top: $('.toc-wrapper').offset().top, offset: 77 });
     $('.scrollspy').scrollSpy();
     $('.stepper').activateStepper();

 //    $('.variable-width').slick({
	//   dots: true,
	//   infinite: true,
	//   speed: 300,
	//   slidesToShow: 3,
	//   centerMode: true
	//   // variableWidth: true
	// });

	$('.multiple-items').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,

	  // 
	  responsive: [ 
		{
		breakpoint: 600,
			settings: {
			slidesToShow: 1,
			arrows: false,
			dots: true
			}
		}

	  ]

	  // 
	});

	 /**
   *  Show/Hide recover password form
   */
  function toggleRecoverPasswordForm() {
    $('#RecoverPasswordForm').toggleClass('hide');
    $('#CustomerLoginForm').toggleClass('hide');
  }

  /**
   *  Show reset password success message
   */
  function resetPasswordSuccess() {
    var $formState = $('.reset-password-success');

    // check if reset password form was successfully submited.
    if (!$formState.length) {
      return;
    }

    // show success message
    $('#ResetSuccess').removeClass('hide');
  }

  /**
 * Password Template Script
 * ------------------------------------------------------------------------------
 * A file that contains scripts highly couple code to the Password template.
 *
 * @namespace password
 */

theme.customerLogin = (function() {
  var config = {
    recoverPasswordForm: '#RecoverPassword',
    hideRecoverPasswordLink: '#HideRecoverPasswordLink'
  };

  if (!$(config.recoverPasswordForm).length) {
    return;
  }

  checkUrlHash();
  resetPasswordSuccess();

  $(config.recoverPasswordForm).on('click', onShowHidePasswordForm);
  $(config.hideRecoverPasswordLink).on('click', onShowHidePasswordForm);

  function onShowHidePasswordForm(evt) {
    evt.preventDefault();
    toggleRecoverPasswordForm();
  }

  function checkUrlHash() {
    var hash = window.location.hash;

    // Allow deep linking to recover password form
    if (hash === '#recover') {
      toggleRecoverPasswordForm();
    }
  }

  /**
   *  Show/Hide recover password form
   */
  function toggleRecoverPasswordForm() {
    $('#RecoverPasswordForm').toggleClass('hide');
    $('#CustomerLoginForm').toggleClass('hide');
  }

  /**
   *  Show reset password success message
   */
  function resetPasswordSuccess() {
    var $formState = $('.reset-password-success');

    // check if reset password form was successfully submited.
    if (!$formState.length) {
      return;
    }

    // show success message
    $('#ResetSuccess').removeClass('hide');
  }
})();



    

  }); // end of document ready

})(jQuery); // end of jQuery name space


