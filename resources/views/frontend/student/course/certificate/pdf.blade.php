<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('Certificate') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }
    </style>
</head>

<body>

    @php
    $certificate->title = $certificate_by_instructor->title;
    $certificate->title_x_position = $certificate_by_instructor->title_x_position;
    $certificate->title_y_position = $certificate_by_instructor->title_y_position;
    $certificate->title_font_size = $certificate_by_instructor->title_font_size;
    $certificate->title_font_color = $certificate_by_instructor->title_font_color;
    $certificate->body_max_length = $certificate_by_instructor->body_max_length;
    $certificate->body_x_position = $certificate_by_instructor->body_x_position;
    $certificate->body_y_position = $certificate_by_instructor->body_y_position;
    $certificate->body_font_size = $certificate_by_instructor->body_font_size;
    $certificate->body_font_color = $certificate_by_instructor->body_font_color;
    $certificate->role_2_signature = $certificate_by_instructor->signature;
    $certificate->role_2_x_position = $certificate_by_instructor->role_2_x_position;
    $certificate->role_2_y_position = $certificate_by_instructor->role_2_y_position;
    $certificate->body = str_replace(array("[name]", "[course]"),
    array(auth::user()->student ? auth::user()->student->name : '', $course_title),
    $certificate_by_instructor->body);
    @endphp

    <div class="pdf-wrapper-box">

        <div class="certificate-frame"
            style="background-image: url('{{asset($certificate->image)}}');background-size: cover;background-repeat: no-repeat;background-position: center;height: 734px;width: 1030px;">
            <div style="position: relative; font-family: 'Mongolian Baiti';  padding: 35px  0;">
                @if($certificate->show_number == 'yes')
                <p class="certificate-number"
                    style=" position: relative; top: {{$certificate->number_y_position? : 10}}px; left: {{$certificate->number_x_position? : 0}}px; text-align: center; color: {{$certificate->number_font_color ? : '#363234'}};font-size: {{$certificate->number_font_size ? : 20}}px; ">
                    {{$certificate->certificate_number}}</p>
                @endif

                <div class="certificate-title"
                    style=" position: relative; top: {{$certificate->title_y_position? : 10}}px;  left: {{$certificate->title_x_position? : 0}}px; text-align: center; font-size: {{$certificate->title_font_size}}px; font-weight: 400; color: {{$certificate->title_font_color ? : '#363234'}}">
                    {{$certificate->title}}</div>

                @if($certificate->show_date == 'yes')
                <div class="certificate-publish-date"
                    style="padding-top: 40px; text-align: center; position: relative; top: {{$certificate->date_y_position? : 10}}px; left: {{$certificate->date_x_position? : 0}}px; font-size: {{$certificate->date_font_size? : 30}}px; font-weight: 400; color: {{$certificate->date_font_color? : '#363234'}}; padding-bottom: 16px">
                    {{\Carbon\Carbon::now()->format(get_option('app_date_format'))}}</div>
                @endif
                @if($certificate->show_student_name == 'yes')
                <div class="certificate-student-name"
                    style="text-align: center; position: relative; top: {{$certificate->student_name_y_position? : 10}}px; left: {{$certificate->student_name_x_position? : 0}}px; font-size: {{$certificate->student_name_font_size? : 32}}px; font-weight: 400;  color: {{$certificate->student_name_font_color? : '#363234'}}; padding-bottom: 16px">
                    {{auth::user()->student ? auth::user()->student->name : '' }}</div>
                @endif
                <p class="certificate-content"
                    style="padding-bottom: 24px; min-height:220px; line-height: 30px; position: relative; top: {{$certificate->body_y_position? : 16}}px; left: {{$certificate->body_x_position? : 0}}px; text-align: center; padding-left: 128px; padding-right: 128px; color: {{$certificate->body_font_color? : '#363234'}}; font-size: {{$certificate->body_font_size? : 20}}px;">
                    {{$certificate->body}}</p>
                @if($certificate->role_2_show == 'yes')
                <div class="certificate-signature certificate-signature-1"
                    style="position: relative; text-align:center; position: relative;  top: {{$certificate->role_2_y_position? : 20}}px; left: {{$certificate->role_2_x_position? : 20}}px; ">
                    <p
                        style=" font-size: {{$certificate->role_2_font_size? : 18}}px; font-weight: 400; color: {{$certificate->role_2_font_color ? : '#363234'}}">
                        {{$certificate->role_2_title}}</p>
                </div>
                @endif
                @if($certificate->role_1_show == 'yes')
                <div class="certificate-signature certificate-signature-2"
                    style="position: relative; text-align:center;  position: relative;  top: {{$certificate->role_1_y_position? : 20}}px; left: {{$certificate->role_1_x_position? : 20}}px;">
                    <div style="position: relative;">
                        <img src="{{asset($certificate->role_1_signature)}}" alt="Signature 2">
                    </div>
                    <p
                        style="font-size: {{$certificate->role_1_font_size? : 18}}px; font-weight: 400; color: {{$certificate->role_1_font_color ? : '#363234'}}">
                        {{$certificate->role_1_title}}</p>
                </div>
                @endif
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>