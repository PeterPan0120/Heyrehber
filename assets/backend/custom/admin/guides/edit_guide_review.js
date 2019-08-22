$(document).ready(function(){
    var rating = $('.form-guides-edit-guide-review input.awesomeRatingValue').val();
	$('.form-guides-edit-guide-review .awesomeRating').awesomeRating({
        valueInitial: rating,
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-guides-edit-guide-review').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/admin/guides_update_guide_review',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/guides_guide_reviews";
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