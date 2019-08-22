$(document).ready(function(){
	var rating = $('.form-agencies-edit-agency-review input.awesomeRatingValue').val();
    $('.form-agencies-edit-agency-review .awesomeRating').awesomeRating({
        valueInitial: rating,
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-agencies-edit-agency-review').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/admin/agencies_update_agency_review',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Updated!",
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