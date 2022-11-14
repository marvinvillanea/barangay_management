    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show_photo_preview').attr('src', e.target.result);
                $("#show_photo_preview").css({
                	'height' : '140px',
                	'width' : '200px'
                });
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_photo").change(function () {
        readURL(this);
    });

    </script>
  </body>
</html>