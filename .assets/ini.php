<?php

function getInidatas()
	{
		
		$ini_file = 'C:\laragon\usr\laragon.ini';

		// Datei einlesen
		$ini_content = file($ini_file);

		// Variablen initialisieren
		$hostSuffix = '';
		$apacheVer = '';
		$phpVer = '';
		$mysqlVer = '';

		// Aktuelle Sektion initialisieren
		$current_section = '';

		// Datei Zeile für Zeile durchgehen
		foreach ($ini_content as $line) 
			{
				// Zeilen ohne Kommentare und leere Zeilen verarbeiten
				$line = trim($line);
				if (empty($line) || $line[0] == ';' || $line[0] == '#') {
					continue;
				}
				
				// Sektion erkennen
				if ($line[0] == '[' && $line[strlen($line) - 1] == ']') {
					$current_section = strtolower(trim($line, '[]'));
					continue;
				}
				
				// HostnameFormat extrahieren
				if (strpos($line, 'HostnameFormat=') !== false && $current_section == 'preferences') {
					$hostSuffix = str_replace(array('HostnameFormat=', '{name}'), '', $line);
					$hostSuffix = trim($hostSuffix);
				}
				
				// Apache Version extrahieren
				if (strpos($line, 'Version=httpd-') !== false && $current_section == 'apache') {
					$apacheVer = preg_replace('/[^0-9.]/', '', str_replace('Version=httpd-', '', $line));
					$apacheVer = trim($apacheVer);					
				}
				
				if (strpos($line, 'SSLEnabled=') !== false && $current_section == 'apache') {
					$sslEnabled = trim(str_replace('SSLEnabled=', '', $line));
				}
				
				// PHP Version extrahieren
				if (strpos($line, 'Version=php-') !== false && $current_section == 'php') {
					$phpVer = preg_replace('/[^0-9.]/', '', str_replace('Version=php-', '', $line));
					$phpVer = trim($phpVer);
				}
				
				// MySQL Version extrahieren
				if (strpos($line, 'Version=mysql-') !== false && $current_section == 'mysql') {
					$mysqlVer = preg_replace('/[^0-9.]/', '', $line);
					$mysqlVer = trim($mysqlVer);
				}						
			}
			
		// Openssl Version ermitteln	
		if($sslEnabled == '1')
			{				
				// Kommando ausführen und gesamte Ausgabe in ein Array speichern
				$phpInfolist = [];
				exec('php -i', $phpInfolist);
				
				// Variable initialisieren
				$sslv = '';
				
				// ini Liste durchsuchen und gewünschte Zeile extrahieren
				foreach ($phpInfolist as $line)
					{
						if (strpos($line, 'SSL Version') !== false)
							{
								$sslv = preg_replace('/[^0-9.]/', '', str_replace('SSL Version => ', '', trim($line)));
								break;
							}
					}
			}
		else
		{
			$sslv = "/";
		}
			
		
		$datas = [
					'hsfx'=>$hostSuffix,
					'aver'=>$apacheVer,
					'mver'=>$mysqlVer,
					'pver'=>$phpVer,
					'sslv'=>$sslv];
		return $datas;
	}

	

	
function listHosts() 
	{
		$directory = $_SERVER['DOCUMENT_ROOT'];
		
		// Array für Verzeichnisse initialisieren
		$directories = [];
		
		// Inhalte des Verzeichnisses lesen
		$contents = scandir($directory);
		
		// Durch die Inhalte iterieren
		foreach ($contents as $item) 
			{
				// Verzeichnisse "." und ".." sowie diese Verzeichnisse, deren Nmae mit einem Punkt beginnen ignorieren
				if ($item != "." && $item != ".." && substr($item, 0, 1) != ".")
					{
						// Vollständiger Pfad des aktuellen Elements
						$fullPath = $directory . DIRECTORY_SEPARATOR . $item;
						
						// Prüfen, ob es sich um ein Verzeichnis handelt
						if (is_dir($fullPath))
							{
								// Verzeichnisnamen die Endung anhängen und zur Liste hinzufügen
								$directories[] = $item;
							}
					}
			}
		return $directories;
	}