function getUsers(value, user) {
	$.post("includes/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data) {
		$(".results").html(data);
	});
}
