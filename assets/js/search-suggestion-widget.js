jQuery(document).ready(function($) {
    function fetchSuggestions(searchTerm) {
        if (searchTerm.trim() !== '') {
            $.ajax({
                url: searchSuggestionWidgetAjax.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'get_search_suggestions',
                    search_term: searchTerm
                },
                success: function(response) {
                    // Handle the response (list of suggestions)
                    var suggestions = JSON.parse(response);
                    // Display suggestions
                    var suggestionList = '';
                    for (var i = 0; i < suggestions.length; i++) {
                        var suggestion = suggestions[i];
                        suggestionList += '<a href="' + suggestion.url +'">';
                        suggestionList += '<div class="suggestion">';
                        suggestionList += '<div class="image"><img src="' + suggestion.image + '" alt="" width="90" height="90"></div>';
                        suggestionList += '<div class="title">' + suggestion.title + '</div>';
                        suggestionList += '</div>';                      
                        suggestionList += '</a>';
                    }
                    $('#search-suggestion-widget').html(suggestionList);
                }
            });
        } else {
            $('#search-suggestion-widget').html('');
        }
    }

    $('#search-bar').on('input', function() {
        var searchTerm = $(this).val();
        fetchSuggestions(searchTerm);
    });
});