var AgencyReviewDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_agency_review_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/guide/reviews_getAgencyReviews",
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
                        if(t.status=="active"){
                            var result="";
                            for(var i=0; i<t.rating; i++)
                                result+="<i class='flaticon-star' style='color: #FDD05B;'></i>";
                            for(i=0; i<5-t.rating; i++)
                                result+="<i class='flaticon-star' style='color: #d0d0d0;'></i>";
                            return result;
                        }
                        else return "???";
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
                        if(t.status=="active"){
                            return  '\t\t\t\t\t\t'+
                                '<a href="/guide/reviews_agency_review_details?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'
                                '\t\t\t\t\t';
                        }
                        else{
                            return  '\t\t\t\t\t\t'+
                                '<a class="warning m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-warning"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'
                                '\t\t\t\t\t';
                        }
                    }
                }
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // agency reviews table
    AgencyReviewDatatableRemoteAjaxDemo.init();
    $("#m_agency_review_datatable").on("click", "a.warning", function(){
        swal({
            title: "Warning",
            text: "If you want to see this review, you need to leave review for this agency first.",
            type: "warning"
        });
    });
    $('.form-guide-reviews-add-agency-review .awesomeRating').awesomeRating({
        valueInitial: "5",
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
});