/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */

function showNews(url, containerId){
	var html = "<ul class='list-group'>";
    $.getJSON("articles.php", "symbol=" + encodeURIComponent(url), function(data) {
        if (data.length > 0)
        {
            $.each(data, function(key, value) {
            html = html + "<li class='list-group-item'><a target='_blank' href=\"" + value.link + "\">" + value.title + "</a></li>";
            });
        }

        else html = "<li class='list-group-item'> No news today </li>";

        html = html + "</ul>";
        $("#" + containerId).html(html);
    });
}

$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers",
        stateSave: true
    } );
} );

function sell(symbol){
    if(confirm("Are you sure you want to sell all shares of " + symbol + '?'))
    {
        window.location = "sell.php?symbol=" + symbol;
    }
}