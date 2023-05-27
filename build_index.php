



function c() {
    if (strtoupper(substr(PHP_OS,0,3)) == 'WIN') {
        $clear = 'cls';
    } else {
        $clear = 'clear';
    }
    pclose(popen($clear,'w'));
}

function movePage() {
        return [
         0 => "ERROR CONNECTION",
         100 => "Response 100 Continue",
         101 => "Response 101 Switching Protocols",
         200 => "Response 200 OK",
         201 => "Response 201 Created",
         202 => "Response 202 Accepted",
         203 => "Response 203 Non-Authoritative Information",
         204 => "Response 204 No Content",
         205 => "Response 205 Reset Content",
         206 => "Response 206 Partial Content",
         300 => "Response 300 Multiple Choices",
         301 => "Response 301 Moved Permanently",
         302 => "Response 302 Found",
         303 => "Response 303 See Other",
         304 => "Response 304 Not Modified",
         305 => "Response 305 Use Proxy",
         307 => "Response 307 Temporary Redirect",
         400 => "Response 400 Bad Request",
         401 => "Response 401 Unauthorized",
         402 => "Response 402 Payment Required",
         403 => "Response 403 Forbidden",
         404 => "Response 404 Not Found",
         405 => "Response 405 Method Not Allowed",
         406 => "Response 406 Not Acceptable",
         407 => "Response 407 Proxy Authentication Required",
         408 => "Response 408 Request Time-out",
         409 => "Response 409 Conflict",
         410 => "Response 410 Gone",
         411 => "Response 411 Length Required",
         412 => "Response 412 Precondition Failed",
         413 => "Response 413 Request Entity Too Large",
         414 => "Response 414 Request-URI Too Large",
         415 => "Response 415 Unsupported Media Type",
         416 => "Response 416 Requested range not satisfiable",
         417 => "Response 417 Expectation Failed",
         500 => "Response 500 Internal Server Error",
         501 => "Response 501 Not Implemented",
         502 => "Response 502 Bad Gateway",
         503 => "Response 503 Service Unavailable",
         504 => "Response 504 Gateway Time-out"
         ];
}

function methode_captcha() {
    return [
        1 => "captchaai",
        2 => "azcaptcha",
        3 => "anycaptcha"
    ];
}

function trimed($txt) {
    return preg_replace('/\s+/', '',$txt);
}
        
function t24() {
    tmr(1,60*60*24+120);
}
        
function lah($x=0,$inp=0) {
    if($x == 1) {
        ket(k.explode("/",host)[2],m."no ".$inp." can be bypassed").line();
    } elseif($x == 2) {
        ket(k.explode("/",host)[2],m."sorry there is no method for ".$inp).line();
    } else {
        ket(k.explode("/",host)[2],m."sorry no energy").line();
    }
}

function rt() {
    c();
    $t = $_SERVER["TMPDIR"];
    if(file_exists($t)) {
        system("rm -rf $t/* 2>&1");
        return true;
    }
}

function tx($a) {
    print(h."Input ".$a.c." > ".p);
    return trim(fgets(STDIN));
}

function ex($a,$b,$c,$d) {
    return explode($b,explode($a,$d)[$c])[0];
}

function Save($a) {
    if(file_exists($a)) {$b=file_get_contents($a);
    } else {
        $b = tx($a);n;file_put_contents($a,$b);
    }
    return $b;
}

function an($input) {
    $a = str_split($input); 
    foreach ($a as $b) {print $b; usleep(1500);
    }
}

function tmr($a,$tmr) {
    date_default_timezone_set('UTC').r();
    $timr = time()+$tmr;
    $col = [b,c,h,k,m,p,u];
    while(true):
        $res = $timr-time();
        if($res<1) {
            break;
        }
        if($a == 1) {
            print $col[array_rand($col)].'CLAIM NEXT TIME:'.date(' H',$res).'H'.date(' i',$res).'M'.date(' s',$res).'S'.d;r();
        } elseif($a == 2) {
            print $col[array_rand($col)].'please wait'.date(' H:i:s ',$res).d;r();
        }
    endwhile;
}

