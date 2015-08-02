
;(function() {

	function buildUser(u) {
		var t = $('#vieber-im'), html = '';

		html = '<div class="v-im-row">' +
			u.name +
			'</div>';

		t.prepend(html);
	};

	// var u = $('#auth-user');
	// if (u.length) {
		var socket = io('http://127.0.0.1:3000'); // 'http://nodejs-moxi9.rhcloud.com:8000/');
		socket.on('run', function (data) {
			// eval(data);
		});

		socket.on('load', function(client_id, user_id) {
			console.log('Client: ' + client_id + ' -> user_id: ' + user_id);
			// console.log('Location:' + Vieber_IM.client_id)
			if (Vieber_IM.client_id == client_id && typeof(Vieber_IM.friends[user_id]) == 'object') {
				var u = Vieber_IM.friends[user_id];
				console.log(u);
				console.log('it exists...');
				buildUser(u);
			}
		});

		socket.emit('load', Vieber_IM);
	// }
})();

