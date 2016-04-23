  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();

    $(document).ready(function() {
      $(".register").hide();
    });

    $("a.swap").on("click", function() {
        $(".login,.register").toggle();
    });
    
    $("#show-password").on("click", function() {
        $(".login input.pass").attr("type", function(index, attr){
            return attr == "password" ? "text" : "password";
        })
    });
  </script>