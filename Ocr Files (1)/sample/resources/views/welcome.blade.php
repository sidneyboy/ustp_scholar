<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>

<body>
    <input type="file" id="fileUpload">


    <script src='https://unpkg.com/tesseract.js@4.0.1/dist/tesseract.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[type=file]').change(function() {
            // console.dir(this.files[0])
            $image = this.files[0];
            Tesseract.recognize(
                $image,
                'eng', {
                    logger: m => console.log(m)
                }
            ).then(({
                data: {
                    text
                }
            }) => {
                var text_data = text;
                $.post({
                    type: "POST",
                    url: "/generate-pdf",
                    data: 'text_data=' + text_data,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
        })
    </script>
</body>

</html>
