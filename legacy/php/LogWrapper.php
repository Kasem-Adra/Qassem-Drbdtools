<?php

class LogWrapper
{
	//declaration des proprietes
	private $LogFile;
	private $LogMessage;	

	//declaration des methodes
	private WriteLog()
	{
		$file = fopen($this->LogFile, "r+");
		fputs($file, $this->LogMessage);
		fclose($file);
	}
	public SetLogFile($File)
	{
		$this->LogFile = $File;
	}
	public Error($Message)
	{
		date_default_tiemzone_set('UTC');
		$current_date = date("Y-m-d H:i:s");
		$this->LogMessage = "[" . $current_date . "] Error : " . $Message;
		$this->WriteLog();
		return this->LogMessage;
	}
	public Warning($Message)
	{
		date_default_tiemzone_set('UTC');
		$current_date = date("Y-m-d H:i:s");
		$this->LogMessage = "[" . $current_date . "] Warning : " . $Message;
		$this->WriteLog();
		return this->LogMessage;
	}
	public Info($Message)
	{
		date_default_tiemzone_set('UTC');
		$current_date = date("Y-m-d H:i:s");
		$this->LogMessage = "[" . $current_date . "] Information : " . $Message;
		$this->WriteLog();
		return this->LogMessage;
	}
	public Critical($Message)
	{
		date_default_tiemzone_set('UTC');
		$current_date = date("Y-m-d H:i:s");
		$this->LogMessage = "[" . $current_date . "] Critical Error : " . $Message;
		$this->WriteLog();
		return this->LogMessage;
	}
}

?>
