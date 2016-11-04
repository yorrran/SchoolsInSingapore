function ValidateInput()
{
    var item = event.target.id; // Get id of trigger object
    var value = event.target.value; // Get value of trigger object

	// Primary
	if (item == "primaryarea")
		var pat = /[^a-z ]/i;
	else if (item == "primarycca")
		var pat = /[^a-z 0-9,()\/\-$:'*.&@!]/i;
	else if (item == "primarysubject")
		var pat = /[^a-z ,&-()'123\/*]/i;
	else if (item == "primarycode")
		var pat = /[^0-9]/i;
	else if (item == "primarymrt")
		var pat = /[^a-z ]/i;
	else if (item == "primarybus")
		var pat = /[^a-z0-9]/i;
	// Secondary
	if (item == "secondaryscore")
		var pat = /[^0-9]/i;
	else if (item == "secondaryarea")
		var pat = /[^a-z ]/i;
	else if (item == "secondarycca")
		var pat = /[^a-z 0-9,()\/\-$:'*.&@!]/i;
	else if (item == "secondarysubject")
		var pat = /[^a-z ,&-()'123\/*]/i;
	else if (item == "secondarycode")
		var pat = /[^0-9]/i;
	else if (item == "secondarymrt")
		var pat = /[^a-z ]/i;
	else if (item == "secondarybus")
		var pat = /[^a-z0-9]/i;
	// Poly
	if (item == "polycof")
		var pat = /[^0-9]/i;
	else if (item == "polyarea")
		var pat = /[^a-z ]/i;
	else if (item == "polyccluster")
		var pat = /[^a-z &]/i;
	else if (item == "polyctitle")
		var pat = /[^a-z &\/()\-,]/i;
	else if (item == "polycode")
		var pat = /[^0-9]/i;
	else if (item == "polymrt")
		var pat = /[^a-z ]/i;
	else if (item == "polybus")
		var pat = /[^a-z0-9]/i;
	// JC
	if (item == "jccop")
		var pat = /[^0-9]/i;
	else if (item == "jcarea")
		var pat = /[^a-z ]/i;
	else if (item == "jcsubject")
		var pat = /[^a-z ,&\-()'123\/*]/i;
	else if (item == "jccode")
		var pat = /[^0-9]/i;
	else if (item == "jcmrt")
		var pat = /[^a-z ]/i;
	else if (item == "jcbus")
		var pat = /[^a-z0-9]/i;
	// ITE
	if (item == "iteenglish")
		var pat = /[^0-9]/i;
	else if (item == "itemath")
		var pat = /[^0-9]/i;
	else if (item == "itecode")
		var pat = /[^0-9]/i;
	else if (item == "itemrt")
		var pat = /[^a-z ]/i;
	else if (item == "itebus")
		var pat = /[^a-z0-9]/i;
	// Uni
	if (item == "uniname")
		var pat = /[^a-z ]/i;
	else if (item == "unisubject")
		var pat = /[^a-z ,&\-()'123\/*]/i;
	else if (item == "uniarea")
		var pat = /[^a-z ]/i;
	else if (item == "unicode")
		var pat = /[^0-9]/i;
	else if (item == "unimrt")
		var pat = /[^a-z ]/i;
	else if (item == "unibus")
		var pat = /[^a-z0-9]/i;

    if (pat.test(value))
    {
	    alert("Invalid input. Enter again!");
	    document.getElementById(item).focus();
    }
}