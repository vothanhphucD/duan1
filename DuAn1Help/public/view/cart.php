
<script>
    $(document).ready(function() {
        $(".inc.qtybutton, .dec.qtybutton").click(function() {
            var valueQty = $(this).closest('tr').find('.cart-plus-minus-box').val();
            var valueID = $(this).closest('tr').find('.cart_id').val();
            if(valueQty <= 0) {
                $.ajax({
                    url: "controllers/xuly_cart.php",
                    method: "POST",
                    data: {
                        check: "qtybang0AutoDel",
                        valueID: valueID
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            } else {
                $.ajax({
                    url: "controllers/xuly_cart.php",
                    method: "POST",
                    data: {
                        check: "upQTYonCart",
                        valueQty: valueQty,
                        valueID: valueID
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        }); 
    });
</script>