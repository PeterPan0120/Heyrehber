var MyReviewDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_my_review_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/agency/reviews_getMyReviews",
                        //url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php",
                        map:function(t) {
                            var e=t;
                            return void 0!==t.data&&(e=t.data), e
                        }
                    }
                }, 
                pageSize:10, 
                serverPaging:!0, 
                serverFiltering:!0, 
                serverSorting:!0
            }, 
            layout: {
                scroll: !1, footer: !1
            }, 
            sortable:!0, 
            pagination:!0, 
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [10, 20, 30, 50, 100]
                    }
                }
            }, 
            search: {
                input: $("#generalSearch")
            }, 
            columns:[ 
                {
                    field: "id", 
                    title: "ID", 
                    sortable: !1, 
                    width: 40, 
                    selector: !1, 
                    textAlign: "center"
                }, 
                {
                    field:"agency", 
                    title:"Agency", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                },
                {
                    field:"guide", 
                    title:"Guide", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                },  
                {
                    field:"rating", 
                    title:"Rating", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        var result="";
                        for(var i=0; i<t.rating; i++)
                            result+="<i class='flaticon-star' style='color: #FDD05B;'></i>";
                        for(i=0; i<5-t.rating; i++)
                            result+="<i class='flaticon-star' style='color: #d0d0d0;'></i>";
                        return result;
                    }
                },
                {
                    field:"Actions", 
                    width:120, 
                    title:"Actions", 
                    sortable:!1, 
                    textAlign: "center",
                    overflow:"visible", 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/agency/reviews_my_review_details?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // agency reviews table
    MyReviewDatatableRemoteAjaxDemo.init();
    $('.form-agency-reviews-add-my-review .awesomeRating').awesomeRating({
        valueInitial: "5",
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-agency-reviews-add-my-review #select-my-review-guide').select2({placeholder:"Select Guide"});
    
    $('.form-agency-reviews-add-my-review').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/agency/reviews_save_my_review',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/agency/reviews_my_reviews";
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
});