<script src="{{asset('../frontend/assets/js/script.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="{{asset('../../frontend/js/samplepages/jquery.PrintArea.js')}}"></script>
<script>
    $(function() {
                    $("#print").click(function() {
                        var mode = 'iframe'; //popup
                        var close = mode == "popup";
                        var options = {
                            mode: mode,
                            popClose: close
                        };
                        $("div.printableArea").printArea(options);
                    });
                });
</script>