$(function() {

    function selectStep(step) {
			var thisStep = $(step).children().attr('id');
            var first = $("#stepTable tr:first-child").children(':eq(1)').children().attr('id');
			//disable first button if this is step 1
            if (first == thisStep) {
				$("#prevStepBtn").attr('disabled', 'disabled');
            } else {
				$("#prevStepBtn").removeAttr('disabled').show();
            }   

			//disable next form button
            var last = $("#stepTable tr:last-child").children(':eq(1)').children().attr('id');
            //if we are on last step hide nextstep button
            if (last == thisStep) {
                $("#nextStepBtn").hide();
                $("#previewBtn").show();
            } else {
                $("#nextStepBtn").show();
                $("#previewBtn").hide();
            }   
			//get current form data to be passed later
			var curr = $(".stepSelected").children(':eq(1)').children().attr('id');
			var formData = $("#form_"+curr).serialize();

			//add class to selected step 
            $("#stepTable tr").removeClass('stepSelected');   
            $(step).parent().addClass('stepSelected');

            //put name of step that is going to be edited 
            $("#formTitle").text($(".stepSelected :eq(0)").text());
			$(".multiform_part").html("Loading...");

			//send data to php, and draw new form
            $.post('processForm.php',{step: thisStep, saveData: curr, formData: formData},function(data) {
				//draw new form
				$(".multiform_part").html(data);
            }); 
    }	

	//Events Initialization
	
	// handle the edit  link on each step
    $(".stepEdit").each(function(index){
        $(this).click(function(e){
            selectStep(this);
            }
        );
    });

	// Next Step Button
	$("#nextStepBtn").click(function(e){
		e.preventDefault();
		var next = $(".stepSelected").next('tr').children(':eq(1)');
		selectStep(next);
	});

	// Previous Step Button
	$("#prevStepBtn").click(function(e){
		e.preventDefault();
		var next = $(".stepSelected").prev('tr').children(':eq(1)');
		selectStep(next);
	});


	$("#previewBtn").click(function(e){
		e.preventDefault();
		$(this).hide();
		$("#prevStepBtn").hide();

		var curr = $(".stepSelected").children(':eq(1)').children().attr('id');
		var formData = $("#form_"+curr).serialize();
		$.get('processForm.php', {saveData: curr, formData: formData, step : 'getAllData'}, function(data) {
            	$("#stepTable tr").removeClass('stepSelected');   
				$(".multiform_part").html(data);
		});
	});
	//default form to show
	selectStep($("#formstep1").parent());

	
});
