var GuideDatatableRemoteAjaxDemo = {
	init: function() {
		var t;
		t = $("#m_guide_datatable").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/admin/guides_getGuides",
						//url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php",
						map: function(t) {
							var e = t;
							return void 0 !== t.data && (e = t.data), e;
						}
					}
				},
				pageSize: 10,
				serverPaging: !0,
				serverFiltering: !0,
				serverSorting: !0
			},
			layout: {
				scroll: !1,
				footer: !1
			},
			sortable: !0,
			pagination: !0,
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
			columns: [
				{
					field: "id",
					title: "ID",
					sortable: !1,
					width: 40,
					selector: !1,
					textAlign: "center"
				},
				{
					field: "photo",
					title: "Photo",
					filterable: !1,
					textAlign: "center",
					width: 80,
					template: function(t, e, a) {
						if (t.photo != null)
							return '<img src="/' + t.photo + '" style="width: 50px; height: 50px; object-fit: cover;">';
					}
				},
				{
					field: "username",
					title: "Username",
					filterable: !1,
					textAlign: "center",
					width: 150,
					template: function(t) {
						return "<a href='/admin/guides_guide_detail?id=" + t.id + "'>" + t.username + "</a>";
					}
				},
				{
					field: "regions",
					title: "Region",
					filterable: !1,
					textAlign: "center",
					template: function(t) {
						if (t.regions) {
							var reg = JSON.parse(t.regions);
							var result = "";
							if (reg.length == 0) return;
							for (var i = 0; i < reg.length; i++) result += "<p>" + reg[i] + "</p>";
							return result;
						} else if (!t.regions && t.work_range == "All Turkey") return "All Turkey";
					}
				},
				{
					field: "languages",
					title: "Languages",
					filterable: !1,
					textAlign: "center",
					template: function(t) {
						if (t.languages) {
							var lan = JSON.parse(t.languages);
							var result = "";
							if (lan.length == 0) return;
							for (var i = 0; i < lan.length; i++) result += "<p>" + lan[i] + "</p>";
							return result;
						}
					}
				},
				{
					field: "phone_number",
					title: "Phone Number",
					filterable: !1,
					textAlign: "center",
					width: 100
				},
				{
					field: "status",
					title: "Status",
					filterable: !1,
					textAlign: "center",
					template: function(t) {
						if (t.status == "active")
							return "<span class='m-badge m-badge--success m-badge--wide'>Active</span>";
						else return "<span class='m-badge m-badge--metal m-badge--wide'>Dective</span>";
					}
				},
				{
					field: "Actions",
					width: 120,
					title: "Actions",
					sortable: !1,
					textAlign: "center",
					overflow: "visible",
					template: function(t, e, a) {
						return (
							"\t\t\t\t\t\t" +
							'<a href="/admin/guides_guide_detail?id=' +
							t.id +
							'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">' +
							"\t\t\t\t\t\t\t" +
							'<i class="la la-eye"></i>' +
							"\t\t\t\t\t\t" +
							"</a>" +
							"\t\t\t\t\t\t" +
							'<a href="/admin/guides_edit_guide?id=' +
							t.id +
							'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">' +
							"\t\t\t\t\t\t\t" +
							'<i class="la la-edit"></i>' +
							"\t\t\t\t\t\t" +
							"</a>" +
							"\t\t\t\t\t\t" +
							'<a class="guide-' +
							t.id +
							' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">' +
							"\t\t\t\t\t\t\t" +
							'<i class="la la-trash"></i>' +
							"\t\t\t\t\t\t" +
							"</a>" +
							"\t\t\t\t\t"
						);
					}
				}
			]
		});
		$("#select_filter_region").on("change", function() {
			t.search($(this).val(), "region");
		}),
		$("#select_filter_language").on("change", function() {
			t.search($(this).val(), "language");
		}),
		$("#select_filter_district").on("change", function() {
			t.search($(this).val(), "district");
		}),
		$("#select_filter_city").on("change", function() {
			t.search($(this).val(), "city");
		}),
		$("#select_filter_status").on("change", function() {
			t.search($(this).val(), "status");
		});
	}
};
jQuery(document).ready(function() {
	// guides table
	GuideDatatableRemoteAjaxDemo.init();
	$("#m_guide_datatable").on("click", "a[title='Delete']", function() {
		var id = $(this)
			.attr("class")
			.split(" ")[0]
			.split("-")[1];
		swal({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: !0,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0
		}).then(function(e) {
			e.value
				? (window.location.href = "/auth/delete_guide?id=" + id)
				: "cancel" === e.dismiss && swal("Cancelled", "", "error");
		});
	});
	//add guide
	$(".form-guides-add-guide #select_guide_languages").select2({ placeholder: "Select Languages" });
	$(".form-guides-add-guide #select_guide_city").select2({ placeholder: "Select City" });
	$(".form-guides-add-guide #select_guide_district").select2({ placeholder: "Select District" });
	$(".form-guides-add-guide #select_guide_regions").select2({ placeholder: "Select Region" });
	$(".form-guides-add-guide #select_guide_chamber").select2({ placeholder: "Select Chamber" });
	$(".form-guides-add-guide #select_guide_specialisties").select2({ placeholder: "Select Specialisties" });

	$(".form-guides-add-guide #select_guide_regions").prop("disabled", true);
	$(".form-guides-add-guide #range_all_turkey").click(function() {
		$(".form-guides-add-guide #select_guide_regions").prop("disabled", true);
	});
	$(".form-guides-add-guide #range_some_regions").click(function() {
		$(".form-guides-add-guide #select_guide_regions").prop("disabled", false);
	});
	$(".form-guides-add-guide").submit(function(e) {
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			url: "/auth/do_signup_guide",
			data: $(this).serialize(),
			type: "post",
			success: function(res) {
				if (res["status"] == "success") {
					var id = res["guide_id"];
					var file_data = $("#add_guide_photo").prop("files")[0];
					var fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_photo?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#add_certificate").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#add_certificate_front").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate_front?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#add_certificate_back").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate_back?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					swal("Saved!", res["msg"], "success").then(function() {
						window.location.href = "/admin/guides_guides";
					});
				} else {
					swal("Error!", res["msg"], "error");
				}
			}
		});
	});
	//edit city
	$(".form-guides-edit-guide #select_guide_languages").select2({ placeholder: "Select Languages" });
	$(".form-guides-edit-guide #select_guide_city").select2({ placeholder: "Select City" });
	$(".form-guides-edit-guide #select_guide_district").select2({ placeholder: "Select District" });
	$(".form-guides-edit-guide #select_guide_regions").select2({ placeholder: "Select Region" });
	$(".form-guides-edit-guide #select_guide_chamber").select2({ placeholder: "Select Chamber" });
	$(".form-guides-edit-guide #select_guide_specialisties").select2({ placeholder: "Select Specialistics" });

	$(".form-guides-edit-guide #range_all_turkey").click(function() {
		$(".form-guides-edit-guide #select_guide_regions").prop("disabled", true);
	});
	$(".form-guides-edit-guide #range_some_regions").click(function() {
		$(".form-guides-edit-guide #select_guide_regions").prop("disabled", false);
	});
	$(".form-guides-edit-guide").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "/auth/update_guide",
			data: $(this).serialize(),
			type: "post",
			success: function(res) {
				if (res["status"] == "success") {
					var id = res["guide_id"];
					var file_data = $("#edit_guide_photo").prop("files")[0];
					var fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_photo?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#edit_certificate").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#edit_certificate_front").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate_front?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					file_data = $("#edit_certificate_back").prop("files")[0];
					fdata = new FormData();
					fdata.append("file", file_data);
					var url = "/auth/upload_guide_certificate_back?guide_id=" + id;
					$.ajax({
						url: url, // point to server-side PHP script
						dataType: "text", // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: fdata,
						type: "post",
						success: function(upload_path) {}
					});
					swal("Updated!", res["msg"], "success").then(function() {
						window.location.href = "/admin/guides_guides";
					});
				} else {
					swal("Error!", res["msg"], "error");
				}
			}
		});
	});
	$('.form-guides-add-guide input[type="file"]').each(function() {
		// Refs
		var $file = $(this),
			$label = $file.next("label"),
			$labelText = $label.find("span"),
			labelDefault = $labelText.text();

		// When a new file is selected
		$file.on("change", function(event) {
			var fileName = $file
					.val()
					.split("\\")
					.pop(),
				tmppath = URL.createObjectURL(event.target.files[0]);
			if (fileName) {
				$label.addClass("file-ok").css("background-image", "url(" + tmppath + ")");
				$labelText.text(fileName);
			} else {
				$label.removeClass("file-ok");
				$labelText.text(labelDefault);
			}
		});
		// End loop of file input elements
	});
	$('.form-guides-edit-guide input[type="file"]').each(function() {
		// Refs
		var $file = $(this),
			$label = $file.next("label"),
			$labelText = $label.find("span"),
			labelDefault = $labelText.text();

		// When a new file is selected
		$file.on("change", function(event) {
			var fileName = $file
					.val()
					.split("\\")
					.pop(),
				tmppath = URL.createObjectURL(event.target.files[0]);
			if (fileName) {
				$label.addClass("file-ok").css("background-image", "url(" + tmppath + ")");
				$labelText.text(fileName);
			} else {
				$label.removeClass("file-ok");
				$labelText.text(labelDefault);
			}
		});
		// End loop of file input elements
	});
});
