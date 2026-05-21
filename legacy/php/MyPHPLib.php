<?php 
// copy recursive
function RecurseCopy($src,$dst) 
{ 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
// lecture saisie clavier
function ReadStdIn()
{
        $fr=fopen("php://stdin","r"); 
        $input = fgets($fr,128);  
        $input = rtrim($input); 
        fclose ($fr); 
        return $input;
}
// recherche et remplace
function SeeckAndReplace($Search,$Replace,$fichier)
{
	$contenu = str_replace($Search, $Replace, file_get_contents($fichier)); 
	file_put_contents($fichier, $contenu); 
}
// generation de log sous unix
function put_log ($LogFile,$LogMessage)
{
	// Dfinit le fuseau horaire par dfaut  utiliser
	date_default_timezone_set('UTC');
	$current_date = date("Y-m-d H:i:s"); 
	$cmd = 'echo \"[' .$current_date. '] Restore Log : ' . $LogMessage . ' \" >> ' . $LogFile ;
	shell_exec($cmd);
}
// recuperation de la date courante
function get_date ()
{
// Dfinit le fuseau horaire par dfaut  utiliser
	date_default_timezone_set('UTC');
	$current_date = date("Y-m-d H:i:s"); 
	return $current_date;
}
// recuperer son nom de host pour du shell
function get_hostname ()
{
	$Host = exec("hostname");
	return $Host;
}
// recuperer current user
function get_current_user ()
{
	$current_user = exec("$USER");
	return $current_user;
}

function SshCmd($host, $login, $mdp, $command)
{
	if(!function_exists("ssh2_connect")) die ("function ssh2_connect does not exist");
	if (!($con = ssh2_connect($host, 22))) 
		{
			return "echec connexion";
		}
	else
		{
			if (!ssh2_auth_password($con, $login, $mdp))
			{
				return "echec authentification";
			}
			else
			{
				if(!($stream = ssh2_exec($con, $command)))
				{
					return "echec execution de la commande";
				}
				else
				{
					stream_set_blocking($stream, true);
					$data ="";
					while ($buf = fread($stream, 4096))
					{
						$data .= $buf;						
					}
				fclose($stream);
				return $data;
				}
			}
		}
}

function ScpPut($host, $login, $mdp, $src, $dest)
{
	if(!function_exists("ssh2_connect")) die ("function ssh2_connect does not exist");
	if (!($con = ssh2_connect($host, 22))) 
		{
			return "echec connexion";
		}
	else
		{
			if (!ssh2_auth_password($con, $login, $mdp))
			{
				return "echec authentification";
			}
			else
			{
				ssh2_scp_send($con, $src, $dest, 0644);
				return 0;
			}
		}
}

function ScpGet($host, $login, $mdp, $src, $dest)
{
	if(!function_exists("ssh2_connect")) die ("function ssh2_connect does not exist");
	if (!($con = ssh2_connect($host, 22))) 
		{
			return "echec connexion";
		}
	else
		{
			if (!ssh2_auth_password($con, $login, $mdp))
			{
				return "echec authentification";
			}
			else
			{
				ssh2_scp_recv($con, $src, $dest);
				return 0;
			}
		}
}



?>