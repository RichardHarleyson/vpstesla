$(document).ready(function(){
	$('.carousel_desktop').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: '<a class="position-absolute" style="top: 50%; left: -50px;"><i class="fas fa-chevron-left fa-2x text-d"></i></a>',
		nextArrow: '<a class="position-absolute" style="top: 50%; right: -50px;"><i class="fas fa-chevron-right fa-2x text-d"></i></a>',
		// prevArrow: '#btn_prev',
		// nextArrow: '#btn_next',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	]
	});
});

function testdrive_send(){
	var data = $('#testdrive_form').serialize();
	$.ajax({
		type: 'POST',
		url: '/scripts/mail_sender.php',
		data: data,
		success: function(res){
			if(res == '1'){
				$('.test_drive_status').html('<h3>Сейчас Перезвоним</h3>')
			}else{

			}
		}
	})
}
