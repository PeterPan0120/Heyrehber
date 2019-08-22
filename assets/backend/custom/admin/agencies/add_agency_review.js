$(document).ready(function(){
	$('.form-agencies-add-agency-review .awesomeRating').awesomeRating({
        valueInitial: "5",
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-agencies-add-agency-review').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/admin/agencies_save_agency_review',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/agencies_agency_reviews";
                        });
                }else{
                    swal(
                        "Error!",
                        res['msg'],
                        "error");
                }
            }
        });
    });
})