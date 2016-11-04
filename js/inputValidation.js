document.addEventListener("DOMContentLoaded", function(event)
{
	document.getElementById('checkIsNAN');
});

// Check whether number of fruits is valid everytime user changes input
function ValidateNumber()
{
    var item = event.target.id; // Get id of trigger object
    var value = event.target.value; // Get value of trigger object

    if (isNaN(value))
    {
        alert("This is not a number. Please enter a number!");
        document.getElementById(item).focus();
    }
}