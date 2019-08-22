var GuideSearchDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_guide_search_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/guides_getGuideSearch",
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
                    field:"username", 
                    title:"Username", 
                    filterable:!1, 
                    textAlign: "center",
                }, 
                {
                    field:"phone_number", 
                    title:"Phone Number", 
                    filterable:!1, 
                    textAlign: "center",
                }, 
                {
                    field:"city", 
                    title:"City", 
                    filterable:!1, 
                    textAlign: "center",
                }, 
                {
                    field:"district", 
                    title:"District", 
                    filterable:!1, 
                    textAlign: "center",
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
                                '<a href="/admin/guides_guide_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        )
        $("input[name='days']").on("change", function() {
            t.search($(this).val(), "days");
        }),
        $("input[name='start_date']").on("change", function() {
            t.search($(this).val(), "start_date");
        }),
        $("input[name='finish_date']").on("change", function() {
            t.search($(this).val(), "finish_date");
        }),
        $("#select_guide_search_language").on("change", function() {
            t.search($(this).val(), "language");
        }),
        $("#select_guide_search_city").on("change", function() {
            t.search($(this).val(), "city");
        })
    }
};
jQuery(document).ready(function() {
    // guides table
    GuideSearchDatatableRemoteAjaxDemo.init();
    $('.label-tour-date').css('display', 'none');
    $(".form-guides-search-guide #select_guide_search_language").select2({placeholder: "Select Langauge"});
    $(".form-guides-search-guide #select_guide_search_city").select2({placeholder: "Select Tour Place"});
    $("#days_yes").change(function(e){
        e.preventDefault();
        console.log("yes");
        $("input[name='finish_date']").parent().parent().css('display', 'none');
        $('.label-start-date').css('display', 'none');
        $('.label-tour-date').css('display', 'block');
        $('input[name="start_date"]').attr('placeholder', "Tour Date");
    }); 
    $("#days_no").change(function(e){
        e.preventDefault();
        console.log("no");
        $("input[name='finish_date']").parent().parent().css('display', 'block');
        $('.label-start-date').css('display', 'block');
        $('.label-tour-date').css('display', 'none');
        $('input[name="start_date"]').attr('placeholder', "Start Date");
    });
});