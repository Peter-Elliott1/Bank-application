function checkDatePast (date) {
	var TO_DAYS = (1000 * 60 *60 * 24);
	var today = new Date();
	today = parseInt(today / TO_DAYS);
	date = new Date(date);
	date = parseInt(date / TO_DAYS);
	if (date > today) {
		document.getElementById('dob').setCustomValidity('The date of birth cannot be in the future!');
	} else {
		document.getElementById('dob').setCustomValidity('');
	}
}








	







