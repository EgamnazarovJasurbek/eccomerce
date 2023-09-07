<style>
    .search{
        color: #7fad39 !important;
        font-weight: 700
    }
</style>


<div class="hero__search">
    <div class="hero__search__form">
        <form action="{{ route('search') }}" method="GET">
            <input type="search" name="key"  placeholder="What do yo u need?" class="search-input">
            <button type="submit" class="site-btn">@lang('words.search')</button>
        </form>
    </div>
    <div class="hero__search__phone">
        <div class="hero__search__phone__icon">
            <i class="fa fa-phone"></i>
        </div>
        <div class="hero__search__phone__text">
            <h5>+65 11.188.888</h5>
            <span>support 24/7 time</span>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var delayTimer;

        $('#search').on('input', function() {
            clearTimeout(delayTimer);

            var query = $(this).val();

            delayTimer = setTimeout(function() {
                sendAjaxRequest(query);
            }, 300);
        });

        $('#search').on('keyup', function(event) {
            if (event.key === 'Backspace') {
                clearTimeout(
                    delayTimer);
                sendAjaxRequest('');
            }
        });

        function sendAjaxRequest(query) {
            $.ajax({
                url: '/search',
                method: 'POST',
                data: {
                    query: query,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    var savatData = response.savat;
                    var html = '';
                    for (var i = 0; i < savatData.length; i++) {
                        var item = savatData[i];
                        html += '<a href="/view_orders_id/' + item.id +
                            '" class="d-flex justify-content-between form-control h-100" style="cursor: pointer">';
                        html += '<span>' + item.name + '</span>';
                        html += '<span>' + item.price + ' So\'m</span>';
                        html += '</a>';
                    }
                    $('#post').html(html);
                    if (query === '') {
                        $('#post').empty();
                    }
                },

            });
        }
    });
</script>