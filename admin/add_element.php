<script src="extend\jquery-3.6.0.min.js"></script>
<script>
    function add_element(mom, baby) {
        var cloning = $("#" + baby).clone(true);

        cloning.css("display", "");

        $("#" + mom).append(cloning);
    }
</script>