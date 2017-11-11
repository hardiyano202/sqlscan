<?php
error_reporting(0);
function userinput($message){
    global $white, $bold, $greenbg, $redbg, $bluebg, $cln, $lblue, $green;
    $yellowbg = "\e[100m";
    $inputstyle = $cln . $bold . $lblue . "[#] " . $message . " => " . $green ;
  echo $inputstyle;
  }
  function gethttpheader($reallink){
  $hdr = get_headers($reallink);
  foreach ($hdr as $shdr) {
    echo "\n\e[92m\e[1m[i]\e[0m  $shdr";
  }
  echo "\n";

}
$white = "\e[97m";
$yellow = "\e[93m";
$blue   = "\e[34m";
$lblue  = "\e[36m";
$cln    = "\e[0m";
$green  = "\e[92m";
$red    = "\e[91m";
$magenta = "\e[35m";
$bluebg = "\e[44m";
$lbluebg = "\e[106m";
$greenbg = "\e[42m";
$lgreenbg = "\e[102m";
$yellowbg = "\e[43m";
$lyellowbg = "\e[103m";
$redbg = "\e[101m";
$grey = "\e[37m";
$cyan = "\e[36m";
$bold   = "\e[1m";
system("clear");
echo "$green
   ___    ___      _                ___                           
  / __|  / _ \    | |       o O O  / __|    __     __ _    _ _    
  \__ \ | (_) |   | |__    o       \__ \   / _|   / _` |  | ' \   
  |___/  \__\_\   |____|  TS__[O]  |___/   \__|_  \__,_|  |_||_|  
";
Cvar1984:
echo "\n";
userinput("Web yg ingin di scan");
$ip = trim(fgets(STDIN, 1024));
if (strpos($ip, '://') !== false) {
    echo $bold . $red . "\n[!] HTTP / HTTPS Ter Deteksi, input URL tanpa HTTP / HTTPS [!]\n" . $CURLOPT_RETURNTRANSFER;
    goto Cvar1984;
  }elseif (strpos($ip, '.') == false) {
    echo $bold . $red . "\n[!] URL Format false [!] \n" . $cln;
    goto Cvar1984;
  }elseif (strpos($ip, ' ') !== false) {
    echo $bold . $red . "\n[!] URL Format false [!] \n" . $cln;
    goto Cvar1984;
  }else {
        $ipsl = "http://";
      }
	  scanlist:
	  system("clear");
    echo "$yellow===================== Cvar1984 =====================\n$white [1] SQL Error Page ( Cari Pages Vuln Sql )$white \n [2] Admin Finder ( Cari Pages Login Admin ) \n$white [B] Back ( Ganti Target ) \n$red [Q]  Quit! \n$yellow===================== Cvar1984 =====================\n\n" . $cln;
	askscan:
    userinput("Pilih Aksi Pada List");
    $scan = trim(fgets(STDIN, 1024));

    if (!in_array($scan, array(
        '1',
        '2',
        'B',
        'Q',
        'b',
        'q',
    ), true)) {
        echo $bold . $red . "\n[!] Input false [!] \n\n" . $cln;
        goto askscan;
      }else {
        if ($scan == "0") {
            goto Cvar1984;
          }elseif ($scan == 'q' | $scan == 'Q') {
            die();
          }elseif ($scan == 'b' || $scan == 'B') {
            system("clear");
            goto Cvar1984;
          }
		  elseif ($scan == "2") {
            echo "\n$cln" . $lblue . $bold . "[+] Scanning... \n";
            echo $blue . $bold . "[i] Scanning :\e[92m $ipsl" . "$ip \n";
            echo $bold . $yellow . "[S] Scan Tipe : Admin Panel Finder" . $cln;
            echo "\n\n";
            echo $bold . $blue . "\n[i] Loading Crawler File ....\n" . $cln;
            if (file_exists("admin.ini")) {
                echo $bold . $green . "\n [i] admin.ini Found! Scanning  Admin Pannel [i]\n" . $cln;
                $crawllnk = file_get_contents("admin.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl) {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[U] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[U] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response: " . $httpCode . $cln;
                      }
                    curl_close($handle);
                  }
              }else {
                echo "\n 404 File Not Found, Aborting Scan ....\n";
              }
            if (file_exists("backup.ini"))
              {
                echo "\n[-] Backup Crawler File Found! Scanning Situs Backups [-]\n";
                $crawllnk = file_get_contents("backup.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl)
                  {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[U] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[U] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response: " . $httpCode . $cln;
                      }
                    curl_close($handle);
                  }
              }else {
                echo "\n File Not Found, Aborting Crawl ....\n";
              }if (file_exists("others.ini")) {
                echo "\n[-] General Crawler File Found! Crawling The Site [-]\n";
                $crawllnk = file_get_contents("others.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl) {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response: " . $httpCode . $cln;
                      }curl_close($handle);
                  }
              }else {
                echo "\n 404 File Not Found, Aborting Scan ....\n";
              }
          }
		  elseif ($scan == "1") {
            $reallink = $ipsl . $ip;
            $srccd    = file_get_contents($reallink);
            $lwwww    = str_replace("www.", "", $ip);
            echo "\n$cln" . $lblue . $bold . "[+] Scanning... \n";
            echo $blue . $bold . "[i] Scanning :\e[92m $ipsl" . "$ip \n";
            echo $bold . $yellow . "[*] Tipe Scan : SQL Error Page" . $cln;
            echo "\n\n";
            $lulzurl = $reallink;
            $html    = file_get_contents($lulzurl);
            $dom     = new DOMDocument;
            @$dom->loadHTML($html);
            $links = $dom->getElementsByTagName('a');
            $vlnk  = 0;
            foreach ($links as $link) {
                $lol = $link->getAttribute('href');
                if (strpos($lol, '?') !== false) {
                    echo $lblue . $bold . "\n[#] " . $yellow . $lol . "\n" . $cln;
                    echo $blue . $bold . "[!] ";
                    $sqllist = file_get_contents('sqlerrors.ini');
                    $sqlist  = explode(',', $sqllist);
                    if (strpos($lol, '://') !== false) {
                        $sqlurl = $lol . "'";
                      }else {
                        $sqlurl = $ipsl . $ip . "/" . $lol . "'";
                      }
                    $sqlsc = file_get_contents($sqlurl);
                    $sqlvn = $bold . $red . "Gak Vulnerable";
                    foreach ($sqlist as $sqli) {
                        if (strpos($sqlsc, $sqli) !== false)
                            $sqlvn = $green . $bold . "Vulnerable!!";
                      }
                    echo $sqlvn;
                    echo "\n$cln";
                    echo "\n";
                    $vlnk++;
                  }
              }
            echo "\n" . $blue . $bold . "[!] Scanning : " . $green . $vlnk;
            echo "\n\n";
            echo $bold . $yellow . "[!] Scanning Sukses. Tekan Enter untuk lanjut\n\n";
            trim(fgets(STDIN, 1024));
            goto scanlist;
          }else goto scanlist;
	  }
?>
