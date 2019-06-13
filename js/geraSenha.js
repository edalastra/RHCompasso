document.getElementById("senhaTeste123").addEventListener("click", function(){
	function hasUppercase(char) {
			var regex = new RegExp('[A-Z]');
			return regex.test(char);
		}
	function generatorPassword(pw_height) {
		var password = new String();
		var pw_height_default = pw_height = 8;
	
		while (0 < 1) {
			var finish_repeat = false;
				
			for (let index = 0; index < pw_height_default; index++) {
				var temp = Math.random().toString(36).substring(8).substring(0, 1);
				if (Math.round(Math.random()) == 0) {
				temp = temp.toUpperCase();
				}
			password += temp;
		}
	
		for (char of password) {
			if (hasUppercase(char)) {
				finish_repeat = true;
			};
		}
	
		if (finish_repeat) {
			break
		}

		}	
		return password;
	}
});