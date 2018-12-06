function validation()
{
	var preenchido = true;

	// Validação do campo e-mail;

	if(document.getElementById('email').value == "" || 
		document.getElementById('senha').value == "")
	{
		alert("O campo está em branco ou não foi preenchido corretamente!");
		preenchido = false;
		return;
	}

	if(preenchido == true)
	{
		document.forms['myFormLog'].submit();
	}
}