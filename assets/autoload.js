
$Event(function() {
	if (self != top) {
		window.parent.document.title = document.title;
	}
});