function L($t) {
    r();
    $col = [b,c,h,k,m,p,u];
    for($i=1;$i<=$t;$i++) {
        print $col[array_rand($col)]."\rLoading... [".intval($i/$t*100)."%]";
        flush();
        sleep(1);
    }
    r();
}

function r() {
    sleep(1);
    print "\r".str_repeat(' ',62)."\r";
}

function line() {
    print str_repeat(p.'─',50).n;
}

function ket($a,$aa,$b=0,$bb=0,$c=0,$cc=0,$d=0,$dd=0) {
    if($a or $aa) {
        print h.$a.c." > ".p.$aa.n;
    } if($b or $bb) {
        print h.$b.c." > ".p.$bb.n;
    } if($c or $cc) {
        print h.$c.c." > ".p.$cc.n;
    } if($d or $dd) {
        print h.$d.c." > ".p.$dd.n;
    }
}

function ket_line($a,$aa,$b=0,$bb=0,$c=0,$cc=0) {
    if($a or $aa) {
        print h.$a.c." > ".p.$aa;
    } if($b or $bb) {
        print " | ".h.$b.c." > ".p.$bb;
    } if($c or $cc) {print " | ".h.$c.c." > ".p.$cc;
    }
    print n;
}

function curl($url,$head = 0,$post = 0,$follow = 0,$cookiejar = 0) {
    while(TRUE) {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HEADER => TRUE
        )
    );
    if($follow) {
        curl_setopt_array($ch, array(
            CURLOPT_FOLLOWLOCATION => $follow
        )
    );
}
if($head) {
    curl_setopt_array($ch, array(
        CURLOPT_HTTPHEADER => $head
    )
);
}
if($cookiejar) {
    curl_setopt_array($ch, array(
        CURLOPT_COOKIEFILE => $cookiejar,
        CURLOPT_COOKIEJAR => $cookiejar
    )
);
}
if($post) {
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => $post
    )
);
}
$response = curl_exec($ch);
if(!curl_getinfo($ch)) {
    return "Curl Error : ".curl_error($ch);
} else {
    $respHeaders = substr($response,0,curl_getinfo($ch,CURLINFO_HEADER_SIZE));
    $info = curl_getinfo($ch);
    $body = substr($response,curl_getinfo($ch,CURLINFO_HEADER_SIZE));
    foreach(explode("\r\n",substr($respHeaders,0,strpos($respHeaders,"\r\n\r\n"))) as $i => $line) {
        if($i == 0) {$headers['http_code'] = $line;
        } else {
            list($key, $value ) = explode(': ',$line);
            $header[$key] = $value;}}
            curl_close($ch);
            $movePage = movePage()[$info["http_code"]];
            if(!$info["primary_ip"]) {
                print m.$movePage;
                r();
                continue;
            } else {
                print p.$movePage;r();
            }
            return [[$header,$info],$body];
        }
    }
}


