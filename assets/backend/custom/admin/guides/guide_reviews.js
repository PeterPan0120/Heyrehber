var GuideReviewDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_guide_reviews_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/guides_getGuideReviews",
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
                    field:"guide", 
                    title:"Guide", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150,
                    template: function(t){
                        return "<a href='/admin/guides_guide_review_detail?id="+t.id+"'>"+t.guide+"</a>";
                    } 
                }, 
                {
                    field:"agency", 
                    title:"Agency", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"rating", 
                    title:"Rating", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
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
                    field:"submission_date", 
                    title:"Submission Date", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"Actions", 
                    width:110, 
                    title:"Actions", 
                    sortable:!1, 
                    textAlign: "center",
                    overflow:"visible", 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/guides_guide_review_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/guides_edit_guide_review?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="guide_review-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // guides table
    GuideReviewDatatableRemoteAjaxDemo.init();
    $("#m_guide_reviews_datatable").on("click", "a[title='Delete']", function(){
        var id = $(this).attr('class').split(' ')[0].split('-')[1];
        swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonText:"Yes, delete it!",
            cancelButtonText:"No, cancel!",
            reverseButtons:!0
        }).then(function(e){
            e.value
            ? window.location.href="/admin/guides_delete_guide_review?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
});