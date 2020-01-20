$( document ).ready(function() {
	console.log( "ready!" );
	$('#myTabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
	$(function () {
	  $('[data-toggle="popover"]').popover({trigger: 'focus'})
	})
	$(function () {
	  /* Get the text field */
	  $(".mp_txt").hide();
	  $(".mp_button").click(function() {
  		  $(this).siblings('input').toggle();
  		  
		})
	})
	// Img hover
	$(function () {
	  
	  $(".img-show").hide();
	  $(".popup-img").click(function() {
  		  $(this).siblings("div").toggle(); 
		})
	  $(".close-img").click(function() {
  		  $(this).parent("div").hide(); 
		})	
	   $(".img-show").click(function() {
  		  $(this).hide(); 
		})
	})

});