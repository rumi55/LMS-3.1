(function ($) {
    "use strict";
    var course_id = $('.course_id').val();
    var lecture_id = $('.lecture_id').val();
    var videoCompletedRoute = $('.videoCompletedRoute').val();
    var nextLectureRoute = $('.nextLectureRoute').val();

    //Normal Video
    $('.myVideo').on('ended', function (){
        $.ajax({
            type: "GET",
            url: videoCompletedRoute,
            data: {'course_id': course_id, 'lecture_id': lecture_id},
            datatype: "json",
            success: function (response) {
                toastr.options.positionClass = 'toast-bottom-right';
                if (nextLectureRoute) {
                    window.location.href = nextLectureRoute;
                } else {
                    location.reload();
                }
            },
            error: function (error) {

            },
        });
    })

    // Vimeo video
    $(document).ready(function(){

        var vimeoVideoSource = $('.vimeoVideoSource').val();
        if (vimeoVideoSource) {
            var iframe = $('#playerVideoVimeo iframe');
            var player = new Vimeo.Player(iframe);

            player.on('ended', function() {
                $.ajax({
                    type: "GET",
                    url: videoCompletedRoute,
                    data: {'course_id': course_id, 'lecture_id': lecture_id},
                    datatype: "json",
                    success: function (response) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        if (nextLectureRoute) {
                            window.location.href = nextLectureRoute;
                        } else {
                            location.reload();
                        }
                    },
                    error: function (error) {

                    },
                });
            });
        }

    });

})(jQuery)
