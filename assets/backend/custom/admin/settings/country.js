var CountryDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_country_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/settings_getCountries",
                        //url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php",
                        map:function(t) {
                            var e=t;
                            console.log(t);
                            return void 0!==t.data&&(e=t.data), e
                        }
                    }
                }, 
                pageSize:20, 
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
                    width: 40,  
                    textAlign: "center"
                }, 
                {
                    field:"country", 
                    title:"Country",  
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"Actions", 
                    width:110, 
                    title:"Actions", 
                    sortable:!1, 
                    overflow:"visible", 
                    textAlign: "center",
                    template:function(t, e, a) {
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/settings_edit_country?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="country-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        });
    }
};
jQuery(document).ready(function(){
	//country table
	CountryDatatableRemoteAjaxDemo.init();
    $("#m_country_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/settings_delete_country?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
	//begin add country
	// $('.form-settings-add-country #select_country').select2({placeholder:"Select a country"});
	// $.ajax({
	// 	url: 'https://ezcmd.com/apps/api_ezhigh/get_countries/d808e46d8e30bb1c69532a021904689e/395',
	// 	success: function(res){
	// 		var count=0;
	// 		Object.keys(res).forEach(function(key) {
	// 		    var value = res[key];
	// 		    if (key === "success" || key === "remaining_lookups")
	// 		        delete res[key];
	// 		    else count++;
	// 	    });
	// 		var select = $('.form-settings-add-country #select_country');
	// 		var option="<option></option>";
	// 		select.append(option);
	// 		for(var i=0; i<count; i++)
	// 		{
	// 			option = '<option value="'+res[i]['country_name']+'">'+res[i]['country_name']+'</option>';
	// 			select.append(option);

	// 		}
	// 	}
	// });
	//counties with flags - autocomplete
	var options = {
		url: "/assets/backend/custom/admin/settings/autocomplete/countries.json",
		getValue: "name",
		list: {
		    match: {
		      	enabled: true
		    },
		    maxNumberOfElements: 8
		},
		template: {
		    type: "custom",
		    method: function(value, item) {
		      	return "<span class='flag flag-" + (item.code).toLowerCase() + "' ></span>" + value;
		    }
		},
		theme: "round"
	};
	console.log($(".form-settings-add-country #countries-flags"));
	$(".form-settings-add-country #countries-flags").easyAutocomplete(options);
	//end autocomplete

	$('.form-settings-add-country').submit(function(e){
		e.preventDefault();
		var country = $(this).find($('select[name="country"]')).val();
		console.log(country);
		$.ajax({
			url: '/admin/settings_save_country',
			data: $(this).serialize(),
			type: 'post',
			success: function(res){
				if(res=="success"){
					swal(
						"Saved!",
						"This country is successfully saved!",
						"success").then(function(){
							window.location.href="/admin/settings_countries";
						});
				}else{
					swal(
						"Error!",
						"This country is already existed!",
						"error");
				}
			}
		});
	});
	//begin edit country
	// $('.form-settings-edit-country #select_country').select2({placeholder:"Select a country"});
	// var country_id = $('.form-settings-edit-country .edit_country_id').val();
	// var country_name = $('.form-settings-edit-country .edit_country_name').val();

	// $.ajax({
	// 	url: 'https://ezcmd.com/apps/api_ezhigh/get_countries/d808e46d8e30bb1c69532a021904689e/395',
	// 	success: function(res){
	// 		var count=0;
	// 		Object.keys(res).forEach(function(key) {
	// 		    var value = res[key];
	// 		    if (key === "success" || key === "remaining_lookups")
	// 		        delete res[key];
	// 		    else count++;
	// 	    });
	// 		var select = $('.form-settings-edit-country #select_country');
	// 		var option="<option></option>";
	// 		select.append(option);
	// 		for(var i=0; i<count; i++)
	// 		{
	// 			if(res[i]['country_name']==country_name)
	// 				option = '<option value="'+res[i]['country_name']+'" selected>'+res[i]['country_name']+'</option>';
	// 			else
	// 				option = '<option value="'+res[i]['country_name']+'">'+res[i]['country_name']+'</option>';
	// 			select.append(option);

	// 		}
	// 	}
	// });

	$(".form-settings-edit-country #countries-flags").easyAutocomplete(options);
	$('.form-settings-edit-country').submit(function(e){
		e.preventDefault();
		var country = $(this).find($('select[name="country"]')).val();
		$.ajax({
			url: '/admin/settings_update_country',
			data: $(this).serialize(),
			type: 'post',
			success: function(res){
				if(res=="success"){
					swal(
						"Updated!",
						"This country is successfully updated!",
						"success").then(function(){
							window.location.href="/admin/settings_countries";
						});
				}else{
					swal(
						"Error!",
						"This country is already existed!",
						"error");
				}
			}
		});
	});
});
