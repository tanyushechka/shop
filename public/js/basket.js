$(function () {
        $('.without').click(function () {
                var id = $('#id').html(),
                    that = this;
                $.get('/add',
                    {'product_id': id},
                    function (data) {
                        $(that).html('Go to basket');
                        $(that).css('display', 'none');
                        $('.within').css('display', 'block');
                        $('.message').html(data.message);
                        $('#menu-sum').html(data.sum);
                    }, 'json');
            return false;
        });

        $('.btn-quantity').click(function () {
            var row = $(this).parents('tr'),
                id = row.find('.id').html(),
                price = row.find('.price').html(),
                quantity = row.find('.quantity').val(),
                totalSum = $('#total-sum').html(),
                that = this;
            if ($(this).hasClass('minus') && quantity > 1) {
                quantity--;
            }
            else if ($(this).hasClass('plus') && quantity < 100) {
                quantity++;
            }
            else {
                return false;
            }
            $.get('/quantity',
                {'product_id': id, 'quantity': quantity},
                function (data) {
                    row.find('.quantity').val(quantity);
                    row.find('.sum').html(price * quantity);
                    $('#menu-sum').html(data.sum);
                    totalSum =  ($(that).hasClass('minus')) ? (+totalSum - +price) : (+totalSum + +price);
                    $('#total-sum').html(totalSum);

        }, 'json');
            return false;
        });

}
);