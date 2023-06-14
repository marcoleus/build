//die(bypass_shortlinks("https://link4.pw/OXQ8"));

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
    global $off_shortlinks;
    $exp = 0;
    if(file(cookie_short)) {
        unlink(cookie_short);
        sleep(1);
    }
    for($i=0;$i<500;$i++) {
        for($s=0;$s<100;$s++) {
            $open = multiexplode(["_","{","[","(","-desktop","-easy","-mid","-hard"],str_replace(" ","",strtolower($r["name"][$s])))[0];
                if(strtolower(config()[$i]) == $open) {
                    for($k=0;$k<50;$k++){
                        if(strtolower($off_shortlinks["all_brand"][$k]) == $open or strtolower($off_shortlinks[parse_url(host)["host"]][$k]) == $open or explode("/",trim(explode("<",$r["left"][$s])[0]))[0] == 0 or explode("/",trim(explode("<",$r["left"][$s])[0]))[0][0] == "-") {
                            goto up;
                        }
                    }
                    if(preg_replace("/[^0-9]/","",$r["visit"][$s])) {
                        if(mode == "af") {
                            $r1 = base_run(host.$r["visit"][$s],http_build_query([$r["token"][1][$s] => $r["token"][2][$s]]));
                        } elseif(mode == "icon") {
                            $cap = icon_bits();
                            $data2 = http_build_query([
                                "a" => "getShortlink",
                                "data" => preg_replace("/[^0-9]/","",$r["visit"][$s]),
                                "token" => $r["token"],
                                "captcha-idhf" => 0,
                                "captcha-hf" => $cap
                            ]);
                            $res = base_run(host."system/ajax.php",$data2)["json"];
                            if($res->shortlink) {
                                $r1["url"] = $res->shortlink;
                                goto run;
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
                        } elseif(mode == "sl_jepangwah") {
                            $r1 = base_run(host."litecoin/".$r["visit"][$s]);
                        } elseif(mode == "path") {
                            $r1 = base_run(host.$r["visit"][$s]);
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
                        if($exp == 2) {
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
        if(preg_match("#(link.shrinkme.link|blog.shrinkme.link|pingit.im|link4.pw|vnshortener.com|insfly.pw|url.cashurl.in|link.freeltc.top|short.freeltc.top|ez4short.com|droplink.co|zuba.link|nx.chainfo.xyz|go.bitcosite.com|flyzu.icu|go.flyzu.icu|linkjust.com|owllink.net|birdurls.com|go.birdurls.com|go.owllink.net|adbull.me|link1s.net|link1s.com|ex-foary.com|shortzu.icu|clickzu.icu|ser2.crazyblog.in|ser3.crazyblog.in|link.adshorti.xyz|go.softindex.website|cbshort.com|link.shorti.io|sclick.crazyblog.in|adrev.link|go.cuturl.in|linkfly.me|alwrificlick.site|go.alwrificlick.site|url.mozlink.net|go.megafly.in|go.megaurl.in|link.usalink.io)#is",$host)) {
            fix_1:
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
                $referer = "https://yoshare.net/";
            } elseif(preg_match("#(ez4short.com)#is",$host)) {
                $referer = "https://techmody.io/";
            } elseif(preg_match("#(insfly.pw)#is",$host)) {
                $referer = "https://enit.in/";
            } elseif(preg_match("#(vnshortener.com)#is",$host)) {
                $referer = "https://nishankhatri.com.np/";
            } elseif(preg_match("#(pingit.im)#is",$host)) {
                $referer = "https://noweconomy.live/";
            } else {
                $referer = 0;
            }
            if(preg_match("#(birdurls.com|owllink.net|go.birdurls.com|go.owllink.net)#is",$host)) {
                $cloud = 1;
            } else {
                $cloud = 0;
            }
            $url = str_replace("link.shrinkme.link","blog.shrinkme.link",str_replace("pingit.im","pngit.live",str_replace("link4.pw","g.linkvor.pw",str_replace("url.cashurl.in","go.cashurl.in",str_replace("link.freeltc.top","short.freeltc.top",str_replace("nx.chainfo.xyz","go.bitcosite.com",str_replace("flyzu.icu","go.flyzu.icu",str_replace("go.birdurls.com","birdurls.com",str_replace("go.owllink.net","owllink.net",str_replace("link.usalink.io","go.theconomy.me",str_replace("go.megaurl.in","get.megaurl.in",str_replace("go.megafly.in","get.megafly.in",str_replace("go.alwrificlick.site","alwrificlick.site",str_replace("link.shorti.io","shorti.io",str_replace("link.adshorti.xyz","adshorti.xyz",str_replace("url.mozlink.net","go.mozlink.net",str_replace("go.cuturl.in","go.mozlink.net",str_replace("go.softindex.website","softindex.website",str_replace("link.shorti.io","blog.financeandinsurance.xyz",str_replace("ser2","ser3",$url))))))))))))))))))));
            $run = build($url);
            $r = base_short($run["links"],0,0,$referer,$cloud);
            $t = $r["token_csrf"];
            if(explode('"',$t[1][2])[0] == "ad_form_data") {
                $request_captcha = false;
            } else {
                $request_captcha = true;
            }
            if($request_captcha == true) {
                if(!$t[1][2]) {
                     goto fix_1;
                }
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
        } elseif(preg_match("#(coinpayz.link|linksly.co|go.linksly.co|illink.net|go.illink.net|shrinke.me|go1.urlcash.click|urlcashh.click|ser7.crazyblog.in|short.pe|shurt.pw|urlcashh.quest|softindex.site|go.urlcash.site|goes1.softindex.website)#is",$host)) {
            fix_2:
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
                if(!$t[1][2]) {
                     goto fix_2;
                }
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
        } elseif(preg_match("#(clik.pw_off)#is",$host)) {
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
        } elseif(preg_match("#(terafly.me|petafly.me|nonofly.me)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            pet:
            $r = base_short($run["links"]);
            if(!$r["url"]) {
                goto pet;
            }
            if(explode("?",$r["url"])[1]) {
            $r2["url2"][0] = explode("?",$r["url"])[1];
            goto next_st;
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
            next_st:
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
                $r2 = base_short($run["links"],"",$data1);
                if($r2["timer"] or $r2["timer"] == 0) {
                    L($coundown);$t2 = $r2["token_csrf"];
                    $data2 = http_build_query([
                        $t2[1][0] => $t2[2][0],
                        $t2[1][1] => $t2[2][1],
                        explode('"',$t2[1][2])[0] => rand(11111111,99999999)
                    ]);
                    $r3 = base_short($run["go"][1],1,$data2);
                    if($r3["url"]) {
                        print h."success";
                        r();
                        return $r3["url"];
                    }
                }
            }
        } elseif(preg_match("#(goo.st)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($run["links"],0,0,$run["links"]);
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
                $r2 = base_short($run["go"][0],1,$data1,$run["links"])["json"];
                if($r2->status == "success") {
                    print h.$r2->status;
                    r();
                    return $r2->url;
                }
            }
        } elseif(preg_match("#(shortsfly.me|linksfly.me)#is",$host)) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            if(preg_match("#(feyorra.top|claimtrx.com|liteearn.com|cryptosfaucet.top|paidtomoney.com)#is",parse_url(host)["host"])) {
                $coundown = 100;
            }
            $run = build($url);
            $r = base_short($run["inc"],0,0,"https://shinbhu.net/");
            if($r["url"]) {
                L($coundown);
                print h."success";
                r();
                return $r["url"];
        }
    } elseif(preg_match("#(clks.pro)#is",$host)) {
        if(file(cookie_short)) {
            unlink(cookie_short);
        }
        while(true) {
            $run = build($url);
            $r = base_short($run["links"]);
            $t = $r["token_csrf"];
            $data = http_build_query([
                $t[1][0] => $t[2][0],
                $t[1][1] => $t[2][1]
            ]);
            $r1 = base_short($r["url1"][0],1,$data,$run["links"]);
            $r2 = base_short($r1["url"]);
            if(!$r2["url2"][0]) {
                continue;
            }
            $r3 = base_short($r2["url2"][0]);
            $method = "recaptchav2";
            $t1 = $r3["token_csrf"];
            if(!$t1[1][0]) {
                continue;
            }
            $cap = request_captcha($method,$r3[$method],$r2["url2"][0]);
            $data1 = http_build_query([
                "g-recaptcha-response" => $cap,
                $t1[1][0] => $t1[2][0],
                $t1[1][1] => $t1[2][1]
            ]);
            $r4 = base_short($r2["url2"][0],1,$data1,$r2["url2"][0]);
            for ($i = 1;$i<6;$i++) {L(15);
                $data = http_build_query([
                    $t1[1][0] => $i,
                    $t1[1][1] => $t1[2][1]
                ]);
                $r5 = base_short($r2["url2"][0],1,$data,$r2["url2"][0]);
                if($i == 5){print h."success";
                    r();
                    if(explode("url=",$r5["url"])[2]) {
                        return explode("url=",$r5["url"])[2];
                    } else {
                        return $r5["url"];
                    }
                }
            }
        }
    } elseif(preg_match("#(destyy.com)#is",$host)) {
        while(true) {
            if(file(cookie_short)) {
                unlink(cookie_short);
            }
            $run = build($url);
            $r = base_short($run["links"]);
            if(!$r["url"]) {
                continue;
            }
            $r1 = base_short($r["url"]);
            if(!$r1["sessionId"]) {
                continue;
            }
            L($coundown);
            $r2 = base_short("https://clkmein.com/shortest-url/end-adsession?adSessionId=".$r1["sessionId"]."&adbd=0&callback=reqwest_".time(),0,0,$r["url"])["res"];
            if(ex('":"','"',2,$r2) == "ok") {
                print h."succses";
                r();
                return str_replace("\/","/",ex('":"','"',1,$r2));
            }
        }
    } elseif(preg_match("#(web1s.co|web1s.info)#is",$host)) {
        start:
        if(file(cookie_short)) {
            unlink(cookie_short);
        }
        $method = "recaptchav2";
        $r = base_short($url);
        $res = base_short($r["url"]);
        $host = parse_url($res["url"])["host"];
        if(preg_match("#(app.covemarkets.com)#is",$host)) {
            $r = base_short($res["url"]);
            if($r["timer"]) {
                L($r["timer"]);
                $t = $r["token_csrf"];
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    $t[1][1] => $t[2][1]
                ]);
                $r1 = base_short($res["url"],1,$data);
                $r2 = base_short($res["url"]);
                if($r2["timer"]) {
                    L($r2["timer"]);
                    $t2 = $r2["token_csrf"];
                    $data = http_build_query([
                        $t2[1][0] => $t2[2][0],
                        $t2[1][1] => $t2[2][1]
                    ]);
                    $r3 = base_short($res["url"],1,$data);
                    $res1 = base_short($res["url"]);
                    if($res1[$method]) {
                        goto web1s_f;
                    }
                }
            }
        }
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
            $par = parse_url(urldecode($r1["url4"]));
            if(strtoupper(substr(PHP_OS,0,3)) == 'WIN') {
                $screen = "943x623";
                $browserVersion = "113.0.0.0";
                $os= " Windows";
                $osVersion = 10;
                $mobile = false;
            } else {
                $screen = "393x873";
                $browserVersion = "107.0.0.0";
                $os = "Android";
                $osVersion = 11;
                $mobile = true;
            }
            $data = http_build_query([
                "screen" => $screen,
                "browser" => "Chrome",
                "browserVersion" => $browserVersion,
                "browserMajorVersion" => explode(".",$browserVersion)[0],
                "mobile" => $mobile,
                "os" => $os,
                "osVersion" => $osVersion,
                "cookies" => true,
                "flashVersion" => "no check",
                "code" => $r1["code_data_ajax"][0],
                "client_id" => $client_id,
                "pathname" => $par["path"],
                "href" => urldecode($r1["url4"]),
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
                $res["url"] = $r->url;
                $res1 = base_short($res["url"]);
                goto web1s_f;
            } else {
                goto web1s;
            }
        }
        web1s_f:
        while(true) {
            if($res1[$method]) {
                $t = $res1["token_csrf"];
                $cap = request_captcha($method,$res1[$method],$res["url"]);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    "g-recaptcha-response" => $cap
                ]);
                base_short($res["url"],1,$data);
                $data = http_build_query([
                    $t[1][0] => $t[2][0],
                    "countdown" => 1
                ]);
                base_short($res["url"],1,$data);
                $data = http_build_query([
                    $t[1][0] => $t[2][0]
                ]);
                $respon = base_short($res["url"],1,$data);
                if(!$respon["url1"][0]) {
                    continue;
                }
                print h."success";
                r();
                return $respon["url1"][0];
            }
        }
    } elseif(preg_match("#(fc-lc.com)#is",$host)) {
        if(file(cookie_short)) {
            unlink(cookie_short);
        }$run = build($url);
        $r = base_short($run["links"]);
        $t = $r["token_csrf"];
        $data = http_build_query([
            $t[1][0] => $t[2][0],
            $t[1][1] => $t[2][1],
            $t[1][2] => $t[2][2],
        ]);
        $r1 = base_short("https://webhostingpost.com/whmcs-alternate-options-prime-10-reviewed-in-2020/",1,$data);
        $t = $r1["token_csrf"];
        $data = http_build_query([
            $t[1][0] => $t[2][0],
            $t[1][1] => $t[2][1],
            $t[1][2] => $t[2][2],
            $t[1][3] => $t[2][3],
            "ab" => 2,
            explode('"',$t[1][4])[0] => $t[2][4],
            explode('"',$t[1][5])[0] => $t[2][5]
        ]);
        $r2 = base_short($run["go"][0],1,$data)["json"];
        if($r2->url) {
            L($coundown);
            print h."success";
            r();
            return $r2->url;
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
    preg_match('#(id="second">|varcountdownValue=|PleaseWait|class="timer"value="|class="timer">)([0-9]{1}|[0-9]{2})(;|"|<|s)#is',str_replace([n," "],"",$r[1]),$timer);
    preg_match_all('#(dirrectSiteCode = |ai_data_id=|ai_ajax_url=)"(.*?)(")#is',$r[1],$code_data_ajax);
    preg_match('#(sessionId: ")(.*?)(")#is',$r[1],$sessionId);
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
        "code_data_ajax" => $code_data_ajax[2],
        "sessionId" => $sessionId[2]
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

function azcaptcha($method,$sitekey,$pageurl,$rr = 0) {
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
    $type = [
        "hcaptcha" => $hcaptcha,
        "recaptchav2" => $recaptchav2
    ];
    $ua = [
        "host: azcaptcha.com",
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s = 0;
    while(true) {
        $s++;
        $r = curl("https://azcaptcha.com/in.php?".$type[$method],$ua)[1];
        if($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif($r == "ERROR_WRONG_USER_KEY") {
            if($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id = explode('|',$r)[1];
        if(!$id) {
        print "Get ID Captcha";
        r();
        continue;
        }
        sleep(5);
        while(true) {
            $r1 = curl("https://azcaptcha.com/res.php?".http_build_query([
                "key" => $apikey,
                "action" => "get",
                "id" => $id
            ]),$ua)[1];
            if($r1 == "CAPCHA_NOT_READY") {
                print str_replace("_"," ",$r1);
                sleep(5);
                r();
                continue;
            } elseif(explode('|', $r1)[1]) {
                return explode('|', $r1)[1];
            } else {
                print str_replace("_"," ",$r1);
                r();
                goto refresh;
            }
        }
    }
}

function captchaai($method,$sitekey,$pageurl,$rr = 0) {
    if($method == 'hcaptcha' or $method == 'recaptchav3') {
        die(m.'sorry anti byppass '.$method.n);
    }
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
    $recaptchav3 = http_build_query([
        "key" => $apikey,
        "method" => "userrecaptcha",
        "version" => "v3",
        "action" => "verify",
        "min_score" => "0.3",
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
        "recaptchav2" => $recaptchav2,
        "recaptchav3" => $recaptchav3,
        "hcaptcha" => $hcaptcha
    ];
    $ua = [
        "host: ocr.captchaai.com",
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s = 0;
    while(true) {
        $s++;
        $r = curl("http://ocr.captchaai.com/in.php?".$type[$method],$ua)[1];
        if($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif($r == "ERROR_WRONG_USER_KEY") {
            if($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id = explode('|',$r)[1];
        if(!$id) {
            print "Get ID Captcha";
            r();
            continue;
        }
        sleep(5);
        while(true) {
            $r1 = curl("https://ocr.captchaai.com/res.php?".http_build_query([
                "key" => $apikey,
                "action" => "get",
                "id" => $id
            ]),$ua)[1];
            if($r1 == "CAPCHA_NOT_READY") {
                print str_replace("_"," ",$r1);
                sleep(5);
                r();
                continue;
            } elseif(explode('|', $r1)[1]) {
                return explode('|', $r1)[1];
            } else {
                print str_replace("_"," ",$r1);
                r();
                goto refresh;
            }
        }
    }
}




function anycaptcha($method,$sitekey,$pageurl,$rr=0) {
    refresh:
    $name_api = "apikey_anycaptcha";
    $apikey = save($name_api);
    $h = [
        "Host: api.anycaptcha.com",
        "Content-Type: application/json"
    ];
    $data = json_encode([
        "clientKey" => $apikey
    ]);
    $r = json_decode(curl("https://api.anycaptcha.com/getBalance",$h,$data)[1],1);
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
    $hcaptcha = json_encode([
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
            $Create = json_decode(curl('https://api.anycaptcha.com/createTask',$h,$type[$method])[1]);
            if($Create->errorId>0) {
                exit(m.$Create->errorCode.n);
    } else {
        while(true) {
            $base = json_encode([
                "clientKey" => $apikey,
                "taskId" => $Create->taskId
            ]);
            $Result = json_decode(curl('https://api.anycaptcha.com/getTaskResult',$h,$base)[1]);
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

function icon_bits() {
    $data = http_build_query([
        "cID" => 0,
        "rT" => 1,
        "tM" => "light"
    ]);
    $hash = base_run(host."system/libs/captcha/request.php",$data)["json"];
    for ($x = 0; $x < 5; $x++) {
        $image = curl(host."system/libs/captcha/request.php?cid=0&hash=".$hash[$x],hmc(),0,true)[1];
        $file_sizes[] = strlen($image);
    }
    for ($z = 0;$z<5;$z++) {
        if($file_sizes[$z] !== $file_sizes[0]) {
            if($z == 1) {
                if($file_sizes[1] == $file_sizes[2]) {
                    $ind = 0;
                    goto fix;
                }
            }
            $ind = $z;
        }
    }
    fix:
    $answer = $hash[$ind];
    $data1 = http_build_query([
        "cID" => 0,
        "pC" => $answer,
        "rT" => 2
    ]);
    base_run(host."system/libs/captcha/request.php",$data1);
    return $answer;
}




function icon($method,$sitekey,$pageurl,$rr){
$a = [ 
    "622a6ffcaeeacb79bc56443917af9caa",
    "5e32f1a4613053667a3227f2508807d7",
    "d9f89b6a52bbba354b173df8621ac6cd",
    "ba7161f4628fcab9e7417b989dc7779c",
    "d67322b3de1b3ed804933c173e5eb7e4",
    "95038481908ea9bda3504470f03d28b8",
    "e035d3e0ff51e7f3dd8f105cf35b50f0",
    "725057ccbb051378d4d0d683d08f4cdb",
    "c1512a7116ec7a35056cae89f773e339",
    "2e9b312f3bba89adf0f1156567b896ac",
    "0604566890fe2a6eb7bef2bb18347b55",
    "e987905dc94ca0e566f26102c71b0b36",
    "39660e8ce374b155d61052152ec97037",
    "8aa8909044c1a6d2a0e2f11436020833",
    "a612410bdf846901f751b224551ae384",
    "e0493af430a9d1dec913e2f921dd4e4e",
    "1f361f4e51279b0e2fa40d66651ef7dc",
    "81f720b4af6d8308a17544a068ce3680",
    "e28dadc4f30e38e5b78b041027ef5df9",
    "8f4f7fc6e2d993af2a89b85f32022a90",
    "05dc184a81ab12be43dece0b47938501",
    "cd0a210489200cb9024177ff6bca42e0",
    "5f9ad682f98ad933f1c24839c8eb5a09",
    "a9d688d3a320926c1b181b4fd25f892a",
    "3e67c5cbc07f2d554d41f33949c05151",
    "94eba227efb0cc9804998fd57454ceaf",
    "8b21839d7e9b0338681a601cc8ad4979",
    "1c146ca637af84fac3020b4ed9018b41",
    "82cb8d270e954d518e9504741ba3028d",
    "b9751aedc9a6994908c9cf5bd859a77f",
    "25764185e8ee536ac417719bb6b2806b",
    "e5bd0f213163919b1b8ebf2949b77053",
    "1854831c88a0d886429d2f53a94e56cd",
    "e1d73340439b36fa1424a1a4f800c8b6",
    "b0be1d9962309d629314e5e100b10e3c",
    "cf5bb328fe5e2068cd6d5103d066e701",
    "10d4bbc30d936b446b5a328989af50cb",
    "01cceaf6efaf0b57f7c92574006107cd",
    "19f7e075103a00a80e44cd2c67ac5959",
    "6a224fc7bd454f0f5d0a1ecc2b09626e",
    "e69a18ad19a81fdcd44795751303aa2d",
    "a582c5aa4311986cf6afe1e6dc4a9de4",
    "2b9327bf2e8d3fa531b639943e063adc",
    "64962b266e4f6a93988e709dc28e5259",
    "7f2b97ac7bba3debc7183412c9cf50c7",
    "e8680cf6b8a33f2ba0174a9101fea26c",
    "40e6c896e2374b2f6639bb4300fb6d78",
    "87cf7190c2c99baadb4b1bca329583dd",
    "48b6b6516bb66d2cb3fd3f1cbff9c755",
    "92bf126e2d1f2d400acc5b06cabe7946",
    "5e78748c47c4c0902777d72b7abbd6e3",
    "630c1e42e115e208a574dadb681f054f",
    "0e6837e093b981881e9b637bd56ef211",
    "adba08a7b5176202d4b246e1877e8922",
    "d79468b2d6bd2cba72ac29bb839f08f6",
    "8afdbf34bd1459e97288ccb196e4805f",
    "b66be23ed22f5b410327704a3bce6fea",
    "b7f3d177a4178c4964a03715dcf41aef",
    "904f52621849ec2bbafb5f6e1ed1906d",
    "048f62365211dd9be3ab9f3e58bcd6ae",
    "25ad74bc4fcbf9e826e89bf1f3839ca5",
    "89d24982402ad6bec5e712d5c1ce1c38",
    "bb5693d2dced651638fd2f84a3887d47",
    "dfca78d834c950592d59bb8adc9281e8",
    "f43d64180dc7c7533ea731eeb0b6f3f1",
    "6df2e3d1efcf981b1a09bf3ec5fba234",
    "e748c3ee158c953b2b98bcf3746568b6",
    "bf150291d7c5204fa2d87e4afd6577ee",
    "26370f7790ec5e964e1d2e171d04ecad",
    "c9c22757126884deae95d0cc66ede8ac",
    "c5eb45c2638560df17506530bcd99c65",
    "6c799b4bd0fcc07a577a0e5c1fde1062",
    "426bb68a133bd7edf9a6ccc8a3f7e535",
    "134f59f2951fba5d8a99508b6242cb25",
    "3dde9bc8f564f08cb72611c98e9d8ceb",
    "758021ded1af737e167d60afedf32a93",
    "b5e149d7b5024cc56e150212f45136b8",
    "fa03bf8e3eb8bf4d1f986bac8d58fc2e",
    "9f6823dae3d8a1108c855c1c681b20a1",
    "31ec8e3e209567f4d5fac49c03c7fdc4",
    "7e235151ae9c56a6f7bd37978e89bfd1",
    "74283144ff69795ce61a690fab102811",
    "0b4d9a3b6edddda03c8068eed3f5b18d",
    "ec4eb6068abc34ed2f78d645d0640a6b",
    "dbc0c8017c1fc057fadccab2482cc912",
    "67aa29bff108e19690cff8202b3a7b58",
    "bda34197f517974d452750fe911af5fa",
    "991bba1e5908a053e963a9710e69ad3f",
    "91b15509d2de8e93730557e1971d8888",
    "e4bb54f8bb840e9ccb6e26f88989ffc9",
    "29b18d8e47d0267423345c947aa48180",
    "4204082566766a279bc2f3152071454b",
    "8793f7d7cc7a548bd36d789838e11643",
    "c5db28ec22ed9b715176504975690ef6",
    "0444b2c617da4717dad0a82cc89e966c",
    "cc57d4f905ac9cd3777647fb0c9c69f3",
    "b8e82e0f0de4381cf29c86fb8794cbec",
    "3fbb62835eef93de682d20585f2b8b76",
    "d3fb247637c4da13847247c8cbb7f066",
    "aa836f7f7bfcc29b193623dfb0c1f151"
];
preg_match('#unescape(.*?)"(.*?)"#is',$rr,$dec);
$r = urldecode($dec[2]);
    for($i = 0;$i<=4;$i++) {
        preg_match_all("#data-value='(.*?)' src='data:image/png;base64,(.*?)'#is",$r,$b);
        for($n = 0;$n<500;$n++) {
            if($a[$n]==md5($b[2][$i])) {
                return $b[1][$i];
            }
        }
    }
}
   
function config() {
    //--------------------------------------------------------//
    //https://linksfly.me/CBa0ydu31nb
    //http://shortsfly.me/roakE1pV
    $config[] ="linksfly";
    $config[] ="shortfly";
    $config[] ="shortsfly";
    $config[] ="linksfly.me";
    $config[] ="shortsfly.me";
    //--------------------------------------------------------//
    //https://link4.pw/vA1KDGg
    $config[] ="linkvor.pw";
    //--------------------------------------------------------//
    //http://destyy.com/egUHMo
    $config[] ="destyy.com";
    $config[] ="destyy";
    $config[] ="shortest";
    //--------------------------------------------------------//
    //https://ez4short.com/xFTG
    $config[] ="ez4short";
    $config[] ="ez4short.com";
    $config[] ="insfly";
    $config[] ="insfly.pw";
    //--------------------------------------------------------//
    //https://fc-lc.com/urdbrOD
    $config[] ="fc";
    $config[] ="fclc";
    $config[] ="fc-lc";
    $config[] ="fc-lc.com";
    //--------------------------------------------------------//
    //https://adrev.link/LR5R
    $config[] ="adrevlinks";
    //--------------------------------------------------------//
    //https://cbshort.com/st?api =406af259d31c828d9eb96f3c1623e6f247477d2e&amp;url =sclick.crazyblog.in/CBt6m0km8yr
    $config[] ="shrinkclick";
    $config[] ="hrshort";
    //--------------------------------------------------------//
    //https://ex-foary.com/CBgjr6qiyru
    $config[] ="exfoary";
    $config[] ="ex-foary";
    $config[] ="ex-foary.com";
    //--------------------------------------------------------//
    //http://link.adshorti.xyz/CBah1e6pyg5
    $config[] ="adshorti2";
    $config[] ="adshorti.xyz";
    //--------------------------------------------------------//
    //https://shortzu.icu/CBikellupjp
    //https://clickzu.icu/CBxwz99ht0y
    $config[] ="shortzu";
    $config[] ="shortzu.icu";
    $config[] ="clickzu";
    $config[] ="clickzu.icu";
    //--------------------------------------------------------//
    //https://droplink.co/NQWbVQ9C
    $config[] ="droplink";
    $config[] ="droplink.co";
    //--------------------------------------------------------//
    $config[] ="cbshort";
    //--------------------------------------------------------//
    //https://try2link.com/xenvu
    $config[] ="try2link";
    $config[] ="try2";
    $config[] ="try2link.com";
    //--------------------------------------------------------//
    //https://goo.st/xZ6PH
    $config[] ="goo";
    $config[] ="goo.st";
    //--------------------------------------------------------//
    //https://birdurls.com/CBd2opxqf21
    //https://owllink.net/ckjv
    $config[] ="birdurl";
    $config[] ="birdurls";
    $config[] ="birdsurl";
    $config[] ="birdurls.com";
    $config[] ="owl";
    $config[] ="owlink";
    $config[] ="owllink";
    $config[] ="owllink.net";
    //--------------------------------------------------------//
    //https://zuba.link/CBv74a1l73i
    $config[] ="zuba";
    $config[] ="zuba.link";
    //--------------------------------------------------------//
    //https://adbull.me/CB8qnrlamx2
    $config[] ="adbull";
    $config[] ="adbull.me";
    //--------------------------------------------------------//
    //https://pingit.im/DGEg42E2
    $config[] ="pingit";
    $config[] ="pingit.im";
    $config[] ="pngit";
    $config[] ="pngit.live";
    //--------------------------------------------------------//
    //https://linkjust.com/CBbw64o0o5m
    $config[] ="linkjust";
    $config[] ="linkjust.com";
    //--------------------------------------------------------//
    //http://nx.chainfo.xyz/CBvdzwhx79a
    $config[] ="chainfo";
    $config[] ="chaininfo";
    $config[] ="chainfo.xyz";
    //--------------------------------------------------------//
    //https://linksly.co/CBmqwaf22mp
    $config[] ="linksly";
    $config[] ="linksly.co";
    //--------------------------------------------------------//
    //https://link1s.com/FbFM
    //http://link1s.net/roakE1pV
    $config[] ="link1s";
    $config[] ="link1scom";
    $config[] ="link1s.com";
    $config[] ="link1snet";
    $config[] ="link1s.net";
    //--------------------------------------------------------//
    //https://vnshortener.com/XRf8
    $config[] ="vns";
    //--------------------------------------------------------//
    //https://flyzu.icu/CBbf0nm40mw
    $config[] ="flzu";
    $config[] ="flyzu";
    $config[] ="flyzu.icu";
    //--------------------------------------------------------//
    //https://link.shorti.io/CBemtfk2g7f
    $config[] ="shorti.io";
    $config[] ="shorti";
    //--------------------------------------------------------//
    //https://link.freeltc.top/jmQRa3F
    $config[] ="freeltc";
    $config[] ="freeltc.top";
    //https://terafly.me/oyoo/osZAP
    $config[] ="ozoo";
    $config[] ="opoo";
    $config[] ="okoo";
    $config[] ="oroo";
    $config[] ="otoo";
    $config[] ="oyoo";
    $config[] ="owoo";
    $config[] ="omoo";
    $config[] ="ogoo";
    //--------------------------------------------------------//
    //http://petafly.me/Pofn
    $config[] ="petafly";
    $config[] ="petafly.me";
    //--------------------------------------------------------//
    //http://nonofly.me/lGxARjil
    $config[] ="nonofly";
    $config[] ="nonofly.me";
    //--------------------------------------------------------//
    //https://tii.la/j9G65aIe9l
    $config[] ="shrinkearn";
    $config[] ="shrinkearn.com";
    $config[] ="tii.la";
    $config[] ="shrinlearn";
    //--------------------------------------------------------//
    //https://shrinke.me/9SJRbamZ
    $config[] ="shrinkme";
    $config[] ="shrink.me";
    //--------------------------------------------------------//
    //https://shurt.pw/CB30zdl9eve
    $config[] ="peshort";
    //--------------------------------------------------------//
    //https://linkfly.me/CBeqipa3vzk
    $config[] ="linkfly2";
    //--------------------------------------------------------//
    //https://go.cuturl.in/CBdy9nokxt5
    $config[] ="mozlink";
    //--------------------------------------------------------//
    //https://alwrificlick.site/CB2wz1n1b3q
    $config[] ="alwrificlick";
    //--------------------------------------------------------//
    //https://urlcashh.click/CB3gnemgw8v
    //https://urlcashh.quest/CBfwuw0urbe
    $config[] ="urlcash";
    //--------------------------------------------------------//
    //https://m.pkr.pw/CBx7tq1rre9
    //https://jameeltips.us/blog/CB7nesuu74g
    $config[] ="cashurl";
    $config[] ="cashurl.win";
    //--------------------------------------------------------//
    //https://illink.net/CBlwbocwnke
    $config[] ="illink";
    $config[] ="illink.net";
    //--------------------------------------------------------//
    //http://shortnow.xyz/OfgAYe
    $config[] ="shortnow";
    $config[] ="shortnow.xyz";
    //--------------------------------------------------------//
    //https://oko.sh/Gi2zocb4r
    $config[] ="clksh";
    $config[] ="clk-sh";
    $config[] ="oko.sh";
    $config[] ="clk.sh";
    //--------------------------------------------------------//
    //https://go.softindex.website/CB9qsfrvddp
    $config[] ="softindex.website";
    $config[] ="softindex";
    //--------------------------------------------------------//
    //https://softindex.site/CBwozes7joh
    $config[] ="softindex2";
    //--------------------------------------------------------//
    //https://link.usalink.io/6ZCdmoW
    $config[] ="usalink";
    $config[] ="usalink.io";
    $config[] ="link.usalink.io";
    //--------------------------------------------------------//
    //https://adshort.co/CBl31rajnk3
    $config[] ="adshort";
    $config[] ="adshort.co";
    //--------------------------------------------------------//
    //https://mitly.us/CBm8pkpuc0j
    $config[] ="mitly";
    $config[] ="mitly.us";
    $config[] ="mitlyus";
    //--------------------------------------------------------//
    //https://clks.pro/ClbeW
    $config[] ="clk";
    $config[] ="clks";
    $config[] ="clks.pro";
    //--------------------------------------------------------//
    //https://web1s.info/DC0R4Pyhst
    $config[] ="web1s";
    $config[] ="web1s.co";
    $config[] ="web1s.info";
    $config[] ="normal1s";
    $config[] ="web1snormal2";
    //--------------------------------------------------------//
    //https://coinpayz.link/nQe01oD
    $config[] ="cplink";
    //--------------------------------------------------------//
    //http://go.megaurl.in/ET2Ra2JC
    $config[] ="megaurl";
    $config[]  = "megaurl.in";
    $config[] ="go.megaurl.in";
    //--------------------------------------------------------//
    $config[] ="megafly";
    $config[] ="megafly.in";
    $config[] ="go.megafly.in";
    //--------------------------------------------------------//
    //https://cuty.io/rWOlWjELDNLS
    $config[] ="cuty";
    $config[] ="cuty.io";
    return $config;
}
