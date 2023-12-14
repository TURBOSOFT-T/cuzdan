
<head>
    {{-- ///country Region and cite --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script>
    const phoneInputField = document.querySelector("#phone");
           const phoneInput = window.intlTelInput(phoneInputField, {
             utilsScript:
               "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
           });





           $(document).ready(function() {
          //-------------------------------SELECT CASCADING-------------------------//
          var selectedCountry = (selectedRegion = selectedCity = "");
          // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
          var BATTUTA_KEY = "00000000000000000000000000000000";
          // Populate country select box from battuta API
          url =
            "https://battuta.medunes.net/api/country/all/?key=" +
            BATTUTA_KEY +
            "&callback=?";

          // EXTRACT JSON DATA.
          $.getJSON(url, function(data) {
            console.log(data);
            $.each(data, function(index, value) {
              // APPEND OR INSERT DATA TO SELECT ELEMENT.
              $("#country").append(
                '<option value="' + value.code + '">' + value.name + "</option>"
              );
            });
          });
          // Country selected --> update region list .
          $("#country").change(function() {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $("#country").val();
            // Populate country select box from battuta API
            url =
              "https://battuta.medunes.net/api/region/" +
              countryCode +
              "/all/?key=" +
              BATTUTA_KEY +
              "&callback=?";
            $.getJSON(url, function(data) {
              $("#state option").remove();
              $('#state').append('<option value="">Please select your state</option>');
              $.each(data, function(index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#state").append(
                  '<option value="' + value.region + '">' + value.region + "</option>"
                );
              });
            });
          });
          // Region selected --> updated city list
          $("#state").on("change", function() {
            selectedRegion = this.options[this.selectedIndex].text;
            // Populate country select box from battuta API
            countryCode = $("#country").val();
            region = $("#state").val();
            url =
              "https://battuta.medunes.net/api/city/" +
              countryCode +
              "/search/?region=" +
              region +
              "&key=" +
              BATTUTA_KEY +
              "&callback=?";
            $.getJSON(url, function(data) {
              console.log(data);
              $("#city option").remove();
              $('#city').append('<option value="">Please select your city</option>');
              $.each(data, function(index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#city").append(
                  '<option value="' + value.city + '">' + value.city + "</option>"
                );
              });
            });
          });
          // city selected --> update location string
          $("#city").on("change", function() {
            selectedCity = this.options[this.selectedIndex].text;
            $("#location").html(
              "Locatation: Country: " +
                selectedCountry +
                ", Region: " +
                selectedRegion +
                ", City: " +
                selectedCity
            );
          });
        });

</script>
