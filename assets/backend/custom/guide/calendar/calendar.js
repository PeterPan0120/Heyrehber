jQuery(document).ready(function() {
    $(".event-edit").click(function(){
        var id = $(this).attr('class').split(" ")[1].split('-')[2];
        $.ajax({
            'url': '/guide/calendar_get_event/'+id,
            success: function(res){
                if(res['status']=="success"){
                    var event = res['event'];
                    $('#modal_edit_event').modal('show');
                    $("#modal_edit_event .form-calendar-edit-event .colorPickSelector").colorPick({
                        'initialColor' : event['activity_color'],
                        'onColorSelected': function() {
                            $('.form-calendar-edit-event .colorPickSelector input[name="activity_color"]').val(this.color);
                            this.element.css({'backgroundColor': this.color, 'color': this.color});
                        }
                    });
                    $('#modal_edit_event .form-calendar-edit-event input[name="id"]').val(id);
                    $('#modal_edit_event .form-calendar-edit-event input[name="title"]').val(event['title']);
                    $('#modal_edit_event .form-calendar-edit-event input[name="start_time"]').val(event['start_time']);
                    $('#modal_edit_event .form-calendar-edit-event input[name="finish_time"]').val(event['finish_time']);
                    $('#modal_edit_event .form-calendar-edit-event input[name="location"]').val(event['location']);
                    $('#modal_edit_event .form-calendar-edit-event textarea[name="description"]').val(event['description']);

                }
            }
        });
    });
    $('.form-calendar-edit-event').submit(function(e){
        e.preventDefault();
        var id = $(".form-calendar-edit-event input[name='id']").val();
        $.ajax({
            url: "/guide/calendar_edit_event/"+id,
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    window.location.href="/guide/calendar_calendar";
                }
            }
        });
    });
    $(".event .event-delete").click(function(){
        var id = $(this).attr('class').split(" ")[1].split('-')[2];
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
            ? window.location.href="/guide/calendar_delete_event/"+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")
        });
    });
    $(".form-calendar-add-event #select_event_requester").select2({
        placeholder:"Search for requester",
        allowClear:!0,
        ajax:{
            url:"/guide/getRequesterName",
            dataType:"json",
            delay:250,
            data:function(e){
                return{q:e.term,page:e.page}
            },
            processResults:function(e,t){
                return t.page=t.page||1,{
                    results:e.items,
                    pagination:{more:30*t.page<e.total_count}
                }
            },
            cache:!0
        },
        escapeMarkup:function(e){return e},
        minimumInputLength:1,
        templateResult:function(e){
            if(e.loading)return e.text;
            var t="<option value="+e.name+">"+e.name+"</option>";
            return t;
        },
        templateSelection:function(e){return e.name||e.text}
    }),
    $('.form-calendar-add-event #select_event_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-calendar-add-event #days_one').change(function(){
        $('.form-calendar-add-event input[name="finish_date"]').prop("disabled", true);
    });
    $('.form-calendar-add-event #days_several').change(function(){
        $('.form-calendar-add-event input[name="finish_date"]').prop("disabled", false);
    });
    $(".form-calendar-add-event .colorPickSelector").colorPick({
        'initialColor' : '#27ae60',
        'onColorSelected': function() {
            $('.form-calendar-add-event .colorPickSelector input[name="activity_color"]').val(this.color);
            this.element.css({'backgroundColor': this.color, 'color': this.color});
        }
    });
    $('.form-calendar-add-event select[name="tour_type"]').change(function(){
        var tour_type = $(this).val();
        var data = {type: tour_type};
        $.ajax({
            url: '/admin/getDayFromTourType',
            data: data,
            type: 'post',
            success: function(res){
                if(res=="One Day"){
                    $('.form-calendar-add-event input[name="days"]').val("One Day");
                    $('.form-calendar-add-event sm.desc_tour_type').html("This tour takes only one day.");
                    $('.form-calendar-add-event input[name="finish_date"]').prop('disabled', true);
                }
                else {
                    $('.form-calendar-add-event input[name="days"]').val("Several Days");
                    $('.form-calendar-add-event sm.desc_tour_type').html("This tour takes several days.");
                    $('.form-calendar-add-event input[name="finish_date"]').prop('disabled', false);
                }
            }
        })
    })
    $('.form-calendar-add-event').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/calendar_save_event',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/calendar_calendar";
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