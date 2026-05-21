<?php
class linux
{
	//declaration des proprietes
	private $Architecture;
	private $GUI;
	private $Hostname;
	private $Loguser;
	private $Langue;
	private $OS;
	private $Distribution;
	
	//constructeur de classe
	public linux()
	{
		$this->Architecture = exec("echo $CPU");
		$this->GUI = exec("echo $DESKTOP_SESSION");
		$this->Hostname = exec("hostname");
		$this->Loguser = exec("echo $USER");
		$this->Langue = exec("echo $LANG");
		$this->OS = exec("echo $OSTYPE");
		$this->Distribution = exec("cat /proc/version");
	}
	
	//declaration des methodes
	public GetCurrentArchitecture()
	{
		return $this->Architecture;
	}
	public GetCurrentGUI()
	{
		return $this->GUI;
	}
	public GetCurrentHostname()
	{
		return $this->Hostname;
	}
	public GetCurrentUser()
	{
		return $this->loguser;
	}
	public GetCurrentLang()
	{
		return $this->Langue;
	}
	public GetCurrentOS()
	{
		return $this->OS;
	}
	public GetCurrentDistribution()
	{
		return $this->Distribution;
	}	
	
}


?>
