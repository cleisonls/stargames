function verificar()
{
	var user = document.getElementById('usu').value;
	var pass = document.getElementById('pass').value;

	if(user == '' || pass == '')
	{
		alert('Há campo(s) vazio(s)!');
	}
	else
	{
		document.forms['meu_form'].submit();
	}
}