//die(bypass_shortlinks("https://ez4short.com/PqevhJw"));

if(!file("config.php")) {
    print p."config.php file has been added";
    r();
    file_put_contents("config.php",get_e("https://raw.githubusercontent.com/marcoleus/build/main/config.php"));
}
function multiexplode($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0],$string);
    return explode($delimiters[0],$ready);
}


function visit_short($r,$icon=0) {
    global $config;
    $exp = 0;
    $asf = $config;
    if(file(cookie_short)) {
        unlink(cookie_short);
        sleep(1);
    }
    for($i=0;$i<100;$i++) {
        for($s=0;$s<100;$s++) {
            $open = str_replace(str_split('({['),'',strtolower(str_replace(" ","",$r["name"][$s])));
                if($asf[$i] == $open) {
                    if(explode("/",trim(explode("<",$r["left"][$s])[0]))[0] == 0 or explode("/",trim(explode("<",$r["left"][$s])[0]))[0][0] == "-") {
                        goto up;
                    }
                    if(preg_replace("/[^0-9]/","",$r["visit"][$s])) {
                        if(mode == "af") {
                            $r1 = base_run(host.$r["visit"][$s],http_build_query([$r["token"][1][$s] => $r["token"][2][$s]]));
                        } elseif(mode == "icon") {
                            $data = http_build_query([
                                "cID" => 0,
                                "rT" => 1,
                                "tM" => "light"
                            ]);
                            $r2 = base_run(host."system/libs/captcha/request.php",$data)["json"];
                            libs:
                            $x = -1;
                            while(true) {
                                $x++;
                                if(!$r2[$x]) {
                                    goto libs;
                                }
                                $data1 = http_build_query([
                                    "cID" => 0,
                                    "pC" => $r2[$x],
                                    "rT" => 2
                                ]);
                                base_run(host."system/libs/captcha/request.php",$data1);
                                $data2 = http_build_query([
                                    "a" => "getShortlink",
                                    "data" => preg_replace("/[^0-9]/","",$r["visit"][$s]),
                                    "token" => $r["token"],
                                    "captcha-idhf" => 0,
                                    "captcha-hf" => $r2[$x]
                                ]);
                                $res = base_run(host."system/ajax.php",$data2)["json"];
                                if($res->shortlink) {
                                    $r1["url"] = $res->shortlink;
                                    goto run;
                                }
                            }
                        } elseif(mode == "no_icon") {
                            $data = http_build_query([
                                "a" => "getShortlink",
                                "data" => preg_replace("/[^0-9]/",
                                "",$r["visit"][$s]),
                                "token" => $r["token"]
                            ]);
                            $res = base_run(host."system/ajax.php",$data)["json"];
                            if($res->shortlink) {
                                $r1["url"] = $res->shortlink;
                                goto run;
                            }
                        } elseif(mode == "vie_free") {
                            if($r["token_csrf"][1][0]) {
                                $data = http_build_query([
                                    explode('"',$r["token_csrf"][1][0])[0] => $r["token_csrf"][2][0],
                                    $r["token_csrf"][1][1] => $r["token_csrf"][2][1]
                                ]);
                            }
                            $r1 = base_run($r["visit"][$s],$data);
                            if($r1["url1"]) {
                                $r1["url"] = $r1["url1"];
                            }
                        } else {
                            die(m."mode bypass not found".n);
                        }
                        run:
                        if(!parse_url($r1["url"])["scheme"]) {
                            print m."Failed to generate this link ".p.$r["name"][$s];
                            r();
                            return "refresh";
                        }
                        ket_line("",$r["name"][$s],"left",trim(explode("<",$r["left"][$s])[0]));
                        ket("",k.$r1["url"]).line();
                        refresh:
                        $exp++;
                        if($exp == 4) {
                            goto up;
                        }
                        $r2 = bypass_shortlinks($r1["url"]);
                        if(!$r2) {
                            goto refresh;
                        }
                        return $r2;
                    }
                }
            }
            up:
        }
    }