function asci($string) {
    $res = ip();
    date_default_timezone_set($res["t"]);
    $acssi = [
        "a" => ["┌─┐","├─┤","┴ ┴"],
        "b" => ["┌┐ ","├┴┐","└─┘"],
        "c" => ["┌─┐","│  ","└─┘"],
        "d" => ["┌┬┐"," ││","─┴┘"],
        "e" => ["┌─┐","├┤ ","└─┘"],
        "f" => ["┌─┐","├┤ ","└  "],
        "g" => ["┌─┐","│ ┬","└─┘"],
        "h" => ["┬ ┬","├─┤","┴ ┴"],
        "i" => ["┬","│","┴"],
        "j" => [" ┬"," │","└┘"],
        "k" => ["┬┌─","├┴┐","┴ ┴"],
        "l" => ["┬  ","│  ","┴─┘"],
        "m" => ["┌┬┐","│││","┴ ┴"],
        "n" => ["┌┐┌","│││","┘└┘"],
        "o" => ["┌─┐","│ │","└─┘"],
        "p" => ["┌─┐","├─┘","┴  "],
        "q" => ["┌─┐ ","│─┼┐","└─┘└"],
        "r" => ["┬─┐","├┬┘","┴└─"],
        "s" => ["┌─┐","└─┐","└─┘"],
        "t" => ["┌┬┐"," │ "," ┴ "],
        "u" => ["┬ ┬","│ │","└─┘"],
        "v" => ["┬  ┬","└┐┌┘"," └┘ "],
        "w" => ["┬ ┬","│││","└┴┘"],
        "x" => ["─┐ ┬","┌┴┬┘","┴ └─"],
        "y" => ["┬ ┬","└┬┘"," ┴ "],
        "z" => ["┌─┐","┌─┘","└─┘"],
        " "=>[" "," "," "],
        "1" => ["┬","│","┴"],  
        "2" => ["┌─┐","┌─┘","└─┘"],  
        "3" => ["┌─┐"," ├┤","└─┘"],
        "4" => ["┬ ┬","└─┤","  ┘"],
        "5" => ["┌─┐","└─┐","└─┘"],
        "6" => ["┌─┐","├─┐","└─┘"],
        "7" => ["┌─┐","  │","  ┘"],
        "8" => ["┌─┐","├─┤","└─┘"],
        "9" => ["┌─┐","└─┤","└─┘"],
        "0" => ["┌─┐","│ │","└─┘"]
    ];
    $x = str_split($string);
    print p."time:".date("H:i").str_repeat(p.' ',7).mp." ▶ ".d.p." Re:Hine".str_repeat(p.' ',7)."date:".date("m/d/Y").n;
    line();
    print " ";
    foreach($x as $data) {
    print h.$acssi[$data][0];
    }
    print h." country ".c." > ".p.$res["c"].n." ";
    foreach($x as $data) {
    print c.$acssi[$data][1];
    }
    print h." region".c." > ".p.$res["r"].n." ";
    foreach($x as $data) {
    print p.$acssi[$data][2];
    }
    print h." ip".c." > ".p.$res["i"].n;
    foreach($x as $data) {
    print c.$acssi[$data][3];
    }
    line();
}

function ip() {
    $if = json_decode(file_get_contents("https://ipinfo.io/?utm_source=ipecho.net&utm_medium=referral&utm_campaign=upsell_sister_sites"));
        return [
            "i"=>$if->ip,
            "r"=>$if->region,
            "c"=>$if->country,
            "t"=>$if->timezone
        ];
}
        
function hmc($xml=0) {
    global $u_a,$u_c;
    $h[] = "Host: ".explode("/",host)[2];
    if($xml) {
    $h[] = "accept: application/json, text/javascript, */*; q=0.01";
    $h[] = "x-requested-with: XMLHttpRequest";}
    $h[] = "cache-control: max-age=0";
    $h[] = "cookie: ".$u_c;
    $h[] = "user-agent: ".$u_a;
    return $h;
}
        
function hac($xml=0) {
    $h[] = "Host:".explode("/",host)[2];
    $h[] = "cache-control: max-age=0";
    if($xml) {
    $h[] = "accept: application/json, text/javascript, */*; q=0.01";
    $h[] = "x-requested-with: XMLHttpRequest";}
    $h[] = "user-agent:Mozilla/5.0 (Linux; Android 11; M2012K11AG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36";
    return $h;
}
        
function antb($ab) {
    $a = $ab[1][0];
    $b = $ab[1][1];
    $c = $ab[1][2];
    return [
        [" ".$b,$c,$a],
        [" ".$a,$b,$c],
        [" ".$a,$c,$b],
        [" ".$b,$a,$c],
        [" ".$c,$b,$a],
        [" ".$c,$a,$b]
    ];
}

rt();
c();
const b = "\033[1;34m",
      c = "\033[1;36m",
      h = "\033[1;32m",
      k = "\033[1;33m",
      m = "\033[1;31m",
      mp = "\033[101m\033[1;37m",
      p = "\033[1;37m",
      u = "\033[1;35m",
      d = "\033[0m",
      n = "\n";
