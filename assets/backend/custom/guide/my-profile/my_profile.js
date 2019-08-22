$(document).ready(function() {
	$(".form-guide-my-profile-guide-profile #select_guide_group").select2({ placeholder: "Select Group" });
	$(".form-guide-my-profile-personal-profile #select_guide_city").select2({ placeholder: "Select City" });
	$(".form-guide-my-profile-personal-profile #select_guide_district").select2({ placeholder: "Select District" });
	$(".form-guide-my-profile-guide-profile #select_guide_regions").select2({ placeholder: "Select Region" });
	$(".form-guide-my-profile-guide-profile #select_guide_languages").select2({ placeholder: "Select Language" });
	$(".form-guide-my-profile-guide-profile #select_guide_chamber").select2({ placeholder: "Select Chamber" });
	$(".form-guide-my-profile-guide-profile #select_guide_specialisties").select2({
		placeholder: "Select Specialisties"
	});

	$(".form-guide-my-profile-guide-profile #range_all_turkey").click(function() {
		$(".form-guide-my-profile-guide-profile #select_guide_regions").prop("disabled", true);
	});
	$(".form-guide-my-profile-guide-profile #range_some_regions").click(function() {
		$(".form-guide-my-profile-guide-profile #select_guide_regions").prop("disabled", false);
	});
	//add guide
	$(".form-guide-my-profile-personal-profile").submit(function(e) {
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			url: "/auth/update_guideProfile",
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
					swal("Saved!", res["msg"], "success").then(function() {
						if (!res["redirect"]) window.location.href = "/auth/logout";
						else window.location.href = "/guide/my_profile";
					});
				} else {
					swal("Error!", res["msg"], "error");
				}
			}
		});
	});
	$(".form-guide-my-profile-guide-profile").submit(function(e) {
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			url: "/auth/update_guideProfile",
			data: $(this).serialize(),
			type: "post",
			success: function(res) {
				if (res["status"] == "success") {
					var id = res["guide_id"];
					var file_data = $("#edit_certificate_front").prop("files")[0];
					var fdata = new FormData();
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
					swal("Saved!", res["msg"], "success").then(function() {
						if (!res["redirect"]) window.location.href = "/auth/logout";
						else window.location.href = "/guide/my_profile";
					});
				} else {
					swal("Error!", res["msg"], "error");
				}
			}
		});
	});
	$(".form-guide-my-profile-social-media-profile").submit(function(e) {
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			url: "/auth/update_guideProfile",
			data: $(this).serialize(),
			type: "post",
			success: function(res) {
				if (res["status"] == "success") {
					swal("Saved!", res["msg"], "success").then(function() {
						window.location.href = "/guide/my_profile";
					});
				} else {
					swal("Error!", res["msg"], "error");
				}
			}
		});
	});
	$('.form-guide-my-profile-personal-profile input[type="file"]').each(function() {
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
	$('.form-guide-my-profile-guide-profile input[type="file"]').each(function() {
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

var html = $(".change-password").html();
if ($(".change-password").hasClass("hide")) {
	$(".change-password").html("");
}
$(".pwd-change").click(function(e) {
	e.preventDefault();
	if ($(".change-password").hasClass("show")) {
		$(".change-password").removeClass("show");
		$(".change-password").addClass("hide");
		$(".change-password").html("");
	} else {
		$(".change-password").removeClass("hide");
		$(".change-password").addClass("show");
		$(".change-password").html(html);
	}
});