function bypass_shortlinks($url) {
    $coundown = 15;
    $host = parse_url(
        $url)["host"];
        $query = parse_url($url);
        if(explode("=",$query["query"])[0] == "api") {
            $url = "https://".explode("=",$query["query"])[2];
            $host = parse_url($url)["host"];
        }
        if(explode("p=",$url)[1]) {
            $url = "https://ser7.crazyblog.in".explode("p=",$url)[1];
            $host = parse_url($url)["host"];
        }
        if(preg_match("#(link.freeltc.top|short.freeltc.top|ez4short.com|droplink.co|zuba.link|nx.chainfo.xyz|go.bitcosite.com|flyzu.icu|go.flyzu.icu|linkjust.com|owllink.net|birdurls.com|go.birdurls.com|go.owllink.net|adbull.me|link1s.net|link1s.com|ex-foary.com|shortzu.icu|clickzu.icu|ser2.crazyblog.in|ser3.crazyblog.in|link.adshorti.xyz|go.softindex.website|cbshort.com|link.shorti.io|sclick.crazyblog.in|adrev.link|go.cuturl.in|linkfly.me|alwrificlick.site|go.alwrificlick.site|url.mozlink.net|go.megafly.in|go.megaurl.in|link.usalink.io)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            if(preg_match("#(adbull.me)#is",$host)) {
                $referer = "https://deportealdia.live/";
            } elseif(preg_match("#(linkjust.com)#is",$host)) {
                $referer = "https://forexrw7.com/";     } elseif(preg_match("#(flyzu.icu|go.flyzu.icu)#is",$host)) {
                $referer = "https://zubatecno.com/";
            } elseif(preg_match("#(nx.chainfo.xyz|go.bitcosite.com)#is",$host)) {
                $referer = "https://bitzite.com/";
            } elseif(preg_match("#(zuba.link)#is",$host)) {
                $referer = "https://blog.battleroyal.online/";
            } elseif(preg_match("#(droplink.co)#is",$host)) {
                $referer = "https://yoshare.net/";          } elseif(preg_match("#(ez4short.com)#is",$host)) {
                $referer = "https://techmody.io/";
            } else {
                $referer = 0;
            }
            if(preg_match("#(birdurls.com|owllink.net|go.birdurls.com|go.owllink.net)#is",$host)) {
                $cloud = 1;
            } else {
                $cloud = 0;
            }
            $url = str_replace("link.freeltc.top","short.freeltc.top",str_replace("nx.chainfo.xyz","go.bitcosite.com",str_replace("flyzu.icu","go.flyzu.icu",str_replace("go.birdurls.com","birdurls.com",str_replace("go.owllink.net","owllink.net",str_replace("link.usalink.io","cdn1.theconomy.me",str_replace("go.megaurl.in","get.megaurl.in",str_replace("go.megafly.in","get.megafly.in",str_replace("go.alwrificlick.site","alwrificlick.site",str_replace("link.shorti.io","shorti.io",str_replace("link.adshorti.xyz","adshorti.xyz",str_replace("url.mozlink.net","go.mozlink.net",str_replace("go.cuturl.in","go.mozlink.net",str_replace("go.softindex.website","softindex.website",str_replace("link.shorti.io","blog.financeandinsurance.xyz",str_replace("ser2","ser3",$url))))))))))))))));
            $run = build($url);
            $r = base_short($run["links"],0,0,$referer,$cloud);
            $t = $r["token_csrf"];
            if(explode('"',$t[1][2])[0] == "ad_form_data") {
                $request_captcha = false;
            } else {
                $request_captcha = true;
            }
            if($request_captcha == true) {
                $method = "recaptchav2";
                $cap = request_captcha($method,$r[$method],$run["links"]);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    $t[1][2] => $t[2][2],
                    $t[1][3] => $t[2][3],
                    "g-recaptcha-response" => $cap,
                    explode('"',$t[1][4])[0] => $t[2][4],
                    explode('"',$t[1][5])[0] => $t[2][5]
                ]);
                $r = base_short($run["links"],"",$data,$run["links"],$cloud);
                $t = $r["token_csrf"];
            }
            if($r["timer"] or $r["timer"] == 0) {
                L($coundown);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    $t[1][2] => $t[2][2],
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r1 = base_short($run["go"][0],1,$data,0,$cloud)["json"];
                if($r1->status == "success") {
                    print h.$r1->status;
                    r();
                    return $r1->url;
                }
            }
        } elseif(preg_match("#(linksly.co|go.linksly.co|illink.net|go.illink.net|shrinke.me|go1.urlcash.click|urlcashh.click|ser7.crazyblog.in|short.pe|shurt.pw|urlcashh.quest|softindex.site|go.urlcash.site|goes1.softindex.website)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            if(preg_match("#(linksly.co|go.linksly.co)#is",$host)) {
                $referer = "https://themezon.net/";
            } else {
                $referer = 0;
            }
            if(preg_match("#(illink.net|go.illink.net)#is",$host)) {
                $cloud = 1;
            } else {
                $cloud = 0;
            }
            $url = str_replace("linksly.co","go.linksly.co",str_replace("go.illink.net","illink.net",str_replace("goes1.softindex.website","softindex.site",str_replace("go.urlcash.site","urlcashh.quest",str_replace("go1.urlcash.click","urlcashh.click",str_replace("short.pe","shurt.pw",$url))))));
            $run = build($url);
            $r = base_short($run["links"],0,0,$referer,$cloud);
            $t = $r["token_csrf"];
            if(explode('"',$t[1][2])[0] == "ad_form_data") {
                $request_captcha = false;
            } else {
                $request_captcha = true;
            }
            if($request_captcha == true) {
                $method = "recaptchav2";
                $cap = request_captcha($method,$r[$method],$run["links"]);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    explode('"',$t[1][2])[0] => "",
                    "f_n" => $t[2][2],
                    "g-recaptcha-response" => $cap,
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r = base_short($run["links"],"",$data,$run["links"],$cloud);
                $t = $r["token_csrf"];
            }
            if($r["timer"] or $r["timer"] == 0) {
                L($coundown);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    $t[1][2] => $t[2][2],
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r1 = base_short($run["go"][0],1,$data,0,$cloud)["json"];
                if($r1->status == "success") {
                    print h.$r1->status;
                    r();
                    return $r1->url;
                }
            }
        } elseif(preg_match("#(clik.pw)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);$r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $method = "hcaptcha";
            if($r[$method]) {
                $cap = request_captcha($method,$r[$method],$run["links"]);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    explode('"',$t[1][2])[0] => "",
                    "f_n" => $t[2][2],
                    "g-recaptcha-response" => $cap,
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r = base_short($run["links"],"",$data);
                $t = $r["token_csrf"];
            }
            if($r["timer"] or $r["timer"] == 0) {
                L($coundown);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    $t[1][2] => $t[2][2],
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r1 = base_short($run["go"][0],1,$data)["json"];
                if($r1->status == "success") {
                    print h.$r1->status;
                    r();
                    return $r1->url;
                }
            }
        } elseif(preg_match("#(try2link.com)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($url);
            $url_dec = build(build(build(build($r["url"])["decode"])["decode"])["decode"])["decode"];
            if(!$url_dec) {
                $url_dec = build(build(build($r["url"])["decode"])["decode"])["decode"];
            }
            $dec = base_short($url_dec);
            $r1 = base_short($dec["url"]);
            if($r1["timer"] or $r1["timer"] == 0) {
                L($coundown);
                $t = $r1["token_csrf"];
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    explode('"',$t[1][1])[0] => $t[2][1],
                    $t[1][2] => $t[2][2],
                    explode('"',$t[1][3])[0] => $t[2][3],
                    explode('"',$t[1][4])[0] => $t[2][4]
                ]);
                $r2 = base_short($run["go"][0],1,$data)["json"];
                if($r2->status == "success") {
                    print h.$r2->status;
                    r();
                    return $r2->url;
                }
            }
        } elseif(preg_match("#(tii.la)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0],
                $t[1][1] => $t[2][1],$t[1][2] => $t[2][2],
                $t[1][3] => $t[2][3]
            ]);
            $r1 = base_short($run["links"],"",$data);
            if($r1["timer"] or $r1["timer"] == 0) {
                L($coundown);
                $t = $r1["token_csrf"];
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    $t[1][1] => $t[2][1],
                    $t[1][2] => $t[2][2]
                ]);
                $r2 = base_short($run["go"][0],1,$data)["json"];
                if($r2->status == "success") {
                    print h.$r2->status;
                    r();
                    return $r2->url;
                }
            }
        } elseif(preg_match("#(petafly.me|nonofly.me)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            pet:
            $r = base_short($run["links"]);
            if(!$r["url"]) {
                goto pet;
            }
            peta:
            $r1 = base_short($r["url"]);
            if(!$r1["url"]) {
                goto peta;
            }
            petafly:
            $r2 = base_short($r1["url"]);
            if(!$r2["url2"][0]) {
                goto petafly;
            }
            $run = build($r2["url2"][0]);
            $r3 = base_short($run["links"]);
            $t3 = $r3["token_csrf"];
            if($t3[2][3] == 2) {
                $data3 = http_build_query([
                    $t3[1][0] => $t3[2][0],
                    explode('"',$t3[1][1])[0] => $t3[2][1],
                    $t3[1][2] => $t3[2][2],
                    $t3[1][3] => $t3[2][3],
                    explode('"',$t3[1][4])[0] => $t3[2][4],
                    explode('"',$t3[1][5])[0] => $t3[2][5]
                ]);
                $r3 = base_short($run["links"],"",$data3);
            }
            $t3 = $r3["token_csrf"];
            if($t3[2][3] == 3) {
                $data3 = http_build_query([
                    $t3[1][0] => $t3[2][0],
                    explode('"',$t3[1][1])[0] => $t3[2][1],
                    $t3[1][2] => $t3[2][2],
                    $t3[1][3] => $t3[2][3],
                    explode('"',$t3[1][4])[0] => $t3[2][4],
                    explode('"',$t3[1][5])[0] => $t3[2][5]
                ]);
                $r3 = base_short($run["links"],"",$data3);
                $t3 = $r3["token_csrf"];
                if($t3[2][3] == 4) {
                    $data3 = http_build_query([
                        $t3[1][0] => $t3[2][0],
                        explode('"',$t3[1][1])[0] => $t3[2][1],
                        $t3[1][2] => $t3[2][2],
                        $t3[1][3] => $t3[2][3],
                        explode('"',$t3[1][4])[0] => $t3[2][4],
                        explode('"',$t3[1][5])[0] => $t3[2][5]
                    ]);
                    $r3 = base_short($run["links"],"",$data3);
                    $t3 = $r3["token_csrf"];
                    if($t3[2][3] == 5) {
                        $data3 = http_build_query([
                            $t3[1][0] => $t3[2][0],
                            explode('"',$t3[1][1])[0] => $t3[2][1],
                            $t3[1][2] => $t3[2][2],
                            $t3[1][3] => $t3[2][3],
                            explode('"',$t3[1][4])[0] => $t3[2][4],
                            explode('"',$t3[1][5])[0] => $t3[2][5]
                        ]);
                        $r3 = base_short($run["links"],"",$data3);
                        $t3 = $r3["token_csrf"];
                        if($t3[2][3] == 6) {
                            $data3 = http_build_query([
                                $t3[1][0] => $t3[2][0],
                                explode('"',$t3[1][1])[0] => $t3[2][1],
                                $t3[1][2] => $t3[2][2],
                                $t3[1][3] => $t3[2][3],
                                explode('"',$t3[1][4])[0] => $t3[2][4],
                                explode('"',$t3[1][5])[0] => $t3[2][5]
                            ]);
                            $r3 = base_short($run["links"],"",$data3);
                            $t3 = $r3["token_csrf"];
                            if($t3[2][3] == 7) {
                                $data3 = http_build_query([
                                    $t3[1][0] => $t3[2][0],
                                    explode('"',$t3[1][1])[0] => $t3[2][1],
                                    $t3[1][2] => $t3[2][2],
                                    $t3[1][3] => $t3[2][3],
                                    explode('"',$t3[1][4])[0] => $t3[2][4],
                                    explode('"',$t3[1][5])[0] => $t3[2][5]
                                ]);
                                $r3 = base_short($run["links"],"",$data3);
                                $t3 = $r3["token_csrf"];
                                if($t3[2][3] == 8) {
                                    $data3 = http_build_query([
                                        $t3[1][0] => $t3[2][0],
                                        explode('"',$t3[1][1])[0] => $t3[2][1],
                                        $t3[1][2] => $t3[2][2],
                                        $t3[1][3] => $t3[2][3],
                                        explode('"',$t3[1][4])[0] => $t3[2][4],
                                        explode('"',$t3[1][5])[0] => $t3[2][5]
                                    ]);
                                    $r3 = base_short($run["links"],"",$data3);
                                    $t3 = $r3["token_csrf"];
                                    if($t3[2][3] == 9) {
                                        $data3 = http_build_query([
                                            $t3[1][0] => $t3[2][0],
                                            explode('"',$t3[1][1])[0] => $t3[2][1],
                                            $t3[1][2] => $t3[2][2],
                                            $t3[1][3] => $t3[2][3],
                                            explode('"',$t3[1][4])[0] => $t3[2][4],
                                            explode('"',$t3[1][5])[0] => $t3[2][5]
                                        ]);
                                        $r3 = base_short($run["links"],"",$data3);
                                        $t3 = $r3["token_csrf"];
                                        if($t3[2][3] == 10) {
                                            $data3 = http_build_query([
                                                $t3[1][0] => $t3[2][0],
                                                explode('"',$t3[1][1])[0] => $t3[2][1],
                                                $t3[1][2] => $t3[2][2],
                                                $t3[1][3] => $t3[2][3],
                                                explode('"',$t3[1][4])[0] => $t3[2][4],
                                                explode('"',$t3[1][5])[0] => $t3[2][5]
                                            ]);
                                            $r3 = base_short($run["links"],"",$data3);
                                            $t3 = $r3["token_csrf"];
                                            if($t3[2][3] == 11) {
                                                $data3 = http_build_query([
                                                    $t3[1][0] => $t3[2][0],
                                                    explode('"',$t3[1][1])[0] => $t3[2][1],
                                                    $t3[1][2] => $t3[2][2],
                                                    $t3[1][3] => $t3[2][3],
                                                    explode('"',$t3[1][4])[0] => $t3[2][4],
                                                    explode('"',$t3[1][5])[0] => $t3[2][5]
                                                ]);
                                                $r3 = base_short($run["links"],"",$data3);
                                                $t3 = $r3["token_csrf"];
                                                if($t3[2][3] == 12) {
                                                    $data3 = http_build_query([
                                                        $t3[1][0] => $t3[2][0],
                                                        explode('"',$t3[1][1])[0] => $t3[2][1],
                                                        $t3[1][2] => $t3[2][2],
                                                        $t3[1][3] => $t3[2][3],
                                                        explode('"',$t3[1][4])[0] => $t3[2][4],
                                                        explode('"',$t3[1][5])[0] => $t3[2][5]
                                                    ]);
                                                    $r3 = base_short($run["links"],"",$data3);
                                                    $t3 = $r3["token_csrf"];
                                                    if($t3[2][3] == 13) {
                                                        $data3 = http_build_query([
                                                            $t3[1][0] => $t3[2][0],
                                                            explode('"',$t3[1][1])[0] => $t3[2][1],
                                                            $t3[1][2] => $t3[2][2],
                                                            $t3[1][3] => $t3[2][3],
                                                            explode('"',$t3[1][4])[0] => $t3[2][4],
                                                            explode('"',$t3[1][5])[0] => $t3[2][5]
                                                        ]);
                                                        $r3 = base_short($run["links"],"",$data3);
                                                        $t3 = $r3["token_csrf"];
                                                        if($t3[2][3] == 14) {
                                                            $data3 = http_build_query([
                                                                $t3[1][0] => $t3[2][0],
                                                                explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                $t3[1][2] => $t3[2][2],
                                                                $t3[1][3] => $t3[2][3],
                                                                explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                explode('"',$t3[1][5])[0] => $t3[2][5]
                                                            ]);
                                                            $r3 = base_short($run["links"],"",$data3);
                                                            $t3 = $r3["token_csrf"];
                                                            if($t3[2][3] == 15) {
                                                                $data3 = http_build_query([
                                                                    $t3[1][0] => $t3[2][0],
                                                                    explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                    $t3[1][2] => $t3[2][2],
                                                                    $t3[1][3] => $t3[2][3],
                                                                    explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                    explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                ]);
                                                                $r3 = base_short($run["links"],"",$data3);
                                                                $t3 = $r3["token_csrf"];
                                                                if($t3[2][3] == 16) {
                                                                    $data3 = http_build_query([
                                                                        $t3[1][0] => $t3[2][0],
                                                                        explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                        $t3[1][2] => $t3[2][2],
                                                                        $t3[1][3] => $t3[2][3],
                                                                        explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                        explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                    ]);
                                                                    $r3 = base_short($run["links"],"",$data3);
                                                                    $t3 = $r3["token_csrf"];
                                                                    if($t3[2][3] == 17) {
                                                                        $data3 = http_build_query([
                                                                            $t3[1][0] => $t3[2][0],
                                                                            explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                            $t3[1][2] => $t3[2][2],
                                                                            $t3[1][3] => $t3[2][3],
                                                                            explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                            explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                        ]);
                                                                        $r3 = base_short($run["links"],"",$data3);
                                                                        $t3 = $r3["token_csrf"];
                                                                        if($t3[2][3] == 18) {
                                                                            $data3 = http_build_query([
                                                                                $t3[1][0] => $t3[2][0],
                                                                                explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                                $t3[1][2] => $t3[2][2],
                                                                                $t3[1][3] => $t3[2][3],
                                                                                explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                                explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                            ]);
                                                                            $r3 = base_short($run["links"],"",$data3);
                                                                            $t3 = $r3["token_csrf"];
                                                                            if($t3[2][3] == 19) {
                                                                                $data3 = http_build_query([
                                                                                    $t3[1][0] => $t3[2][0],
                                                                                    explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                                    $t3[1][2] => $t3[2][2],
                                                                                    $t3[1][3] => $t3[2][3],
                                                                                    explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                                    explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                                ]);
                                                                                $r3 = base_short($run["links"],"",$data3);
                                                                                $t3 = $r3["token_csrf"];
                                                                                if($t3[2][3] == 20) {
                                                                                    $data3 = http_build_query([
                                                                                        $t3[1][0] => $t3[2][0],
                                                                                        explode('"',$t3[1][1])[0] => $t3[2][1],
                                                                                        $t3[1][2] => $t3[2][2],
                                                                                        $t3[1][3] => $t3[2][3],
                                                                                        explode('"',$t3[1][4])[0] => $t3[2][4],
                                                                                        explode('"',$t3[1][5])[0] => $t3[2][5]
                                                                                    ]);
                                                                                    $r3 = base_short($run["links"],"",$data3);
                                                                                    $t3 = $r3["token_csrf"];
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if($t3[2][2] == "captcha") {
                $method = "recaptchav2";
                if($r3[$method]) {
                    $cap = request_captcha($method,$r3[$method],$run["links"]);
                    $data3 = http_build_query([
                        $t3[1][0] => $t3[2][0],
                        explode('"',$t3[1][1])[0] => $t3[2][1],
                        $t3[1][2] => $t3[2][2],
                        $t3[1][3] => $t3[2][3],
                        "g-recaptcha-response" => $cap,
                        explode('"',$t3[1][4])[0] => $t3[2][4],
                        explode('"',$t3[1][5])[0] => $t3[2][5]
                    ]);
                    $r3 = base_short($run["links"],"",$data3);
                    $t3 = $r3["token_csrf"];
                }
            }
            if($r3["timer"] or $r3["timer"] == 0) {
                L($coundown);
                $data3 = http_build_query([
                    $t3[1][0] => $t3[2][0],
                    explode('"',$t3[1][1])[0] => $t3[2][1],
                    $t3[1][2] => $t3[2][2],
                    explode('"',$t3[1][3])[0] => $t3[2][3],
                    explode('"',$t3[1][4])[0] => $t3[2][4]
                ]);
                $r4 = base_short($run["go"][2],1,$data3)["json"];
                if($r4->status == "success") {
                    print h.$r4->status;
                    r();
                    return $r4->url;
                }
            }
        } elseif(preg_match("#(jameeltips.us|oko.sh|adshort.co|m.pkr.pw)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build(str_replace("m.pkr.pw","jameeltips.us/blog",str_replace("adshort.co","go.techgeek.digital",$url)));
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0],
                explode('"',$t[1][1])[0] => $t[2][1],
                $t[1][2] => $t[2][2],
                $t[1][3] => $t[2][3],
                explode('"',$t[1][4])[0] => $t[2][4],
                explode('"',$t[1][5])[0] => $t[2][5]
            ]);
            $r1 = base_short($run["links"],1,$data);
            $method = "recaptchav2";
            if($r1[$method]) {
                $t1 = $r1["token_csrf"];
                $cap = request_captcha($method,$r1[$method],$run["links"]);
                $data1 = http_build_query([
                    $t1[1][0] => $t1[2][0],
                    explode('"',$t1[1][1])[0] => $t1[2][1],
                    $t1[1][2] => $t1[2][2],
                    $t1[1][3] => $t1[2][3],
                    "g-recaptcha-response" => $cap,
                    explode('"',$t1[1][4])[0] => $t1[2][4],
                    explode('"',$t1[1][5])[0] => $t1[2][5]
                ]);
                $r2 = base_short($run["links"],"",$data1);
                if($r2["timer"] or $r2["timer"] == 0) {
                    L($coundown);
                    $t2 = $r2["token_csrf"];
                    $data2 = http_build_query([
                        $t2[1][0] => $t2[2][0],
                        explode('"',$t2[1][1])[0] => $t2[2][1],
                        $t2[1][2] => $t2[2][2],
                        explode('"',$t2[1][3])[0] => $t2[2][3],
                        explode('"',$t2[1][4])[0] => $t2[2][4]
                    ]);
                    $r3 = base_short(str_replace("jameeltips.us","jameeltips.us/blog",$run["go"][0]),1,$data2)["json"];
                    if($r3->status == "success") {
                        print h.$r3->status;
                        r();
                        return $r3->url;
                    }
                }
            }
        } elseif(preg_match("#(mitly.us|shortnow.xyz)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0],
                explode('"',$t[1][1])[0] => $t[2][1],
                $t[1][2] => $t[2][2],
                $t[1][3] => $t[2][3],
                explode('"',$t[1][4])[0] => $t[2][4],
                explode('"',$t[1][5])[0] => $t[2][5]
            ]);
            $r1 = base_short($run["links"],1,$data);
            $t1 = $r1["token_csrf"];
            $data1 = http_build_query([
                $t1[1][0] => $t1[2][0],
                explode('"',$t1[1][1])[0] => $t1[2][1],
                $t1[1][2] => $t1[2][2],
                $t1[1][3] => $t1[2][3],
                explode('"',$t1[1][4])[0] => $t1[2][4],
                explode('"',$t1[1][5])[0] => $t1[2][5]
            ]);
            $r2 = base_short($run["links"],1,$data1);
            $method = "recaptchav2";
            if($r2[$method]) {
                $t2 = $r2["token_csrf"];
                $cap = request_captcha($method,$r2[$method],$run["links"]);
                $data2 = http_build_query([
                    $t2[1][0] => $t2[2][0],
                    explode('"',$t2[1][1])[0] => $t2[2][1],
                    $t2[1][2] => $t2[2][2],
                    $t2[1][3] => $t2[2][3],
                    "g-recaptcha-response" => $cap,
                    explode('"',$t2[1][4])[0] => $t2[2][4],
                    explode('"',$t2[1][5])[0] => $t2[2][5]
                ]);
                $r3 = base_short($run["links"],"",$data2);
                if($r3["timer"] or $r3["timer"] == 0) {
                    L($coundown);
                    $t3 = $r3["token_csrf"];
                    $data3 = http_build_query([
                        $t3[1][0] => $t3[2][0],
                        explode('"',$t3[1][1])[0] => $t3[2][1],
                        $t3[1][2] => $t3[2][2],
                        explode('"',$t3[1][3])[0] => $t3[2][3],
                        explode('"',$t3[1][4])[0] => $t3[2][4]
                    ]);
                    $r4 = base_short($run["go"][0],1,$data3)["json"];
                    if($r4->status == "success") {
                        print h.$r4->status;
                        r();
                        return $r4->url;
                    }
                }
            }
        } elseif(preg_match("#(cuty.io)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build(str_replace("cuty.io","cutty.app",$url));
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0]
            ]);
            $r1 = base_short($run["links"],"",$data);
            $method = "recaptchav2";
            if($r1[$method]) {
                $t1 = $r1["token_csrf"];
                $cap = request_captcha($method,$r1[$method],$run["links"]);
                $data1 = http_build_query([
                    $t1[1][0] => $t1[2][0],
                    "g-recaptcha-response" => $cap
                ]);
                $r2 = base_short($run["links"],"",$data1);if($r2["timer"] or $r2["timer"] == 0) {L($coundown);$t2 = $r2["token_csrf"];$data2 = http_build_query([$t2[1][0] => $t2[2][0],$t2[1][1] => $t2[2][1],explode('"',$t2[1][2])[0] => rand(11111111,99999999)]);$r3 = base_short($run["go"][1],1,$data2);
                    if($r3["url"]) {
                        print h."success";
                        r();
                        return $r3["url"];
                    }
                }
            }
        } elseif(preg_match("#(web1s.co|web1s.info)#is",$host)) {
            start:
            if(file(cookie_short)) {
                unlink(cookie_short);
                sleep(2);
            }
            $res = base_short($url);
            if(!$res["url1"][0]) {
                sleep(2);
                goto start;
            }
            $n = 0;
            web1s:
            $n++;
            if($n == 4) {
                goto start;
            }
            $r1 = base_short($res["url1"][0]);
            if(!$r1["code_data_ajax"][0]) {
                goto web1s;
            }
            $n = 0;
            while(true) {
                $n++;
                if($n == 3) {
                    goto web1s;
                }
                $client_id = build()["client_id"];
                $par = parse_url($r1["url4"]);
                $data = http_build_query([
                    "screen" => "393x873",
                    "browser" => "Chrome",
                    "browserVersion" => "107.0.0.0",
                    "browserMajorVersion" => 107,
                    "mobile" => true,
                    "os" => "Android",
                    "osVersion" => 11,
                    "cookies" => true,
                    "flashVersion" => "nocheck",
                    "code" => $r1["code_data_ajax"][0],
                    "client_id" => $client_id,
                    "pathname" => $par["path"],
                    "href" => $r1["url4"],
                    "hostname" => $par["host"]
                ]);
                $step = base_short("https://web1s.com/step",1,$data)["json"];
                if($n == 1) {
                    if(!$step->step) {
                        goto start;
                    }
                }
                print p."step".$step->step."/".$step->total_steps;
                r();
                $time = base_short("https://web1s.com/countdown",1,$data)["json"];
                if(!$time->timer) {
                    continue;
                }
                L($time->timer);
                $r = base_short("https://web1s.com/continue",1,$data)["json"];
                if($step->step == $step->total_steps) {
                    if(!$r->url) {
                        continue;
                    }
                    goto web1s_f;
                } else {
                    goto web1s;
                }
            }
            web1s_f:
            while(true) {
                $method = "recaptchav2";
                $res = base_short($r->url);
                if($res[$method]) {
                    $t = $res["token_csrf"];
                    $cap = request_captcha($method,$res[$method],$r->url);
                    $data = http_build_query([
                        $t[1][0] => $t[2][0],
                        "g-recaptcha-response" => $cap
                    ]);
                    $res = base_short($r->url,1,$data);
                    $data = http_build_query([
                        $t[1][0] => $t[2][0],
                        "countdown" => 1
                    ]);
                    $res = base_short($r->url,1,$data);
                    $data = http_build_query([
                        $t[1][0] => $t[2][0]
                    ]);
                    $respon = base_short($r->url,1,$data);
                    if(!$respon["url1"][0]) {
                        continue;
                    }
                    print h."success";
                    r();
                    return $respon["url1"][0];
                }
            }
        } elseif(preg_match("#(goo.st)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0],
                explode('"',$t[1][1])[0] => $t[2][1],
                $t[1][2] => $t[2][2],
                $t[1][3] => $t[2][3],
                explode('"',$t[1][4])[0] => $t[2][4],
                explode('"',$t[1][5])[0] => $t[2][5]
            ]);
            $r1 = base_short($run["links"],"",$data);
            if($r1["timer"] or $r1["timer"] == 0) {
                L($coundown);
                $t1 = $r1["token_csrf"];
                $data1 = http_build_query([
                    $t1[1][0] => $t1[2][0],
                    explode('"',$t1[1][1])[0] => $t1[2][1],
                    $t1[1][2] => $t1[2][2],
                    explode('"',$t1[1][3])[0] => $t1[2][3],
                    explode('"',$t1[1][4])[0] => $t1[2][4]
                ]);
                $r2 = base_short($run["go"][0],1,$data1)["json"];
                if($r2->status == "success") {
                    print h.$r2->status;
                    r();
                    return $r2->url;
                }
            }
        } elseif(preg_match("#(shortsfly.me|linksfly.me)#is",$host)) {
            $run = build($url);
            $r = base_short($run["inc"],0,0,"https://shinbhu.net/");
            if($r["url"]) 
            {L($coundown);
                print h."success";
                r();
                return $r["url"];
        }
    }
}



function base_short($url,$xml=0,$data=0,$referer=0,$agent=0) {
    $r = curl($url,h_short($xml,$referer,$agent),$data,false,cookie_short);
    preg_match('#(reCAPTCHA_site_key":"|data-sitekey=")(.*?)(")#is',$r[1],$recaptchav2);
    preg_match('#(hcaptcha_checkbox_site_key":")(.*?)(")#is',$r[1],$hcaptcha);
    preg_match_all('#(submit_data" action="|<a href="|action="|href = ")(.*?)(")#is',$r[1],$url1);
    preg_match_all("#(url='|location.href ='|<a href='|var api =".n."  ')(.*?)(')#is",$r[1],$url2);
    preg_match_all("#window.open(.*?)'(.*?)'#is",$r[1],$url3);
    preg_match('#share(.*?)url=(.*?)"#is',$r[1],$url4);
    preg_match_all('#hidden" name="(.*?)" value="(.*?)"#is',$r[1],$token_csrf);
    preg_match('#(varcountdownValue=|PleaseWait|class="timer"value="|class="timer">)([0-9]{1}|[0-9]{2})(;|"|<|s)#is',str_replace([n," "],"",$r[1]),$timer);
    preg_match_all('#(dirrectSiteCode = |ai_data_id=|ai_ajax_url=)"(.*?)(")#is',$r[1],$code_data_ajax);
    return [
        "res" => $r[1],
        "hcaptcha" => $hcaptcha[2],
        "recaptchav2" => $recaptchav2[2],
        "token_csrf" => $token_csrf,
        "timer" => $timer[2],
        "json" => json_decode($r[1]),
        "url" => $r[0][1]["redirect_url"],
        "url1" => $url1[2],
        "url2" => $url2[2],
        "url3" => $url3[2],
        "url4" => $url4[2],
        "code_data_ajax" => $code_data_ajax[2]
    ];
}

function build($url=0) {
    $r = parse_url($url);
    $az = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return [
        "client_id" => substr(str_shuffle($az),0,8)."-".substr(str_shuffle($az),0,4)."-".substr(str_shuffle($az),0,4)."-".substr(str_shuffle($az),0,4)."-".substr(str_shuffle($az),0,16),
        "decode" => base64_decode(explode("=",$url)[2]),
        "links" => "https://".$r["host"].$r["path"],
        "inc" => "https://".$r["host"]."/flyinc.".$r["path"],
        "go" => [
            "https://".$r["host"]."/links/go",
            "https://".$r["host"]."/go".$r["path"],
            "https://".$r["host"]."/".explode("/",$r["path"])[1]."/links/go",
            "https://go/".$r["host"].$r["path"]
        ]
    ];
}

function h_short($xml=0,$referer=0,$agent=0) {
    if($xml) {
        $headers[] = 'Accept: */*';
    } else {
        $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v = b3;q=0.9';
    }
    if($xml) {
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
    }
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    if($agent) {
    $agent =' (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm|YandexAccessibilityBot/3.0; +http://yandex.com/bots|Googlebot/2.1; +http://www.google.com/bot.html)';
    }
    if (strtoupper(substr(PHP_OS,0,3)) == 'WIN') {
        $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z Safari/537.36';
    } else {
        $user_agent = 'Mozilla/5.0 (Linux; Android 11; M2012K11AG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z Mobile Safari/537.36';
    }
    $headers[] = 'User-agent: '.$user_agent.$agent;
    if($xml) {
        $headers[] = 'X-Requested-With: XMLHttpRequest';
    }
    if($referer) {
        $headers[] = 'referer: '.$referer;
    }
    return $headers;
}

function azcaptcha($method,$sitekey,$pageurl) {
    refresh: 
    print p;
    $name_api = "apikey_azcaptcha";
    $apikey = save($name_api);
    $recaptchav2 = http_build_query([
        "key" => $apikey,
        "method" => "userrecaptcha",
        "googlekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $hcaptcha = http_build_query([
        "key" => $apikey,
        "method" => "hcaptcha",
        "sitekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $type=[
        "hcaptcha" => $hcaptcha,
        "recaptchav2" => $recaptchav2
    ];
    $ua=[
        "host: azcaptcha.com",
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s=0;
    while(true) {
        $s++;
        $r=curl("https://azcaptcha.com/in.php?".$type[$method],$ua)[1];
        if($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif($r == "ERROR_WRONG_USER_KEY") {
            if($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id=explode('|',$r)[1];
        if(!$id) {sleep(15);continue;
        }
        sleep(5);
        while(true) {
            $r1=curl("https://azcaptcha.com/res.php?".http_build_query([
                "key" => $apikey,
                "action" => "get",
                "id" => $id
            ]),$ua)[1];
            if($r1 == "ERROR_CAPTCHA_UNSOLVABLE") {
                print str_replace("_"," ",$r1);
                sleep(5);
                r();
                goto refresh;
            } elseif($r1 == "ERROR_INVALID_SITEKEY") {
                str_replace("_"," ",$r1);
                r();
                goto refresh;
            } elseif($r1 == "CAPCHA_NOT_READY") {
                r();print str_replace("_"," ",$r1);
                sleep(5);
                r();
                continue;
            }
            r();
            return explode('|', $r1)[1];
        }
    }
}

function captchaai($method,$sitekey,$pageurl) {
    refresh: 
    print p;
    $name_api = "apikey_captchaai";
    $apikey = save($name_api);
    $recaptchav2 = http_build_query([
        "key" => $apikey,
        "method" => "userrecaptcha",
        "googlekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $hcaptcha = http_build_query([
        "key" => $apikey,
        "method" => "hcaptcha",
        "sitekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $type=[
        "hcaptcha" => $hcaptcha,
        "recaptchav2" => $recaptchav2
    ];
    $ua=[
        "host: ocr.captchaai.com",
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s=0;
    while(true) {
        $s++;
        $r=curl("http://ocr.captchaai.com/in.php?".$type[$method],$ua)[1];
        if($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif($r == "ERROR_WRONG_USER_KEY") {
            if($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id=explode('|',$r)[1];
        if(!$id) {
            sleep(15);
            continue;
        }
        sleep(5);
        while(true) {
            $r1=curl("https://ocr.captchaai.com/res.php?".http_build_query([
                "key" => $apikey,
                "action" => "get",
                "id" => $id
            ]),$ua)[1];
            if($r1 == "ERROR_CAPTCHA_UNSOLVABLE") {
                print str_replace("_"," ",$r1);
                sleep(5);
                r();
                goto refresh;
            } elseif($r1 == "ERROR_INVALID_SITEKEY") {
                str_replace("_"," ",$r1);
                r();
                goto refresh;
            } elseif($r1 == "CAPCHA_NOT_READY") {
                r();
                print str_replace("_"," ",$r1);
                sleep(5);
                r();
                continue;
            }
            r();
            return explode('|', $r1)[1];
        }
    }
}

function anycaptcha($method,$sitekey,$pageurl) {
    refresh:
    $name_api = "apikey_anycaptcha";
    $apikey = save($name_api);
    $h=[
        "Host: api.anycaptcha.com",
        "Content-Type: application/json"
    ];
    $data=json_encode([
        "clientKey" => $apikey
    ]);
    $r=json_decode(curl("https://api.anycaptcha.com/getBalance",$h,$data)[1],1);
    if($r["balance"] <= 0) {
        unlink($name_api);
        goto refresh;
    }
    $recaptchav2=json_encode([
        "clientKey" => $apikey,
        "task" => [
            "type" => "RecaptchaV2TaskProxyless",
            "websiteURL" => $pageurl,
            "websiteKey" => $sitekey,
            "isInvisible" => false
            ]
        ]);
    $hcaptcha=json_encode([
        "clientKey" => $apikey,
        "task" => [
        "type" => "HCaptchaTaskProxyless",
        "websiteURL" => $pageurl,
        "websiteKey" => $sitekey
            ]
        ]);
            $type=[
                "hcaptcha" => $hcaptcha,
                "recaptchav2" => $recaptchav2
            ];
            $Create=json_decode(curl('https://api.anycaptcha.com/createTask',$h,$type[$method])[1]);
            if($Create->errorId>0) {
                exit(m.$Create->errorCode.n);
    } else {
        while(true) {
            $base=json_encode([
                "clientKey" => $apikey,
                "taskId" => $Create->taskId
            ]);
            $Result=json_decode(curl('https://api.anycaptcha.com/getTaskResult',$h,$base)[1]);
            if($Result->status == 'processing') {
                print p.$Result->status;
                sleep(5);
                r();
                continue;
            }
            r();
            return $Result->solution->gRecaptchaResponse;
        }
    }
}







