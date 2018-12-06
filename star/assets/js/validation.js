function validation()
{
	var preenchido = true;

	// Validação do campo nome;

	if(document.getElementById('name').value == "")
	{
		alert("Digite seu nome!");
		preenchido = false;
		return;
	}

	// Validação do campo usuário

	if(document.getElementById('user').value == "")
	{
		alert("Digite um usuário!");
		preenchido = false;
		return;
	}

	// Validação do campo e-mail;

	if(document.getElementById('email').value == "")
	{
		alert("Digite seu email");
		preenchido = false;
		return;
	}

	// Validação do campo senha;

	if(document.getElementById('senha').value == "")
	{
		alert("Insira uma senha");
		preenchido = false;
		return;
	}

	if(preenchido == true)
	{
		document.forms['myFormCad'].submit();
	}
}